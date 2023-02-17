<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{ config('app.name', 'Namakarya') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">
    <link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">



    <!-- Dropzone css -->
    <link href="{{ asset('') }}assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">

    <script src="{{ asset('') }}assets/js/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/vVERSION/js/all.js" data-auto-replace-svg="nest"></script>

    <!--Wysiwig js-->
    <script src="{{ asset('') }}assets/plugins/tinymce/tinymce.min.js"></script>



</head>


<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    @include('layouts.nav')


    <div class="wrapper">
        <div class="container-fluid">
            @yield('content')

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    © {{ date('Y') }} Koperasi Namastra Jaya Sejahtera.
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery  -->
    <script src="{{ asset('') }}assets/js/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/js/popper.min.js"></script>
    <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}assets/js/modernizr.min.js"></script>
    <script src="{{ asset('') }}assets/js/waves.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.nicescroll.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.scrollTo.min.js"></script>

    <script src="{{ asset('') }}assets/plugins/skycons/skycons.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/raphael/raphael-min.js"></script>
    <script src="{{ asset('') }}assets/plugins/morris/morris.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('') }}assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>


    <!-- Sweet-Alert  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App js -->
    <script src="{{ asset('') }}assets/js/app.js"></script>
    <!-- Dropzone js -->
    <script src="{{ asset('') }}assets/plugins/dropzone/dist/dropzone.js"></script>
    <script src="{{ asset('') }}assets/plugins/dropify/js/dropify.min.js"></script>

    @stack('scripts')

</body>

</html>
