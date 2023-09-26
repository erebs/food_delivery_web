

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="admin, dashboard">
  <meta name="author" content="DexignZone">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Dompet : Payment Admin Template">
  <meta property="og:title" content="Dompet : Payment Admin Template">
  <meta property="og:description" content="Dompet : Payment Admin Template">
  <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
  <meta name="format-detection" content="telephone=no">
  
  <!-- PAGE TITLE HERE -->
  <title>Admin | @yield('title')</title>
  
  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/png" href="{{asset('/admin/images/favicon.png')}}">
  
  <link href="{{asset('/admin/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/admin/vendor/nouislider/nouislider.min.css')}}">
  <!-- Style css -->
    <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
  <link href="{{asset('/admin/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
         <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
         <link rel="stylesheet" href="{{ asset('admin/css/style1.css')}}">
  
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
       <span style="--i:1">L</span>
       <span style="--i:2">o</span>
       <span style="--i:3">a</span>
       <span style="--i:4">d</span>
       <span style="--i:5">i</span>
       <span style="--i:6">n</span>
       <span style="--i:7">g</span>
       <span style="--i:8">.</span>
       <span style="--i:9">.</span>
       <span style="--i:10">.</span>
    </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
          
            <a href="index.html" class="brand-logo">
        <center>
            <img src="{{asset('/admin/images/logo2.png')}}" alt="" style="width: 50%;">
            </center>
            </a>
          
            <div class="nav-control">
                <div class="hamburger"  style="color: white !important;">
                    <span class="line"  style="color: white !important;"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
    
    
    
    <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
              <div class="dashboard_bar">
                               @yield('head1')
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
              <li class="nav-item">
                <div class="input-group search-area">
                  <input type="text" class="form-control" placeholder="Search here...">
                  <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                </div>
              </li>
              <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M3.88552 6.2921C1.95571 6.54135 0.439911 8.19656 0.439911 10.1896V10.7253C0.439911 12.8874 2.21812 14.6725 4.38019 14.6725H12.7058V24.9768H7.01104C5.77451 24.9768 4.82009 24.0223 4.82009 22.7858V18.4039C4.84523 16.6262 2.16581 16.6262 2.19096 18.4039V22.7858C2.19096 25.4334 4.36345 27.6059 7.01104 27.6059H21.0331C23.6807 27.6059 25.8532 25.4334 25.8532 22.7858V13.9981C26.9064 13.286 27.6042 12.0802 27.6042 10.7253V10.1896C27.6042 8.17115 26.0501 6.50077 24.085 6.28526C24.0053 0.424609 17.6008 -1.28785 13.9827 2.48534C10.3936 -1.60185 3.7545 1.06979 3.88552 6.2921ZM12.7058 5.68103C12.7058 5.86287 12.7033 6.0541 12.7058 6.24246H6.50609C6.55988 2.31413 11.988 1.90765 12.7058 5.68103ZM21.4559 6.24246H15.3383C15.3405 6.05824 15.3538 5.87664 15.3383 5.69473C15.9325 2.04532 21.3535 2.18829 21.4559 6.24246ZM4.38019 8.87502H12.7058V12.0382H4.38019C3.62918 12.0382 3.06562 11.4764 3.06562 10.7253V10.1896C3.06562 9.43859 3.6292 8.87502 4.38019 8.87502ZM15.3383 8.87502H23.6656C24.4166 8.87502 24.9785 9.43859 24.9785 10.1896V10.7253C24.9785 11.4764 24.4167 12.0382 23.6656 12.0382H15.3383V8.87502ZM15.3383 14.6725H23.224V22.7858C23.224 24.0223 22.2696 24.9768 21.0331 24.9768H15.3383V14.6725Z" fill="#4f7086"></path> 
                  </svg>
                  <span class="badge light text-white bg-primary rounded-circle">2</span>
                                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <div id="dlab_W_TimeLine02" class="widget-timeline dlab-scroll style-1 ps ps--active-y p-3 height370">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"></div>
                                            <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                <span>10 minutes ago</span>
                                                <h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                </div>
              </li>


                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                   <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.638 4.9936V2.3C12.638 1.5824 13.2484 1 14.0006 1C14.7513 1 15.3631 1.5824 15.3631 2.3V4.9936C17.3879 5.2718 19.2805 6.1688 20.7438 7.565C22.5329 9.2719 23.5384 11.5872 23.5384 14V18.8932L24.6408 20.9966C25.1681 22.0041 25.1122 23.2001 24.4909 24.1582C23.8709 25.1163 22.774 25.7 21.5941 25.7H15.3631C15.3631 26.4176 14.7513 27 14.0006 27C13.2484 27 12.638 26.4176 12.638 25.7H6.40705C5.22571 25.7 4.12888 25.1163 3.50892 24.1582C2.88759 23.2001 2.83172 22.0041 3.36039 20.9966L4.46268 18.8932V14C4.46268 11.5872 5.46691 9.2719 7.25594 7.565C8.72068 6.1688 10.6119 5.2718 12.638 4.9936ZM14.0006 7.5C12.1924 7.5 10.4607 8.1851 9.18259 9.4045C7.90452 10.6226 7.18779 12.2762 7.18779 14V19.2C7.18779 19.4015 7.13739 19.6004 7.04337 19.7811C7.04337 19.7811 6.43703 20.9381 5.79662 22.1588C5.69171 22.3603 5.70261 22.6008 5.82661 22.7919C5.9506 22.983 6.16996 23.1 6.40705 23.1H21.5941C21.8298 23.1 22.0492 22.983 22.1732 22.7919C22.2972 22.6008 22.3081 22.3603 22.2031 22.1588C21.5627 20.9381 20.9564 19.7811 20.9564 19.7811C20.8624 19.6004 20.8133 19.4015 20.8133 19.2V14C20.8133 12.2762 20.0953 10.6226 18.8172 9.4045C17.5391 8.1851 15.8073 7.5 14.0006 7.5Z" fill="#4f7086"></path>
                  </svg>
                                    <span class="badge light text-white bg-primary rounded-circle">12</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="dlab_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
                    <ul class="timeline">
                      <li>
                        <div class="timeline-panel">
                          <div class="media me-2">
                            <img alt="image" width="50" src="{{asset('/admin/images/avatar/1.jpg')}}">
                          </div>
                          <div class="media-body">
                            <h6 class="mb-1">Dr sultads Send you Photo</h6>
                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                          </div>
                        </div>
                      </li>
                      
                      
                    </ul>
                  </div>
                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
                                </div>
                            </li>
              
                            <li class="nav-item">
                <a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block d-none">Generate Report<i class="las la-signal ms-3 scale5"></i></a>
              </li>
                        </ul>
                    </div>
        </nav>
      </div>
    </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
          <li class="dropdown header-profile">
            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
              <img src="{{ asset('admin/img/'.Auth::guard('admin')->user()->profile_image)}}" width="20" alt="">
              <div class="header-info ms-3">
                <span class="font-w600 " style="color: white !important;">Hi,<b>   {{Auth::guard('admin')->user()->name}}</b></span>
                <small class="text-end font-w400">Administrator</small>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a href="/administrator/edit-profile" class="dropdown-item ai-icon">
                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span class="ms-2">Edit Profile </span>
              </a>
              
              <a href="/administrator/logout" class="dropdown-item ai-icon">
                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                <span class="ms-2">Logout </span>
              </a>
            </div>
          </li>

                    <li><a href="/administrator/dashboard" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-025-dashboard"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

               <!--   <li><a href="/administrator/add-franchise" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-plus-circle"></i>
                        <span class="nav-text">Add Franchise</span>
                    </a>
                </li> -->
                   
                    
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
              <i class="fa fa-industry"></i>
              <span class="nav-text">Franchise</span>
            </a>
                        <ul aria-expanded="false">
                            <li><a href="/administrator/add-franchise">Add new</a></li>
                            <li><a href="/administrator/active-franchise">Active</a></li>
                            <li><a href="/administrator/blocked-franchise">Blocked</a></li>
                        </ul>
                    </li>

                     <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
              <i class="fa fa-list-alt"></i>
              <span class="nav-text">Categories</span>
            </a>
                        <ul aria-expanded="false">
                            <li><a href="/administrator/restaurent-categories">Restaurent</a></li>
                            <li><a href="/administrator/grocery-categories">Grocery</a></li>
                           
                        </ul>
                    </li>



                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
              <i class="fa fa-file"></i>
              <span class="nav-text">Reports</span>
            </a>
                        <ul aria-expanded="false">
                            <li><a href="chart-morris.html">Todays</a></li>
                            <li><a href="chart-chartjs.html">All</a></li>
                        </ul>
                    </li>

                    <!-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-041-graph"></i>
                        <span class="nav-text">Orders</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="chart-flot.html">Pending</a></li>
                        <li><a href="chart-morris.html">Approved</a></li>
                        <li><a href="chart-chartjs.html">Dispatched</a></li>
                        <li><a href="chart-chartjs.html">Delivered</a></li>
                        <li><a href="chart-chartjs.html">Rejected</a></li>
                    </ul>
                </li> -->

               <!--  <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-users"></i>
                    <span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="chart-flot.html">Active</a></li>
                    <li><a href="chart-flot.html">Blocked</a></li>
                </ul>
            </li> -->

                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-cog"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/administrator/change-password">Change Password</a></li>
                    <!-- <li><a href="chart-flot.html">Sleep</a></li> -->
                    <li><a href="/administrator/logout">Logout</a></li>
                </ul>
            </li>
                    
                    
                    
                    
                   
                </ul>
        <div class="copyright">
          <p><strong>Admin Dashboard</strong> © 2023 All Rights Reserved</p>
          <p class="fs-12">Made with <span class="heart"></span> by Arun</p>
        </div>
      </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    
    




 @yield('contents')









        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
    
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">Arun</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    


  </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('/admin/vendor/global/global.min.js')}}"></script>
  <script src="{{asset('/admin/vendor/chart.js/Chart.bundle.min.js')}}"></script>
  <script src="{{asset('/admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
  
  <!-- Apex Chart -->
  <script src="{{asset('/admin/vendor/apexchart/apexchart.js')}}"></script>
  <script src="{{asset('/admin/vendor/nouislider/nouislider.min.js')}}"></script>
  <script src="{{asset('/admin/vendor/wnumb/wNumb.js')}}"></script>
  
  <!-- Dashboard 1 -->
  <script src="{{asset('/admin/js/dashboard/dashboard-1.js')}}"></script>

    <script src="{{asset('/admin/js/custom.min.js')}}"></script>
  <script src="{{asset('/admin/js/dlabnav-init.js')}}"></script>
<!--   <script src="{{asset('/admin/js/demo.js')}}"></script>
    <script src="{{asset('/admin/js/styleSwitcher.js')}}"></script> -->

    <script src="{{asset('/admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/admin/js/plugins-init/datatables.init.js')}}"></script>

  <script src="{{asset('/admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{ asset('js/sweetalert.js') }}"></script>
  
</body>
</html>

<script type="text/javascript">
     $('#a2').hide();
     $('#ab2').hide();
     $('#ab4').hide();
     $('#ab6').hide();
     $('#submitButton1').hide();
</script>