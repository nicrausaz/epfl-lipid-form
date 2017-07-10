<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Accept, Accept-Language, Content-Language, Content-Type, X-Requested-With");

  $file = $_FILES['file'];
  print_r($file);

  $extension = strtolower(strrchr($file['name'], '.'));
  $validExt = ['.pdf'];

  if(in_array($extension, $validExt)){
    move_uploaded_file($file['tmp_name'], 'D:/test/' . rand(1, 1000) . '-' . $file['name']);
  }
?>