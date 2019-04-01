<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- partial:/partials/_head -->
    @include('layouts.partials._head')
    <!-- partial -->
</head>

<body class="hold-transition skin-yellow fixed sidebar-mini">
<!-- Site wrapper -->
    <div class="wrapper">

        <!-- partial:/partials/_header -->
        @include('layouts.partials._header')
        <!-- partial -->

        <!-- partial:/partials/_sidebarLeft -->
        @include('layouts.partials._sidebarLeft')
        <!-- partial -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('flash::message')
            @yield('content');
        </div>
        <!-- /.content-wrapper -->

        <!-- partial:/partials/_footer -->
        @include('layouts.partials._footer')
        <!-- partial -->

        <!-- partial:/partials/_sidebarRight -->
        @include('layouts.partials._sidebarRight')
        <!-- partial -->

        <!-- Add the sidebarRight's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
<!-- ./wrapper -->

    <!-- partial:/partials/_foot -->
    @include('layouts.partials._foot')
    <!-- partial -->
</body>

</html>