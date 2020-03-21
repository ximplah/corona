<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cache;
use Carbon\Carbon;

/*
| Use Models   
*/
use App\CaseModels;
use App\CountryModels;
use App\GlobalDataModels;

class CovidController extends Controller
{
    
    public function InsertDataFirst()
    {
        
        $yesterday = date("Y-m-d", strtotime( '-1 days' ) );
        $countYesterday = CaseModels::whereDate('date', $yesterday )
            ->delete();
        $dataset = "https://pomber.github.io/covid19/timeseries.json";
        $getDataSet = file_get_contents($dataset);
        $decodeJson = json_decode($getDataSet,true);

        $data = [];
        foreach ($decodeJson as $key => $value) {
            
            CountryModels::firstOrCreate([
                'country' => $key
            ]);
            
            $data[] = $value;

        }

        
        for($i=0;$i<count($data);$i++){

            for($d=0;$d<count($data[$i]);$d++){

            $datas = $data[$i][$d];
            $datas['country_id'] = $i+1;

            CaseModels::updateOrCreate($datas);

            }
            

        }

    }


    public function getDataSummary()
    {
        $sub = CaseModels::orderBy('date','DESC');
        $total_country = CountryModels::count();
        $case = DB::table(DB::raw("({$sub->toSql()}) as sub"))
                ->groupBy('country_id')
                ->first();
                
                /*
                
                ->select('countrylist.country','caselist.date','caselist.confirmed','caselist.deaths','caselist.recovered')
                ->join('countrylist','caselist.country_id','=','countrylist.id')
                ->orderBy('confirmed','DESC')
                ->get();
        */

            $data = CountryModels::join('caselist','countrylist.id','=','caselist.country_id')
                    ->where('date',date('Y-m-d'))
                    ->select('country','confirmed','date')
                    ->groupBy('caselist.country_id')
                    ->orderBy('caselist.confirmed','DESC')
                    ->get();
        return [

            'country_count' => $total_country,
            'data' => $data,
            'date' => date('Y-m-d')

        ];
    }


    public function DataUpdate()
    {
        $api_endpoint = 'https://corona.lmao.ninja/countries/';
        $fetchApi = file_get_contents($api_endpoint);
        $decodeApi = json_decode($fetchApi,true);

        print count($decodeApi);

        foreach ($decodeApi as $key => $value) {
            

            $replace = [
                "S. Korea" => "Korea, South",
                "USA" => "US",
                "UAE" => "United Arab Emirates",
                "Palestine" => "occupied Palestinian territory",
            ];

            $country = strtr($value['country'],$replace);


            $getCountryId = DB::table('countrylist')
                            ->select('id')
                            ->where('country', 'like', '%' . $country . '%')
                            ->first();


            $replace = [
                "S. Korea" => "Korea, South",
                "USA" => "US",
                "UAE" => "United Arab Emirates",
                "Palestine" => "occupied Palestinian territory",
            ];

            

            if($getCountryId){
            CaseModels::updateOrCreate([
                'country_id' => $getCountryId->id,
                'date' => date('Y-m-d')],[
                'date' => date('Y-m-d'),
                'confirmed' => $value['cases'],
                'deaths' => $value['deaths'],
                'recovered' => $value['recovered']

            ]);

            }

            

            

        }

    }


    public function index(Request $request)
    {
       


            
            
            $this_day = date("Y-m-d");
            
            $yesterday = date("Y-m-d", strtotime( '-1 days' ) );
            $countYesterday = GlobalDataModels::whereDate('created_at', $yesterday )
            ->orderBy('id','DESC')
            ->first();
            
             $Now = GlobalDataModels::whereDate('created_at', date('Y-m-d') )
            ->orderBy('id','DESC')
            ->first();
            
            
            
            
            $this_days_plus = [
                
                    'cases' => ($Now->cases - $countYesterday->cases),
                    'deaths' => ($Now->deaths - $countYesterday->deaths),
                    'recovered' => ($Now->recovered - $countYesterday->recovered)
                
                ];
                
            if($this_days_plus['cases'] <= 0 OR $this_days_plus['deaths'] <= 0 OR $this_days_plus['recovered'] <= 0 )
            {
                
                $result_days = [
                
                    'cases' => ($Now->cases - $countYesterday->cases),
                    'deaths' => ($Now->deaths - $countYesterday->deaths),
                    'recovered' => ($Now->recovered - $countYesterday->recovered)
                
                ];
                
            }else{
                
                $result_days = [
                
                    'cases' => "+{$this_days_plus['cases']}",
                    'deaths' => "+{$this_days_plus['deaths']}",
                    'recovered' => "+{$this_days_plus['recovered']}"
                
                ];
            }
            

            $global = GlobalDataModels::orderBy('id','DESC')->first();

            $data = CountryModels::join('caselist','countrylist.id','=','caselist.country_id')
            ->where('date',date('Y-m-d'))
            ->select('countrylist.country','caselist.confirmed','caselist.deaths','caselist.recovered','caselist.date')
            ->groupBy('caselist.country_id')
            ->orderBy('caselist.confirmed','DESC')
            ->paginate(300);
            
  
            return view('IndexDashboard',[

                'title' => 'COVID-19 Case - Ngaah.id',
                'data' => $data,
                'global' => $global,
                'this_days' => $result_days,
                'yesterday' => $countYesterday

            ]);
        
    }

