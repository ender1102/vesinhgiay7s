<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.head")
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            @include('admin.nav')

            <!-- page content -->
            @yield('admin_content')
            <!-- /page content -->

            @include('admin.footer')
        </div>
    </div>

    @include("admin.script")

</body>

</html>
