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
    Pages - CMS
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
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pages</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Pages</h6>
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
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="d-flex justify-content-around bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-4">
                <h4 class="text-white text-capitalize pt-2">Pages</h4>
                <a class="btn bg-gradient-dark" href="/create_page"><i class="material-icons">add</i>&nbsp;&nbsp;Add New Page</a>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Page Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Page Heading</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Page Subheading</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

                  <? $result = pages::list($session_token, $id);
                     
                      for ($i=1; $i<=$result->num_rows; $i++)
                      {
                        $row = $result->fetch_assoc();
                        ?>
                    
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                           
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?echo $row['page_name']?></h6>
                            
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?echo $row['page_heading']?></p>
                        
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?echo $row['page_subheading']?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="/view_page?page_id=<?echo $row['page_id']?>" class="badge badge-sm bg-gradient-primary">Click here</span>
                      </td>
                      <td class="d-flex justify-content-around">
                      <a href="/edit_page?page_id=<?echo $row['page_id']?>" class="text-secondary font-weight-bold text-xs" >
                          Edit
                      </a>
                        <a href="javascript:;" onclick="deletePage('<?echo $row['page_id']?>')" class="text-secondary font-weight-bold text-xs" >
                          Delete
                      </a>
                      </td>
                      </tr>                       
                        <?
                      }
                      ?>
                   
                </tbody>
               
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/js/nav-highlight.js"></script>
  <script>

function deletePage(id) {

  if(confirm("Are you sure to delete page?"))
  { 
    var request = new XMLHttpRequest();
    request.open('POST', '/api/pages/deletepage.api.php', true)
    
    request.setRequestHeader('Content-type', 'application/json')

    var data = {
      page_id:id
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
          alert("Page Deleted!")
        }
        else{
          alert("Delete Page Failed!")
        } 
      }
      else{
        alert("Delete Page Failed!")
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
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>