
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Eupheus Learning</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ url('admin/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('admin/css/style.css') }}">
  

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">   --}}
@yield('head')
</head>
<body>
  <div class="container-scroller">
   @include('layout.nav.top')
   <div class="container-fluid page-body-wrapper">
    @include('layout.nav.side')

    <div class="main-panel">
      <div class="content-wrapper">
        @include('flashmess.flash_message')
        {{-- <div class="row">
          <div class="col-12">
            <span class="d-flex align-items-center purchase-popup">
              <p>Like what you see? Check out our premium version for more.</p>
              <a href="https://github.com/BootstrapDash/PurpleAdmin-Free-Admin-Template" target="_blank" class="btn ml-auto download-button">Download Free Version</a>
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-4-admin-template/" target="_blank" class="btn purchase-button">Upgrade To Pro</a>
              <i class="mdi mdi-close popup-dismiss"></i>
            </span>
          </div>
        </div> --}}
        <div class="page-header">
          {{-- <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
              <i class="mdi mdi-home"></i>                 
            </span>
            Dashboard
          </h3> --}}
          {{-- <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview
                <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav> --}}
        </div>
        @yield('main')
      </div>
    </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
     
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  
    <!-- page-body-wrapper ends -->
  
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('warning', 'info','success','error') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif

</script>
  @yield('js')
  <!-- End custom js for this page-->
  
</body>

</html>
