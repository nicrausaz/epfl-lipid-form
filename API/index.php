 <?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Accept, Accept-Language, Content-Language, Content-Type, X-Requested-With");
  header('Content-type: multipart/form-data');
  require("class/Validator.php");

  if ($_FILES) {
    $test = $_FILES;
  }
  else {
    $postedData = json_decode($_POST['formData'], true);
    // print_r($_FILES);
    $Validator = new Validator($postedData);
  }
?>