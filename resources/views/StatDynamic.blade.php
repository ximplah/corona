@include('head')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha256-PHcOkPmOshsMBC+vtJdVr5Mwb7r0LkSVJPlPrp/IMpU=" crossorigin="anonymous" />

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
            <li class="nav-item">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                
            </li>
             <li class="nav-item active">
                <a class="nav-link" href="/statindo">Statistik Indo <span class="sr-only">(current)</span></a>
            </li>

        </div>
        </nav>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->    
            <div class="contentbar">

            <h3 class="text-center"> {{$country}} COVID-19 Case </h3>    
            <hr/>
                <!-- Start row -->
                <div class="row">


<div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30 ">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">Total Kasus</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 bg-primary text-white">
                            <h3 class="text-white"> {{$data->confirmed}} </h3>
                            <span>Kasus COVID-19</span>
                            
                        </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">Total Kematian</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 bg-danger text-white">
                            <h3 class="text-white"> {{$data->deaths}} </h3>
                            <span>Total Kematian</span>
                            
                        </div>
                        </div>
                    </div>
                    <!-- End col -->                    
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">Total Sembuh</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 bg-success text-white">
                            <h3 class="text-white"> {{$data->recovered}} </h3>
                            <span>Total Sembuh </span>
                           
                        </div>
                        </div>
                        </div>

                <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">Kasus COVID-19 Di {{$country}}</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0">
                           
                            <canvas height="150" id="indocase" class="chartjs-chart mt-4"></canvas>

                            <span>Kasus Covid19 (Confirmed,Recovered,Death)</span>
                        </div>
                        </div>
                    </div>
                <!-- Start col -->
                
                    <!-- End col -->
                    <!-- Start col -->
                    
                    <!-- End col -->

                    
                    
                    
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





function rendercase()
        {
            var url = "{{url('json/')}}/{{$country}}";
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

</script>