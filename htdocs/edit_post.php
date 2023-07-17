<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/classes/main.php';

if (session::get('session_token')) {

  $session_token = session::get('session_token');
  usersession::authorize($session_token);
  usersession::isValid($session_token);
  $uid = session::get('user_id');
  $userobj = new user($uid);

  if(isset($_GET['post_id']))
{
  $post_id = $_GET['post_id'];
  $conn = database::getConnection();

  $sql = "SELECT * FROM `posts` WHERE `uid` = '$uid' AND `post_id` = '$post_id'";
  $result = $conn->query($sql);

  if($result->num_rows == 1)
  {
    $row = $result->fetch_assoc();
  }
  else
  {
    die("<pre>Invalid Post ID. go <a href='../'>back</a></pre>");
  }

}
else{
  die("<pre>Enter Valid Post ID, or go <a href='../'>back</a></pre>");
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
    Update Posts - CMS
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
  <link id="poststyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
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
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Update Post</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Update Post</h6>
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
                  <h4 class="text-white font-weight-bolder pr-10 mt-1 mb-0">Update Post</h4>
                 <p></p>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" id="myForm">
                  <div class="input-group input-group-outline my-3">
                    <p class="text-primary pt-2 text-gradient font-weight-bold">Select your image :</p>
                    <input disabled type="file" value="/assets/posts/<?echo $row['post_image']?>" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Post Name</label>
                    <input type="text" value="<?echo $row['post_name']?>" id="post-name" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Post Description</label>
                    <input type="text" value="<?echo $row['post_description']?>" id="post-description" rows="8" class="form-control">
                  </div>
                  
                  <div class="text-center">
                    <button type="button" onclick="edit()" class="btn bg-gradient-primary w-100 my-4 mb-2">Update Post</button>
                  </div>
                </form>
                <input type="hidden" id="post-id" value="<?echo $row['post_id']?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <?load_template('footer')?>
      <script>

function edit() { 
    var post_id = document.getElementById('post-id').value
    var post_name = document.getElementById('post-name').value
    var post_description = document.getElementById('post-description').value
    
    var request = new XMLHttpRequest();
    request.open('POST', '/api/posts/editpost.api.php', true)
    
    request.setRequestHeader('Content-type', 'application/json')

    var data = {
      post_id:post_id,
      post_name:post_name,
      post_description:post_description
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
          window.location.href="/posts"
          alert("Post Updated!")
        }
        else{
          alert("Update Post Failed!")
        } 
      }
      else{
        alert("Update Post Failed!")
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