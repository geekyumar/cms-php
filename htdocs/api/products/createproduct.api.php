<?php

include $_SERVER['DOCUMENT_ROOT'].'/classes/main.php';

if(session::get('session_token'))
{ 

$token = session::get('session_token');
$uid = session::get('user_id');

if(isset($_FILES['product_image']['name']) and
    isset($_POST['product_name']) and 
    isset($_POST['product_description']) 
)

{
    $product_image = $_FILES['product_image']['name'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];

  if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Page Unavailable");
}

if (empty($_FILES)) {
    ?><script>alert('No files uploaded. Please fill the form again.')</script><?
}

if ($_FILES['product_image']["error"] !== UPLOAD_ERR_OK) {

    switch ($_FILES['product_image']["error"]) {
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
        ?><script>alert('Unknown error in product.')</script><?
            break;
    }
}

if ($_FILES['product_image']["size"] > 2097152) {
    ?><script>alert('File is too large. Max size allowed: 2MB')</script><?

}

$file_type = $_FILES['product_image']['type'];
if($file_type !== 'image/jpeg' &&
$file_type !== 'image/jpg' &&
$file_type !== 'image/png')
{ 
     die('Invalid image format or file format not supported!');
 }

$product_img_name = $uid . '_' . uniqid() . $product_image;

$destination = $_SERVER['DOCUMENT_ROOT'] . '/assets/products/' . $product_img_name;


$result = products::create($product_img_name, $product_name, $product_description, $token, $uid);

if($result == true)
{ 
    if(
move_uploaded_file($_FILES['product_image']["tmp_name"], $destination))
{
    echo ('<script>alert("Product Created!")</script>');
    ?><script>window.location.href="/products"</script><?
}
}
else
{   
    ?><script>alert('Unable to create product!')</script><?
  
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

