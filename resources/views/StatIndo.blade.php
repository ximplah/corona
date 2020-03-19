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
                            <div class="card-header pair_2138">                                
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">USD/IDR</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 ">
                            <h3 >Rp. <span class="hiddenOne js-col-bid pid-2138-bid"></span></h3>
                            <span>Harga USD/IDR</span>
                            
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
                                        <h5 class="card-title mb-0">GBP/IDR</h5>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 ">
                            <h3 >Rp. <span class="hiddenOne js-col-bid pid-1759-bid"></span></h3>
                            <span>Harga GBP/IDR</span>
                            
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
                                        <h5 class="card-title mb-0">EUR/IDR</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0 ">
                            <h3 >Rp. <span class="hiddenOne js-col-bid pid-1645-bid"></span></h3>
                            <span>Harga EUR/IDR</span>
                           
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
                                        <h5 class="card-title mb-0">Spent</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div height="150" class="row align-items-center">
   

                                <iframe id="currencyFrame" height="300" src="https://www.widgets.investing.com/live-currency-cross-rates?theme=lightTheme&pairs=9504,1645,1759,2034,2138" width="100%" height="300px" frameborder="0" ></iframe>


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




<script type="text/javascript" src="https://i-invdn-com.akamaized.net/invwidgets/js/sockjs.min.js"></script>
<script type="text/javascript">stream="https://stream117.forexpros.com:443";</script>
<script type="text/javascript">window.timezoneOffset = -14400;</script>
<script type="text/javascript" src="https://i-invdn-com.akamaized.net/invwidgets/js/utils.js"></script>
<script type="text/javascript">
    var pid_arr = ["pid-9504:","pid-1645:","pid-1759:","pid-2034:","pid-2138:","isOpenPair-9504:","isOpenPair-1645:","isOpenPair-1759:","isOpenPair-2034:","isOpenPair-2138:"];
    var TimeZoneID = 8;
</script>

<script>

