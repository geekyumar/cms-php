<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/classes/main.php';

if (session::get('session_token')) {

  $session_token = session::get('session_token');
  usersession::authorize($session_token);
  usersession::isValid($session_token);
  $uid = session::get('user_id');
  $userobj = new user($uid);

  if(isset($_GET['menu_id']))
{
  $menu_id = $_GET['menu_id'];
  $conn = database::getConnection();

  $sql = "SELECT * FROM `menu` WHERE `uid` = '$uid' AND `menu_id` = '$menu_id'";
  $result = $conn->query($sql);

  if($result->num_rows == 1)
  {
    $row = $result->fetch_assoc();
  }
  else
  {
    die("<pre>Invalid Menu ID. go <a href='../'>back</a></pre>");
  }

}
else{
  die("<pre>Enter Valid Menu ID, or go <a href='../'>back</a></pre>");
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
    Edit Menu - CMS
  </title>
  <!--     Fonts and icons -->
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
    <!-- End Navbar -->

    <div class="container my-auto">
        <div class="row">
          <div class="col-lg-6 mt-5 col-md-8 col-12">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="d-flex justify-content-around bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder pr-10 mt-1 mb-0">Update Menu</h4>
                 <p></p>
                </div>
              </div>
              <div class="card-body">
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Menu name</label>
                    <input type="text" value="<?echo $row['menu_name']?>" id="menu-name" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Menu Link</label>
                    <input type="text" value="<?echo $row['menu_link']?>" id="menu-link" rows="8" class="form-control">
                  </div>
                  <input type="hidden" value="<?echo $menu_id?>" id="menu-id" rows="8" class="form-control">

                  <div class="text-center">
                    <button type="button" onclick="edit()" class="btn bg-gradient-primary w-100 my-4 mb-2">Update Menu</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    var menu_name = document.getElementById('menu-name').value
    var menu_link = document.getElementById('menu-link').value
    var menu_id = document.getElementById('menu-id').value

    var request = new XMLHttpRequest();
    request.open('POST', '/api/editmenu.api.php', true)
    
    request.setRequestHeader('Content-type', 'application/json')

    var data = {
      menu_name:menu_name,
      menu_link:menu_link,
      menu_id:menu_id
    }
    requestData = JSON.stringify(data)

    request.onload = function()
    {
      if(request.status === 200)
      {
        responseData = JSON.parse(request.responseText)
        if(responseData['response'] == 'success')
        {
          window.location.href="/menu"
          alert("Menu Updated!")
        }
        else{
          alert("Update Menu Failed!")
        } 
      }
      else{
        alert("Update Menu Failed!")
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
