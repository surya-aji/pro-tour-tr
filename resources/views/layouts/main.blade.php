<!DOCTYPE html>
<html lang="en">

    <!-- Head starts-->
    @include('layouts.head')
    <!-- Head end-->


<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-sidebar" id="pageWrapper">
        <!-- Page Header Start-->
        @include('layouts.header')
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
         @include('layouts.sidebar')
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <!-- Container-fluid starts-->
                <!-- Container-fluid starts-->
                @yield('content')
                <!-- Container-fluid Ends-->
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
           @include('layouts.footer')
        </div>
    </div>
      <!-- scripts-->
        @include('layouts.scripts')
      <!-- scripts-->
   
</body>

</html>
