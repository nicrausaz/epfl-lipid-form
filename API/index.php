 <?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Accept, Accept-Language, Content-Language, Content-Type, X-Requested-With");
  header('Content-type: application/json');
  require("class/Validator.php");

  $postedData = json_decode(file_get_contents('php://input'), true);
  $Validator = new Validator($postedData);
  //echo json_encode();
?>