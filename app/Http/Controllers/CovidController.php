<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

            CaseModels::firstOrCreate($datas);

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
                    ->where('date','2020-03-17')
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
                'country_id' => $getCountryId->id,
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
       

        if($request->input('search')){
            
            $users = UserModels::where('username', 'LIKE', '%' . $request->input('search') . '%')->paginate(15);
            return view('IndexDashboard',[
    
                'title' => 'COVID-19 Case - Ngaah.id',
                'users' => $users
    
            ]);
        
        }else{

            $global = GlobalDataModels::orderBy('id','DESC')->first();

            $data = CountryModels::join('caselist','countrylist.id','=','caselist.country_id')
            ->where('date','2020-03-17')
            ->select('countrylist.country','caselist.confirmed','caselist.deaths','caselist.recovered','caselist.date')
            ->groupBy('caselist.country_id')
            ->orderBy('caselist.confirmed','DESC')
            ->paginate(300);
            return view('IndexDashboard',[

                'title' => 'COVID-19 Case - Ngaah.id',
                'data' => $data,
                'global' => $global

            ]);
        }
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

}
