 <?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Accept, Accept-Language, Content-Language, Content-Type");
  require("class/Validator.php");

  /*
  WORKING
  $postedData = json_encode(file_get_contents('php://input'));
  json_decode($postedData, JSON_PRETTY_PRINT);
  file_put_contents('tes2t.json',json_decode($postedData, JSON_PRETTY_PRINT), true);
  */

  $postedData = '{"selectedJob":"Internship","q1":{"choices":[],"textOther":""},"q2":{"interestInLab":""},"q3":{"interest":true,"selectedProject":""},"q4":{"interest":true,"selectedResearch":""},"q5":{"ratings":{"ratingEnergy":3,"ratingComfort":4,"ratingPerception":3,"ratingHealth":3}},"q6":{"interest":true,"text":""},"q7":{"personalInfos":{"name":"sdfhsdfh","familyName":"","email":"hsdfh","university":"","projectDate":"2017-06-20T22:00:00.000Z","projectFunding":"sdfhsdfh"}},"q8":{}}';
  $postedData = json_decode($postedData, true);
  $Validator = new Validator($postedData);
?>