    public function updateGlobalSummary()
    {
        $endpoint   = "https://corona.lmao.ninja/all";
        $getData    = file_get_contents($endpoint);
        $decodeData = json_decode($getData,true);
        GlobalDataModels::insert([

            'cases' => $decodeData['cases'],
            'deaths' => $decodeData['deaths'],
            'recovered' => $decodeData['recovered'],
            'updated_at' => date('Y-m-d h:m:s'),
            'created_at' => date('Y-m-d h:m:s')

        ]);
    }

    public function StatIndo(Request $request)
    {
    
        
        $data = CaseModels::where(
                ['country_id' => '54',
                'date' => date('Y-m-d')]
                )
            ->get();
        
                  
            return view('statIndo',[
                
                
                'data' => $data[0],
                'title' => 'COVID-19 Indonesia - Ngaah.id',
                'yesterday' => $countYesterday,
                'this_days' => $result_days

            ]);
 
    }

    public function getFrame()
    {

        $data = file_get_contents('https://www.widgets.investing.com/live-currency-cross-rates?theme=lightTheme&pairs=9504,1645,1759,2034,2138');

        print $data;

    }


    public function IndoCase()
    {
        Cache::remember('indocase', 300, function () {
            return CaseModels::where('country_id','54')
            ->whereDate('date', '>', Carbon::now()->subDays(30))
            ->orderBy('date','ASC')
            ->get();
        });
        
        
        $data = [];
        foreach( Cache::get('indocase') as $key => $value ){

            $id = $key + 1 ;
            $data[] = [

                
                'date' => $value['date'],
                'confirmed' => $value['confirmed'],
                'recovered' => $value['recovered'],
                'deaths' => $value['deaths']

            ];


        }

        return $data;
    }



    public function GlobalCase()
    {
        Cache::remember('globalcase', 1, function () {
            
        });
        
        $ngaah =  CaseModels::groupBy('date')
        ->selectRaw('date, date as tanggal') 
        ->selectRaw('confirmed, sum(confirmed) as confirmed')
        ->selectRaw('recovered, sum(recovered) as recovered')
        ->selectRaw('deaths, sum(deaths) as deaths')
        ->whereDate('date', '>', Carbon::now()->subDays(30))
        ->orderBy('date','ASC')
        ->get();

        $data = [];
        foreach( $ngaah as $key => $value ){

            if($value['date'] == date('Y-m-d')){ }else{
         
            $data[] = [
                
                
                
                'date' => $value['date'],
                'confirmed' => $value['confirmed'],
                'recovered' => $value['recovered'],
                'deaths' => $value['deaths']

            ];
            
                }


        }

        return $data;
    }



    public static function InfoCountry($country)
    {

        $DB = CountryModels::Where('country',$country)
        ->select('id')
        ->first();

        if(!$DB){ exit; }

        $data = CaseModels::where(
            ['country_id' => $DB->id,
            'date' => date('Y-m-d')]
            )
        ->get();

        return view('StatDynamic',[

            'title' => "{$country} COVID-19 Statistic - Ngaah.id",
            'country' => $country,
            'data' => $data[0]

        ]);

    }


    public static function DynamicCase($country)
    {
            

            $DB = CountryModels::Where('country',$country)
            ->select('id')
            ->first();
            if(!$DB){ exit; }
        
           $datas =  CaseModels::where('country_id',$DB->id)
            ->whereDate('date', '>', Carbon::now()->subDays(30))
            ->orderBy('date','ASC')
            ->get();
      
        
        
        $data = [];
        foreach( $datas as $key => $value ){

            $data[] = [

                
                'date' => $value['date'],
                'confirmed' => $value['confirmed'],
                'recovered' => $value['recovered'],
                'deaths' => $value['deaths']

            ];


        }

        return $data;
    }

}


