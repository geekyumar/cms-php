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
  <link id="Poststyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
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
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Posts</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Posts</h6>
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
      <div class="card card-body">
        
          <div class="col-8">      
          </div>

        <div class="row">

            <div class="col-14">
            <div class="d-flex justify-content-around bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-4">
                <h4 class="text-white text-capitalize pt-2">Posts</h4>
                <a class="btn bg-gradient-dark" href="/create_post"><i class="material-icons">add</i>&nbsp;&nbsp;Add New Post</a>
              </div>
              <div class="album py-5">
        <div class="container">
          <div class="row">

                      <?

            $result = posts::list($session_token, $id);

            for ($i=1; $i<=$result->num_rows; $i++)
            {
              $row = $result->fetch_assoc();
              ?>

          <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="/assets/posts/<?echo $row['post_image']?>" style="height: 100%; width: 100%;">
                <div class="card-body">
                  <h5><?echo $row['post_name']?></h5>
                  <p class="card-text"><?echo $row['post_description']?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="/edit_post?post_id=<?echo $row['post_id']?>" class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                        <a href="javascript:;" onclick="deletePost('<?echo $row['post_id']?>')" class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" data-toggle="tooltip" data-original-title="Edit user">
                          Delete
                        </a>
                    </div>
                    <small class="text-muted"><?echo $row['post_create_time']?></small>
                  </div>
                </div>
              </div>
            </div>
<? }
?>
          </div>
        </div>
      </div>
    </div>
    <?load_template('footer')?>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/js/nav-highlight.js"></script>
  <script>

function deletePost(id) {

  if(confirm("Are you sure to delete post?"))
  { 
    var request = new XMLHttpRequest();
    request.open('POST', '/api/posts/deletepost.api.php', true)
    
    request.setRequestHeader('Content-type', 'application/json')

    var data = {
      post_id:id
    }
    requestData = JSON.stringify(data)

    request.onload = function()
    {
      if(request.status === 200)
      {
        responseData = JSON.parse(request.responseText)
        if(responseData['response'] == 'success')
        {
          window.location.href="/posts"
          alert("Post Deleted!")
        }
        else{
          alert("Delete Post Failed!")
        } 
      }
      else{
        alert("Delete Post Failed!")
      }
    }
    
    request.send(requestData)
  }
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
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example Posts etc -->
  <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>