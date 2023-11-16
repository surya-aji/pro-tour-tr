
<!DOCTYPE html>
<html lang="en">
    <!-- Head starts-->
    @include('PEGAWAI_VIEW.layouts.head')
    <!-- Head end-->
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
      <!-- Page Header Start-->
      @include('PEGAWAI_VIEW.layouts.header')
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
       
        <!-- Page Sidebar Ends-->
        @yield('p_content')
        
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright {{date('Y')}} © Moch Surya Aji Sumbaga.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Que` Sera Sera <i class="fa fa-heart font-secondary"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
      @include('PEGAWAI_VIEW.layouts.script')
  </body>
</html>