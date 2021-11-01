<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('concept')}}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('concept')}}/assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="{{asset('concept')}}/assets/libs/css/style.css">
    <link rel="stylesheet" href="{{asset('concept')}}/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{asset('concept')}}/assets/vendor/select2/css/select2.css">
    <link rel="stylesheet" href="{{asset('mazer-1.1')}}/dist/assets/vendors/summernote/summernote-lite.min.css">

    <link rel="stylesheet" href="{{asset('mazer-1.1/dist')}}/assets/vendors/toastify/toastify.css">
    <link rel='stylesheet' href='{{asset('css')}}/nprogress.css'/>

    <script src="{{asset('mazer-1.1/dist')}}/assets/vendors/toastify/toastify.js"></script>



<!-- jquery 2.1.4 -->
    <script src="{{asset('js')}}/jquery2.1.4.js"></script>

    <!-- bootstap bundle js -->
    <script src="{{asset('concept')}}/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="{{asset('concept')}}/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="{{asset('concept')}}/assets/vendor/select2/js/select2.min.js"></script>
    {{-- <script src="{{asset('concept')}}/assets/vendor/summernote/js/summernote-bs4.js"></script> --}}

    {{-- <script src="{{asset('mazer-1.1')}}/dist/assets/vendors/jquery/jquery.min.js"></script> --}}
    <script src="{{asset('mazer-1.1')}}/dist/assets/vendors/summernote/summernote-lite.min.js"></script>

    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->

        @include('backend.layout-concept.header')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @include('backend.layout-concept.sidebar')

        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="influence-finder">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Influencer Finder </h3>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Influencer Finder Template</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div id="pjax-container">
                        @yield('content')
                        @if(session('success'))
                        <script>
                            Toastify({
                                text: "{{session('success')}}",
                                duration: 3000,
                                close:true,
                                gravity:"bottom",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                        </script>
                        @endif
                        @if($errors->count())
                            @foreach ($errors->all() as $error)
                            <script>
                                Toastify({
                                text: "{{$error}}",
                                duration: 3000,
                                close:true,
                                gravity:"bottom",
                                position: "center",
                                backgroundColor: "#ef172c",
                            }).showToast();
                            </script>
                            @endforeach
                        @endif
                    </div>
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    @include('backend.layout-concept.footer')
                    <!-- ============================================================== -->
                    <!-- end footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end wrapper  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end main wrapper  -->
            <!-- ============================================================== -->
            <!-- Optional JavaScript -->


            
            <!-- main js -->
            <script src="{{asset('concept')}}/assets/vendor/full-calendar/js/jquery-ui.min.js"></script>
            <script src="{{asset('concept')}}/assets/libs/js/main-js.js"></script>
            <script src="{{asset('concept')}}/assets/vendor/parsley/parsley.js"></script>
            <script src="{{asset('js')}}/jquery.pjax.min.js"></script>
            <script src='{{asset('js')}}/nprogress.js'></script>
            <script>
                $(document).pjax('a:not(a[target="_blank"])', '#pjax-container');
                $(document).on("pjax:timeout", function(event) {
                    // 阻止超時導致連結跳轉事件發生
                    event.preventDefault()
                });
                $(document).on('submit', 'form[pjax-container]', function (event) {
                    $.pjax.submit(event, '#pjax-container')
                });
                $(document).on('pjax:start', function() { NProgress.start(); });
                $(document).on('pjax:end',   function() { NProgress.done();  });
            </script>

</body>
 
</html>