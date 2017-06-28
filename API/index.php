 <?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Accept, Accept-Language, Content-Language, Content-Type, X-Requested-With");
  header('Content-type: application/json');
  require("class/Validator.php");

  // $postedData = '{"selectedJob":"Internship","q1":{"choices":[],"textOther":""},"q2":{"interestInLab":""},"q3":{"interest":true,"selectedProject":""},"q4":{"interest":true,"selectedResearch":""},"q5":{"ratings":{"ratingEnergy":3,"ratingComfort":4,"ratingPerception":3,"ratingHealth":3}},"q6":{"interest":true,"text":""},"q7":{"personalInfos":{"name":"sdfhsdfh","familyName":"","email":"hsdfh","university":"","projectDate":"2017-06-20T22:00:00.000Z","projectFunding":"sdfhsdfh"}},"q8":{}}';
  $postedData = json_decode(file_get_contents('php://input'), true);
  $Validator = new Validator($postedData);
  //echo json_encode();
?>