@include('head')



<body class="vertical-layout">
    <!-- Start Infobar Notifications Sidebar -->
    
    
    <!-- End Infobar Setting Sidebar -->
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        
        <!-- End Leftbar -->
        <!-- Start Rightbar -->
        <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="/n.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Ngaah.ID
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                
            </li>
             <li class="nav-item ">
                <a class="nav-link" href="/statindo">Statistik Indo <span class="sr-only">(current)</span></a>
            </li>

        </div>
        </nav>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->    
            
            <div class="contentbar">  
            <p><i class="mdi mdi-circle text-danger mr-2 animated infinite flash"></i>Live Update<span class="float-right">{{ date('d-M-Y H:m:s') }}</span></p>
            
            <div class="alert alert-info" role="alert">
  <strong>Statistik Indonesia Only</strong> <a href="/statindo" >Klik Disini! </a>
</div>
                <!-- Start row -->
                <div class="row">
                    
                <!-- Start col -->
                <div class="col-md-12 col-lg-2 col-xl-2">
                        <div class="card m-b-30 ">
                            <div class="card-header">
                                <div class="row align-items-center">
                                        <h5 class="card-title mb-0 text-center">Total Kasus</h5>
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 bg-danger text-white">
                            <h3 class="text-white"> {{$global->cases}} </h3>
                            <span>Kasus COVID-19</span>
                        </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-2 col-xl-2">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                        <h5 class="card-title mb-0 text-center">Total Kematian</h5>
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 bg-danger text-white">
                            <h3 class="text-white"> {{$global->deaths}} </h3>
                            <span>Total Kematian</span>
                        </div>
                        </div>
                    </div>
                    <!-- End col -->                    
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-2 col-xl-2">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                        <h5 class="card-title mb-0 text-center">Total Sembuh</h5>
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 bg-success text-white">
                            <h3 class="text-white"> {{$global->recovered}} </h3>
                            <span>Total Sembuh </span>
                        </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-2 col-xl-2">
                        <div class="card m-b-30 ">
                            <div class="card-header">
                                <div class="row align-items-center">
                                        <h5 class="card-title mb-0 text-center">Kasus Hari Ini</h5>
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 bg-danger text-white">
                            <h3 class="text-white"> {{$this_days['cases']}} </h3>
                            <span>Kasus Hari Ini</span>
                        </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-2 col-xl-2">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                        <h5 class="card-title mb-0 text-center"> Kematian Hari Ini</h5>
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 bg-danger text-white">
                            <h3 class="text-white"> {{$this_days['deaths']}} </h3>
                            <span>Kematian Hari Ini</span>
                        </div>
                        </div>
                    </div>
                    <!-- End col -->                    
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-2 col-xl-2">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                        <h5 class="card-title mb-0 text-center"> Sembuh Hari Ini</h5>
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 bg-success text-white">
                            <h3 class="text-white"> {{$this_days['recovered']}} </h3>
                            <span>Sembuh Hari Ini </span>
                        </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">Statistik Kasus COVID</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0">
                           
                            <canvas height="150" id="indocase" class="chartjs-chart mt-4"></canvas>

                            
                        </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    </div></div></div>
                   
                    <div class="">
                        <div class="card m-b-30">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">List Kasus Korona </h5>
                                    </div>
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                          <tr>
                                          <th width="3%" class="table-dark bg-dark">No</th>
                                            <th class="table-dark bg-primary">Negara</th>
                                            <th class="bg-warning" >Kasus</th>
                                            <th class="bg-danger">Kematian</th>
                                            <th class="bg-danger">Rasio Kematian</th>
                                            <th class="bg-success">Sembuh</th>
                                           

                                                                                              
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $datas)
                                        
                                          <tr class='clickable-row' data-href='/info/{{$datas->country}}'>
                                          
                                              <td>{{ $key + 1 }}</td>
                                              <td class="table-info"><strong> {{ $datas->country }} </strong> </td>
                                              <td class="table-warning">{{ $datas->confirmed }}</td>
                                             
                                              <td class="table-danger">{{ $datas->deaths }}</td>
                                             <td class="table-danger">
                                              ({{ number_format($datas->deaths / $datas->confirmed * 100,2) }}%)
                                             </td>
                                              <td class="table-success">{{ $datas->recovered }}</td>
                   
                                          </tr>
                                        
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $data ->render() !!}
                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div id="service"></div>
                                    </div>
                                    <div class="col-md-5">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <!-- End col -->


                    <!-- End col -->
                    <!-- Start col -->
                    
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Contentbar -->
            <!-- Start Footerbar -->
            <div class="footerbar">
                <footer class="footer">
                    <p class="mb-0">Made By <a href="https://www.instagram.com/gilang_dandung/"> Gilang Dandung </a>  © {{ date('Y') }} Ngaah.id - All Rights Reserved.</p>
                </footer>
            </div>
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->
    </div>



    

@include('foot')


<script>



        
        $(document).ready(function(){
            load_app();
        });


        
        function rendercase()
        {
            var url = "{{url('data/globalcase')}}";
            var date = new Array();
            var confirmed = new Array();
            var recovered = new Array();
            var deaths = new Array();
            $.get(url, function(response){
            response.forEach(function(data){
                date.push(data.date);
                confirmed.push(data.confirmed);
                recovered.push(data.recovered);
                deaths.push(data.deaths);
            });
            var ctx = document.getElementById("indocase").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels:date,
                      datasets: [
                        {
                          label: 'Case',
                          data: confirmed,                     
					      borderColor: "#f1c40f",
                          fill:false,
                          
                        },
                        {
                          label: 'Sembuh',
                          data: recovered,
                          borderColor: "green"
                          
                        },
                        {
                          label: 'Kematian',
                          data: deaths,
                          borderColor : "red"
                          
                        },
                      ]
                  },
                  
                options: {
        
                    responsive: true,
                    maintainAspectRatio: true, 
                    aspectRatio : 2,
                   
                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    },
                    scales: {
                    xAxes: [{
                        display: false,       
                        gridLines: {
                            color: '#e9eff9',
                            lineWidth: 0,
                            borderDash: [3]
                        }
                    }],
                    yAxes: [{
                    	display: false,
                        gridLines: {
                            color: '#e9eff9',
                            lineWidth: 1,
                            borderDash: [3]
                        },
		              	
                    }],
                    },
                    
                    
                
                }
              });
          });
        }

        rendercase();
        
        
        $(document).ready( function () {
            $('#datatable').DataTable({
            
              "pageLength": 100,
              "order": [[ 2, "ASC" ]]
                
            });
        } );

        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });

        </script>