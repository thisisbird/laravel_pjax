<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('mazer-1.1/dist')}}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{asset('mazer-1.1/dist')}}/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="{{asset('mazer-1.1/dist')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{asset('mazer-1.1/dist')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('mazer-1.1/dist')}}/assets/css/app.css">
    <link rel="shortcut icon" href="{{asset('mazer-1.1/dist')}}/assets/images/favicon.svg" type="image/x-icon">
    <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</head>

<body>
    <div id="app">
        @include('backend.layout.sidebar')
        <div id="main">
            @include('backend.layout.header')

            <div class="main-content" id="pjax-container">
                @yield('content')
            </div>

            @include('backend.layout.footer')
        </div>
    </div>
    <script src="{{asset('mazer-1.1/dist')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{asset('mazer-1.1/dist')}}/assets/js/bootstrap.bundle.min.js"></script>

    {{-- <script src="{{asset('mazer-1.1/dist')}}/assets/vendors/apexcharts/apexcharts.js"></script> --}}
    {{-- <script src="{{asset('mazer-1.1/dist')}}/assets/js/pages/dashboard.js"></script> --}}

    <script src="{{asset('mazer-1.1/dist')}}/assets/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
    <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

    <script>
        $(document).pjax('a', '#pjax-container');
        $(document).on("pjax:timeout", function(event) {
            // 阻止超時導致連結跳轉事件發生
            event.preventDefault()
        });
        $(document).on('pjax:start', function() { NProgress.start(); });
        $(document).on('pjax:end',   function() { NProgress.done();  });
        
        
        function loadScript(url,id, callback, callbackError) {//使用此方法載入js
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.id = 'script_'+id;
            script.src = url;
            try {
                if (script.readyState) {  //IE
                    script.onreadystatechange = function () {
                        if (script.readyState === "loaded" || script.readyState === "complete") {
                            script.onreadystatechange = null;
                            callback();
                        }
                    };
                } else {  
                    //其餘瀏覽器支援onload
                    script.onload = function () {
                        callback();
                    };
                }
                
                el = $("#"+script.id);
                if(el.length){
                    el.remove();
                }
                document.getElementsByTagName("head")[0].appendChild(script);
            } catch (e) {
                if (null !== callbackError) callbackError(e);
            }
        }
    </script>
</body>

</html>