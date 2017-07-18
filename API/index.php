 <?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Accept, Accept-Language, Content-Language, Content-Type, X-Requested-With");
  header('Content-type: multipart/form-data');
  require("class/Validator.php");

  $postedData = json_decode($_POST['formData'], true);
  $Validator = new Validator($postedData, $_FILES);
?>