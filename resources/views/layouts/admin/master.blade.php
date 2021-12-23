<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @yield('meta')
    @yield('title')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script>
    function ConfirmDelete() {
        var x = confirm('Are you sure you want to do this?');
        if (x)
            return true;
        else
            return false;
    }

    function ConfirmRestore() {
        var x = confirm('Are you sure you want to do this?');
        if (x)
            return true;
        else
            return false;
    }
    </script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Header Nav -->
        @include('layouts.admin.partials.header')

        <!-- Sidebar -->
        @include('layouts.admin.partials.sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content_header')
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

        </div>
        <!-- /.content-wrapper -->

        @include('layouts.admin.partials.right-side')

        <!-- Main Footer -->
        @include('layouts.admin.partials.footer')

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- AdminLTE App -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('admin/sweetalert2/sweetalert2.all.min.js')}}"></script>

    @stack('footer-scripts')
    <script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img_loc').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.html-editor').summernote({
        height: 200,
        dialogsInBody: true,
        tabsize: 2,
        placeholder: 'Enter Details here...',
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph', 'header']],
            ['height', ['height']]
        ]
    });
    </script>
</body>


</html>