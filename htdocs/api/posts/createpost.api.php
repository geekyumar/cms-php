<?php

include $_SERVER['DOCUMENT_ROOT'].'/classes/main.php';

if(session::get('session_token'))
{ 

$token = session::get('session_token');
$uid = session::get('user_id');

if(isset($_FILES['post_image']['name']) and
isset($_POST['post_name']) and 
isset($_POST['post_description']) 
)

{
    $post_image = $_FILES['post_image']['name'];
    $post_name = $_POST['post_name'];
    $post_description = $_POST['post_description'];

  if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Page Unavailable");
}

if (empty($_FILES)) {
    ?><script>alert('No files uploaded. Please fill the form again.')</script><?
}

if ($_FILES['post_image']["error"] !== UPLOAD_ERR_OK) {

    switch ($_FILES['post_image']["error"]) {
        case UPLOAD_ERR_PARTIAL:
            ?><script>alert('File only partially uploaded.')</script><?
            break;
        case UPLOAD_ERR_NO_FILE:
            ?><script>alert('No files uploaded')</script><?
            break;
        case UPLOAD_ERR_EXTENSION:
            ?><script>alert('File upload stopped by a PHP Extension. Try again.')</script><?
            break;
        case UPLOAD_ERR_FORM_SIZE:
            ?><script>alert('File exceeds maximum file size in HTML.')</script><?
            break;
        case UPLOAD_ERR_INI_SIZE:
            ?><script>alert('File exceeds maximum file size in PHP.')</script><?
            
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            ?><script>alert('Temproary folder not found.')</script><?

            break;
        case UPLOAD_ERR_CANT_WRITE:
            ?><script>alert('failed to write file.')</script><?

            break;
        default:
        ?><script>alert('Unknown error in Post.')</script><?
            break;
    }
}

if ($_FILES['post_image']["size"] > 2097152) {
    ?><script>alert('File is too large. Max size allowed: 2MB')</script><?

}

$post_img_name = $uid . '_' . uniqid() . $post_image;

$destination = $_SERVER['DOCUMENT_ROOT'] . '/assets/posts/' . $post_img_name;


$result = posts::create($post_img_name, $post_name, $post_description, $token, $uid);

if($result == true)
{ 
    if(
move_uploaded_file($_FILES['post_image']["tmp_name"], $destination))
{ 
?><script>alert('Post Created!')</script><?
header('Location: /posts');

}
}
else
{   
    ?><script>alert('Unable to create post!')</script><?
  
}

}
else
{
    ?><script>alert('Invalid form!')</script><?
}

}
else{
    header('Location: /users/signup');
}



?>