// Create a connection to http://localhost:9999/echo
console.log('stream: '+stream);
var sock = null;
//var server_heartbeat_interval = 5;
new_conn = function (){
    var options = {protocols_whitelist: ['websocket', 'xdr-streaming', 'xhr-streaming', 'iframe-eventsource', 'xdr-polling', 'xhr-polling'], debug: true, jsessionid: false, server_heartbeat_interval: 4000, heartbeatTimeout: 2000};
    //sock = new SockJS('//'+stream+':443/echo', null, options);
    sock = new SockJS(stream+'/echo', null, options);
    //sock = new SockJS('http://web61.forexpros.com:80/echo');
    // managing heartbeats
    var heartbeat, death;
    var suicide = false; // why would you do this
    var events = {};
    function on(event, func) {events[event] = func;}

    // all users announce their info to the server and start a heartbeat

    var onDeath = function() {
        clearTimeout(heartbeat);
        clearTimeout(death);
    };

    var setHeartbeat = function() {
        clearTimeout(heartbeat);
        heartbeat = setTimeout(function() {
            console.log("heartbeat");
            sock.send(JSON.stringify({ _event: "heartbeat", data: 'h'}));
        }, 3000);
        death = setTimeout(function() {
            console.log("Dying...");
            sock.close();
        }, 60000);
    };


    on("heartbeat", function(e,data) {
        if (suicide) return; // let death take me
        clearTimeout(death); // death averted
        // console.log("heartbeat: returned, death averted");
        setHeartbeat();
    });

    function getTimeUnitForDisplay(timeUnit) {
        if(timeUnit > 9) return timeUnit;
        return '0' + timeUnit;
    }

    function getUTCTime(timestamp, timezoneOffset) {
        var currentTime = new Date((timestamp + timezoneOffset) * 1000);
        return getTimeUnitForDisplay(currentTime.getUTCHours()) + ':' + getTimeUnitForDisplay(currentTime.getUTCMinutes()) + ':' + getTimeUnitForDisplay(currentTime.getUTCSeconds());
    }

    //sock.onheartbeat = function() {
    //    console.log('heartbeat');
    //};
    // Open the connection
    sock.onopen = function() {
        console.log('open-fx');
        setHeartbeat();

        jQuery.each (pid_arr , function (i , val) {
                console.log(val);
                sock.send(JSON.stringify({_event: "subscribe", "tzID": TimeZoneID, "message": val}));
            }
        )
    };
    // Open the connection END

    on("tick",function(e,data) {
        var content = JSON.parse(e.data);

        //console.log(content.message);
        var result = content.message.split('::');


        var pid_obj = JSON.parse(result[1]);
        //var tz_arr = JSON.parse(pid_obj.local_time);
        //console.log(pid_obj);
        //console.log(tz_arr);
        var _class = pid_obj.last_dir.is('bg-success') ? 'bg-primary' : 'bg-danger';

        var $pairName = $('#pair_' + pid_obj.pid + ' .js-col-pair_name');

        $pairName.attr('main-value', pid_obj.last).removeClass('bg-primary bg-danger').addClass(_class);

        $('.pid-'+pid_obj.pid+'-bid').html(pid_obj.bid);
        $('.pid-'+pid_obj.pid+'-ask').html(pid_obj.ask);
        $('.pid-'+pid_obj.pid+'-last').html(pid_obj.last);
        $('.pid-'+pid_obj.pid+'-last_nColor').html(pid_obj.last);
        $('.pid-'+pid_obj.pid+'-high').html(pid_obj.high);
        $('.pid-'+pid_obj.pid+'-low').html(pid_obj.low);
        $('.pid-'+pid_obj.pid+'-pc').html(pid_obj.pc);

        $('.pid-' + pid_obj.pid + '-arrowSmall').removeClass('greenArrowIcon');
        $('.pid-' + pid_obj.pid + '-arrowSmall').removeClass('redArrowIcon');
        $('.pid-' + pid_obj.pid + '-arrowSmall').removeClass('grayArrowIcon');

        if (pid_obj.pc_col == 'text-success')
        {  	$('.pid-' + pid_obj.pid + '-arrowSmall').addClass('greenArrowIcon');
        }else if (pid_obj.pc_col == 'text-danger'){
            $('.pid-' + pid_obj.pid + '-arrowSmall').addClass('redArrowIcon');
        }else if (pid_obj.pc_col == 'text-black'){
            $('.pid-' + pid_obj.pid + '-arrowSmall').addClass('grayArrowIcon');
        }

        $('.pid-'+pid_obj.pid+'-pc').removeClass('text-success');
        $('.pid-'+pid_obj.pid+'-pc').removeClass('text-danger');
        $('.pid-'+pid_obj.pid+'-pc').addClass(pid_obj.pc_col);

        $('.pid-'+pid_obj.pid+'-pcp').html(pid_obj.pcp);

        $('.pid-'+pid_obj.pid+'-pcp').removeClass('text-success');
        $('.pid-'+pid_obj.pid+'-pcp').removeClass('text-danger');
        $('.pid-'+pid_obj.pid+'-pcp').addClass(pid_obj.pc_col);

        //$('.pid-'+pid_obj.pid+'-time').html(pid_obj.time);
        //$('.pid-'+pid_obj.pid+'-time').html(tz_arr[TimeZoneID]);
        //$('.pid-'+pid_obj.pid+'-time').html(pid_obj.local_time);
        $('.pid-'+pid_obj.pid+'-time').html(getUTCTime(pid_obj.timestamp, window.timezoneOffset));


        $('.pid-'+pid_obj.pid+'-turnover').html(pid_obj.turnover);
        if ( (pid_obj.last_dir == 'redBg') || (pid_obj.last_dir == 'bg-success') )
        {
            $('.pid-'+pid_obj.pid+'-last').addClass(pid_obj.last_dir);
            $('.pid-'+pid_obj.pid+'-bid').addClass(pid_obj.last_dir);
            $('.pid-'+pid_obj.pid+'-ask').addClass(pid_obj.last_dir);
        }

        setTimeout(function() {
            if (pid_obj.last_dir === 'redBg' || pid_obj.last_dir === 'bg-success') {
                $('.pid-'+pid_obj.pid+'-last').removeClass(pid_obj.last_dir);
                $('.pid-'+pid_obj.pid+'-bid').removeClass(pid_obj.last_dir);
                $('.pid-'+pid_obj.pid+'-ask').removeClass(pid_obj.last_dir);
            }
            $pairName.removeClass('bg-primary bg-danger');
        }, 1250);

        if ( result[0].indexOf("isOpenExch-") != -1)
        {	//console.log('isopenexch', pid_obj);
            isOpenExch(pid_obj);
        }

        if ( result[0].indexOf("isOpenPair-") != -1)
        {	//console.log('isOpenPair', pid_obj);
            isOpenPair(pid_obj);
        }
    });

    var isOpenExch = function(pid_obj) {
        console.log('isOpenExch func', pid_obj);
        $('.isOpenExch-' + pid_obj.exch_ID).removeClass('greenClockIcon').removeClass('redClockIcon');
        if ((pid_obj.is_open == 'red') || (pid_obj.is_open == 'green')) {
            $('.isOpenExch-' + pid_obj.exch_ID).addClass(pid_obj.is_open+'ClockIcon');
        }

        //for the pair summary instrument model
        $('.isOpenExchBig-' + pid_obj.exch_ID).removeClass('greenClockBigIcon').removeClass('redClockBigIcon');
        if ((pid_obj.is_open == 'red') || (pid_obj.is_open == 'green')) {
            $('.isOpenExchBig-' + pid_obj.exch_ID).addClass(pid_obj.is_open+'ClockBigIcon');
        }
    };

    var isOpenPair = function(pid_obj) {
        console.log('isOpenPair func', pid_obj);
        $('.isOpenPair-' + pid_obj.pair_ID).removeClass('greenClockIcon').removeClass('redClockIcon');
        $('.isOpenPair-' + pid_obj.pair_ID).addClass(pid_obj.is_open+'ClockIcon');
        if ((pid_obj.is_open == 'red') || (pid_obj.is_open == 'green')) {
            $('.isOpenPair-' + pid_obj.exch_ID).addClass(pid_obj.is_open+'ClockIcon');
        }

        //for the pair summary instrument model
        $('.isOpenPairBig-' + pid_obj.pair_ID).removeClass('greenClockBigIcon').removeClass('redClockBigIcon');
        if ((pid_obj.is_open == 'red') || (pid_obj.is_open == 'green')) {
            $('.isOpenPairhBig-' + pid_obj.pair_ID).addClass(pid_obj.is_open+'ClockBigIcon');
        }
    };

    $(window).on('socketNewData', function(e, data) {
        pid_arr = data;
        jQuery.each(data, function(i, val)
        {
            console.log(val);
            sock.send(JSON.stringify({ _event: "subscribe", "tzID": TimeZoneID, "message": val}));
        });
        console.log(data)
    });

    // On receive message from server
    sock.onmessage = function(e) {
        // Get the content
        //console.log(e.data);

        try {
            //console.log(e.data);
            var data = JSON.parse(e.data);
            if (data._event == undefined)
                data._event = 'tick';
            (events[data._event] || noop)(e,data);
        }catch(err){
            console.log('CATCH ERR ');
            console.log('CATCH ERR '+err.message+e.data);
            sock.close();
            clearTimeout(death); // death averted
            new_conn();
        }

    };
    // On receive message from server END

    // On connection close
    sock.onclose = function() {
        console.log('close-fx');


        setTimeout(function () {
            console.log('retry');
            clearTimeout(death); // death averted
            new_conn();
            console.log("new conn: returned, death averted");
            //console.log('retry2');
        }, 3000);

    }
    // On connection close END

}

new_conn();


// Function for sending the message to server
function sendMessage(){
    // Get the content from the textbox
    var message = $('#message').val();
    var username = $('#username').val();

    // The object to send
    var send = {
        message: message,
        username: username
    };

    // Send it now
    sock.send(JSON.stringify(send));
}



$('iframe').load(function() {
  


    console.log('framelog');

});
</script>