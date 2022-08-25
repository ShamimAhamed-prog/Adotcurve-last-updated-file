<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
   <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/sb-admin-2.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!--
 /////////////////////////   Scheduling /////////////////////////// -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
<!--
 //////////////////////////////////////////////////////////////////// -->
  <link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

    {{--    Message Reply System CSS--}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('admin/css/MessageChatBox.css')}}">

</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
            <div class="sidebar-brand-icon rotate-n-15">
            </div>
            <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemanage"
               aria-expanded="true" aria-controls="collapsemanage">
                <i class="fas fa-fw fa-cog"></i>
                <span>Manage User</span>
            </a>
            <div id="collapsemanage" class="collapse" aria-labelledby="headingmanage" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User Management</h6>
                    <a class="collapse-item" href="/startup/manager">Startup Manage</a>
                    <a class="collapse-item" href="/investor/manager">Investor Manage</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemanagefile"
               aria-expanded="true" aria-controls="collapsemanagefile">
                <i class="fas fa-fw fa-cog"></i>
                <span>File Manager</span>
            </a>
            <div id="collapsemanagefile" class="collapse" aria-labelledby="headingmanagefile" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">File management:</h6>
                    <a class="collapse-item" href="/admin/founder">Founder Management</a>
                    <a class="collapse-item" href="/admin/startupProjects">Project Management</a>
                    <a class="collapse-item" href="/admin/startupFunds">Fund Management</a>
                    <a class="collapse-item" href="/admin/investorfunds">Investor Fund</a>

                </div>
            </div>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemanageAppointments"
               aria-expanded="true" aria-controls="collapsemanageAppointments">
                <i class="fas fa-fw fa-cog"></i>
                <span>Appointments</span>
            </a>
            <div id="collapsemanageAppointments" class="collapse" aria-labelledby="headingmanageAppointments" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Appointments:</h6>
                    <a class="collapse-item" href="/admin/appointment">Create Appointments</a>
                    <a class="collapse-item" href="/admin/startupappointmentlist"> Startup Appointment List</a>
                    <a class="collapse-item" href="/admin/investorappointmentlist"> Investor Appointment List</a>
                </div>
            </div>
</li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-solid fa-envelope"></i>
                <span>Startup Message</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">


                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.startup.view') }}">Sent Message Startups</a>
                    <a class="collapse-item" href="{{ route('admin.startup.message.inbox') }}">Startups Inbox</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesForInvestorMessage"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-solid fa-envelope"></i>
                <span>Investor Message</span>
            </a>
            <div id="collapseUtilitiesForInvestorMessage" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">

                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.investor.view')}}">Sent Message Investor</a>
                    <a class="collapse-item" href="{{ route('admin.investor.message.inbox') }}">Investor Inbox</a>
                </div>
            </div>
        </li>


        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesblog"
               aria-expanded="true" aria-controls="collapseUtilitiesblog">
                <i class="fas fa-solid fa-envelope"></i>
                <span>Blog</span>
            </a>
            <div id="collapseUtilitiesblog" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">


                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/blogpost">Post Create</a>
                    <a class="collapse-item" href="/admin/blogcategory">Add Category</a>
                    <a class="collapse-item" href="/blog/list">All Post</a>
                </div>
            </div>
        </li>

        <!-- <hr class="sidebar-divider">
          <li class="nav-item">
              <a class="nav-link" href="/admin/blogpost"
                  aria-expanded="true" >
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Post Create</span>
              </a>
          </li> -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

                <!-- Topbar Search -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Alerts -->
               
                    <!-- Nav Item - Messages -->
          
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ \Auth::guard('admin')->user()->name}}</span>
                            <img class="img-profile rounded-circle"
                                 src="{{asset('dummy.jpg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/admin/profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <div class ="container-fluid">
                <div class="row">
                    @yield('startup_manager')
                </div>
            </div>
            <div class ="container-fluid">
                @yield('admin_profile_content')
            </div>
            <div class ="container-fluid">
                @yield('investor_manager')
            </div>
            <div class ="container-fluid">
                @yield('edit_startup')
            </div>
            <div class ="container-fluid">
                @yield('admin_menu')
            </div>
            <div class ="container-fluid">
                @yield('admin_email')
            </div>
            <div class ="container-fluid">
                @yield('founder_manager')
            </div>
            <div class ="container-fluid">
                @yield('founder_profile')
            </div>
            <div class ="container-fluid">
                @yield('startup_projects')
            </div>
            <div class ="container-fluid">
                @yield('startup_funds')
            </div>

              <div class ="container">
                <div class="row ml-auto">
              @yield('appointment_create')
              </div>
              <div class="row mr-auto">
              @yield('add_appoinment')
              </div>
              </div>
              <div class="container-fluid">
              @yield('appointmentcopy_create')
              </div>
              <div class="container-fluid">
              @yield('postadd')
              </div>
              <div class="container-fluid">
              @yield('single_post')
              </div>
              <div class="container-fluid">
              @yield('bloglist')
              </div>
              <div class="container-fluid">
              @yield('blogcategories')
              </div>
              <div class="container-fluid">
              @yield('investor_fund')
              </div>
              <div class="container-fluid">
              @yield('startup_appointment_list')
              </div>
              <div class="container-fluid">
              @yield('investor_appointment_list')
              </div>
              
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                <a class="btn btn-primary" href="/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->

<!-- <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script> -->

<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!--
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- AdminLTE App -->
<!-- <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script> -->

<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@yield('scripts')
@yield('scriptsinvestor')
@yield('projects_scripts')
@yield('funds_scripts')
@yield('appointment_scripts')
@yield('appointmentcopy_scripts')
@yield('editor_scripts')
@yield('investor_fundscripts')
@yield('Investor_Appointment')
@yield('startup_appointment_list')

</body>
</html>
