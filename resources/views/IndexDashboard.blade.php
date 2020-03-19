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
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

        </div>
        </nav>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->    
            <div class="contentbar">                
                <!-- Start row -->
                <div class="row">
                <!-- Start col -->
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
                            <h3 class="text-white"> {{$global->cases}} </h3>
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
                            <h3 class="text-white"> {{$global->deaths}} </h3>
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
                            <h3 class="text-white"> {{$global->recovered}} </h3>
                            <span>Total Sembuh </span>
                           
                        </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">List Kasus Korona </h5>
                                    </div>
                                    <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                          <th width="3%" class="table-dark bg-dark">No</th>
                                            <th class="table-dark bg-primary">Negara</th>
                                            <th class="bg-warning" >Kasus</th>
                                            <th class="bg-danger">Kematian ( Rasio )</th>
                                            <th class="bg-success">Sembuh</th>
                                           

                                                                                              
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $datas)
                                          <tr>
                                              <td>{{ $key + 1 }}</td>
                                              <td class="table-info"><strong> {{ $datas->country }} </strong> </td>
                                              <td class="table-warning">{{ $datas->confirmed }}</td>
                                              <td class="table-danger">{{ $datas->deaths }} ({{ number_format($datas->deaths / $datas->confirmed * 100,2) }}%)</td>
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


        
        </script>