<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/classes/main.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
    Posts - CMS
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
<?load_template('nav')?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
            <li class="nav-item d-flex align-items-center">
              <a href="/profile" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
      <div class="card card-body">
        <div class="row gx-4 mb-2">
          <div class="col-auto">      
          </div>

        <div class="row">
          <div class="row"> 
            
            <div class="col-14 mt-4">
              <div class="d-flex justify-content-around mb-5 ps-3">
                <h5 class="mt-1">Projects</h5>
                <a class="btn bg-gradient-dark" href="javascript:;"><i class="material-icons">add</i>&nbsp;&nbsp;Add New Menu</a>
              </div>
              <div class="row">
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body p-3">
                      <p class="mb-0 text-sm">Project #2</p>
                      <a href="javascript:;">
                        <h5>
                          Modern
                        </h5>
                      </a>
                      <p class="mb-4 text-sm">
                        As Uber works through a huge amount of internal management turmoil.
                      </p>
                      <div class="d-flex align-items-center justify-content-between avatar-group mt-2">
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="../assets/img/home-decor-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                      </a>
                    </div>
                    <div class="card-body p-3">
                      <p class="mb-0 text-sm">Project #1</p>
                      <a href="javascript:;">
                        <h5>
                          Scandinavian
                        </h5>
                      </a>
                      <p class="mb-4 text-sm">
                        Music is something that every person has his or her own specific opinion about.
                      </p>

                        <div class="d-flex align-items-center justify-content-between avatar-group mt-2">
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                      </div>
                     
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="../assets/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body p-3">
                      <p class="mb-0 text-sm">Project #3</p>
                      <a href="javascript:;">
                        <h5>
                          Minimalist
                        </h5>
                      </a>
                      <p class="mb-4 text-sm">
                        Different people have different taste, and various types of music.
                      </p>
                     <div class="d-flex align-items-center justify-content-between avatar-group mt-2">
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body p-3">
                      <p class="mb-0 text-sm">Project #4</p>
                      <a href="javascript:;">
                        <h5>
                          Gothic
                        </h5>
                      </a>
                      <p class="mb-4 text-sm">
                        Why would anyone pick blue over pink? Pink is obviously a better color.
                      </p>
                      <div class="d-flex align-items-center justify-content-between avatar-group mt-2">
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/js/nav-highlight.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>