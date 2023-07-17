<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/classes/main.php';

if (session::get('session_token')) {

  $session_token = session::get('session_token');
  usersession::authorize($session_token);
  usersession::isValid($session_token);
  $uid = session::get('user_id');
  $userobj = new user($uid);

  if(isset($_GET['page_id']))
{
  $page_id = $_GET['page_id'];
  $conn = database::getConnection();

  $sql = "SELECT * FROM `pages` WHERE `uid` = '$uid' AND `page_id` = '$page_id'";
  $result = $conn->query($sql);

  if($result->num_rows == 1)
  {
    $row = $result->fetch_assoc();
  }
  else
  {
    die("<pre>Invalid page ID. go <a href='../'>back</a></pre>");
  }

}
else{
  die("<pre>Enter Valid page ID, or go <a href='../'>back</a></pre>");
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
    Update Page - CMS
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
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Update Page</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Update Page</h6>
      </nav>
          <li class="nav-item d-flex align-items-center">
            <a href="/profile" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline"><?echo $userobj->name?></span>
              <ol></a>
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

    <div class="container my-auto">
        <div class="row">
          <div class="col-lg-6 mt-5 col-md-8 col-12">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="d-flex justify-content-around bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder pr-10 mt-1 mb-0">Update Page</h4>
                 <p></p>
                </div>
              </div>
              <div class="card-body">
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Page Name</label>
                    <input type="text" value="<?echo $row['page_name']?>" id="page-name" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Page Heading</label>
                    <input type="text" value="<?echo $row['page_heading']?>" id="page-heading" rows="8" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Page Subheading</label>
                    <input type="text" value="<?echo $row['page_subheading']?>" id="page-subheading" rows="4" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Page Content</label>
                    <input type="text" value="<?echo $row['page_content']?>" id="page-content" rows="8" class="form-control">
                  </div>
                  <input type="hidden" id="page-id" value="<?echo $row['page_id']?>">
                  <div class="text-center">
                    <button type="button" onclick="edit()" class="btn bg-gradient-primary w-100 my-4 mb-2">Update Page</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?load_template('footer')?>
      <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

<script>

function edit() { 
    var page_id = document.getElementById('page-id').value
    var page_name = document.getElementById('page-name').value
    var page_heading = document.getElementById('page-heading').value
    var page_subheading = document.getElementById('page-subheading').value
    var page_content = document.getElementById('page-content').value

    var request = new XMLHttpRequest();
    request.open('POST', '/api/pages/editpage.api.php', true)
    
    request.setRequestHeader('Content-type', 'application/json')

    var data = {
      page_id:page_id,
      page_name:page_name,
      page_heading:page_heading,
      page_subheading:page_subheading,
      page_content:page_content
    }
    requestData = JSON.stringify(data)
    console.log(requestData)

    request.onload = function()
    {
      if(request.status === 200)
      {
        responseData = JSON.parse(request.responseText)
        if(responseData['response'] == 'success')
        {
          window.location.href="/pages"
          alert("Page Updated!")
        }
        else{
          alert("Update page Failed!")
        } 
      }
      else{
        alert("Update page Failed!")
      }
    }
    
    request.send(requestData)
  }

</script>

  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
