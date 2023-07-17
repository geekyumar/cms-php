<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/classes/main.php';

if (session::get('session_token')) {

  $session_token = session::get('session_token');
  usersession::authorize($session_token);
  usersession::isValid($session_token);
  $id = session::get('user_id');
  $userobj = new user($id);


if (isset($_GET['signout'])) {

  session::destroy();
  header('Location:  /users/login');

}

if(isset($_GET['signout_all']))
{
user::signout_all($userobj->id);
session::destroy();
header('Location: /users/login');
}

}
else{
  header('Location: /users/login');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
    Create Page - CMS
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
   <?load_template('head')?>

    <div class="container my-auto">
        <div class="row">
          <div class="col-lg-6 mt-5 col-md-8 col-12">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="d-flex justify-content-around bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder pr-10 mt-1 mb-0">Create Page</h4>
                 <p></p>
                </div>
              </div>
              <div class="card-body">
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Page Name</label>
                    <input type="text" id="page-name" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Page Heading</label>
                    <input type="text" id="page-heading" rows="8" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Page Subheading</label>
                    <input type="text" id="page-subheading" rows="4" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Page Content</label>
                    <input type="text" id="page-content" rows="8" class="form-control">
                  </div>

                  <div class="text-center">
                    <button type="button" onclick="create()" class="btn bg-gradient-primary w-100 my-4 mb-2">Create Page</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>

function create() { 
    var page_name = document.getElementById('page-name').value
    var page_heading = document.getElementById('page-heading').value
    var page_subheading = document.getElementById('page-subheading').value
    var page_content = document.getElementById('page-content').value

    var request = new XMLHttpRequest();
    request.open('POST', '/api/pages/createpage.api.php', true)
    
    request.setRequestHeader('Content-type', 'application/json')

    var data = {
      page_name:page_name,
      page_heading:page_heading,
      page_subheading:page_subheading,
      page_content:page_content
    }
    requestData = JSON.stringify(data)

    request.onload = function()
    {
      if(request.status === 200)
      {
        responseData = JSON.parse(request.responseText)
        if(responseData['response'] == 'success')
        {
          window.location.href="/pages"
          alert("Page Created!")
        }
        else{
          alert("Create Page Failed!")
        } 
      }
      else{
        alert("Create Page Failed!")
      }
    }
    
    request.send(requestData)
  }
  </script>

      <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

  </script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
