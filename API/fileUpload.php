 <?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Accept, Accept-Language, Content-Language, Content-Type, X-Requested-With");

  $file = $_FILES['file'];
  print_r($file)

?>