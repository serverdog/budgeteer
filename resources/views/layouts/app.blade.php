<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Budgeteer') )</title>
       
        <link href="/theme/css/glyphicons.css" rel="stylesheet">
          <!-- Custom fonts for this template-->
        <link href="/theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="/theme/css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            .clearfix {
                display: block;
                content: "";
                clear:both;
            }
        </style>
    </head>
    <body class="{{ $class ?? '' }}">

        <body id="page-top">

            <!-- Page Wrapper -->
            <div id="wrapper">
                @auth
                    @include('layouts.navbars.sidebar')
                @endauth
          
              <!-- Content Wrapper -->
              <div id="content-wrapper" class="d-flex flex-column">
          
                <!-- Main Content -->
                <div id="content">
                    @auth
                        @include('layouts.navbars.navbar')
                    @endauth
                    @guest
                        @include('layouts.navbars.guest_navbar')
                    @endguest
                  
                  <!-- Begin Page Content -->
                  <div class="container-fluid">
          
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <h1 class="h3 mb-0 text-gray-800">@yield('title','')</h1>
                     
                    </div>
                    @include('flash::message')

                    @yield('content')

                </div>
                <!-- /.container-fluid -->
        
              </div>
              <!-- End of Main Content -->
        
              <!-- Footer -->
              <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                    <span>Copyright &copy; {{ config('app.name', 'eBudget') }} <?php echo date('Y'); ?> </span>
                    
                  </div>
                </div>
              </footer>
              <!-- End of Footer -->
        
            </div>
            <!-- End of Content Wrapper -->
        
          </div>
          <!-- End of Page Wrapper -->
        
          <!-- Scroll to Top Button-->
          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
          </a>
        
          <!-- Logout Modal-->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
              </div>
            </div>
          </div>
        
          <!-- Bootstrap core JavaScript-->
          <script src="/theme/vendor/jquery/jquery.min.js"></script>
          <script src="/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
          <!-- Core plugin JavaScript-->
          <script src="/theme/vendor/jquery-easing/jquery.easing.min.js"></script>
        
          <!-- Custom scripts for all pages-->
          <script src="/theme/js/sb-admin-2.js"></script>

          @auth

          
          <script type="text/javascript">
            function format(value)
            {
                return value.toLocaleString("en-US",{
                                        style:"currency", 
                                        currency:"{{ Auth::user()->currency}}", 
                                        minimumFractionDigits: 0,
                                        maximumFractionDigits: 0
                                        });
            } 
          </script>   
          @endauth
          @stack('js')
          
        
        </body>
        
        </html>
