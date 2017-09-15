<?php
  require_once('class/MailSender.php');

  class DataManipulator {
    private $data = [];
    private $dataPath = "\\\\enac1files.epfl.ch\\LIPID\\commun1\\01 Administration\\New_Applications\\";
    private $userDataPath = '';
    private $userFilesPath = '';
    private $userFullName = '';
    private $recipients = [];
    private $files = [];
    public $MailSender;

    function __construct ($data, $files) {
      $this->data = $data;
      $this->files = $files;
      $this->userFullName = $this->data['data']['personalInfos']['name'] . $this->data['data']['personalInfos']['familyName'];
      $this->userDataPath = $this->dataPath . date("Y-n-j-") . $this->userFullName .'/';
      $this->userFilesPath = $this->userDataPath . 'files/';
      $this->MailSender = new MailSender();
      $this->createFolders();
    }

    private function createFolders () {
      if (!is_dir($this->userDataPath)) {
        if (mkdir($this->userDataPath, 0777, true)) {
          $this->writeDataFile();
        }
        if (mkdir($this->userFilesPath, 0777, true)) {
          $this->uploadFiles();
        }
        else {
          // error
        }
      }
      else {
        // error
      }
    }

    private function writeDataFile () {
      if (file_put_contents($this->userDataPath . "data.json", json_encode($this->data ,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT))){
        $this->MailSender->toApplicant($this->data['data']['personalInfos']['email']);
        $this->mailProjectResponsibles();
        $this->mailStarRatings();
      }
      else {
        // error
      }
    }

    private function uploadFiles () {
      foreach ($this->files as $file) {
        if (move_uploaded_file($file['tmp_name'], $this->userFilesPath . $file['name'])) {
      
        }
        else {
          // error
        }
      }
    }

    private function mailProjectResponsibles () {
      if ($this->data['selectedJob'] === 'Master' || $this->data['selectedJob'] === 'Internship') {
        if ($this->data['data']['q3']['interest']) {
          $this->MailSender->toProjectResp($this->data['data']['q3']['selectedProject'], $this->userDataPath);
        }
        if ($this->data['data']['q4']['interest']) {
          $this->MailSender->toProjectResp($this->data['data']['q4']['selectedResearch'], $this->userDataPath);
        }
      }
      else {
        if ($this->data['data']['q6']['interest']) {
          $this->MailSender->toProjectResp($this->data['data']['q6']['selectedProject'], $this->userDataPath);
        }
      }
    }

    private function mailStarRatings () {
      if ($this->data['selectedJob'] === 'Master' || $this->data['selectedJob'] === 'Internship') {
        if (isset($this->data['data']['q5']['ratings']['ratingEnergy'])) {
          $ratings = array(
            'Energy' => $this->data['data']['q5']['ratings']['ratingEnergy'],
            'Comfort' => $this->data['data']['q5']['ratings']['ratingComfort'],
            'Perception' => $this->data['data']['q5']['ratings']['ratingPerception'],
            'Health' => $this->data['data']['q5']['ratings']['ratingHealth']
          );
        }
        else {
          $ratings = array('Energy' => 0,'Comfort' => 0,'Perception' => 0,'Health' => 0 );
        }
      }
      else {
        if (isset($this->data['data']['q4']['ratings']['ratingEnergy'])) {
          $ratings = array(
            'Energy' => $this->data['data']['q4']['ratings']['ratingEnergy'],
            'Comfort' => $this->data['data']['q4']['ratings']['ratingComfort'],
            'Perception' => $this->data['data']['q4']['ratings']['ratingPerception'],
            'Health' => $this->data['data']['q4']['ratings']['ratingHealth']
          );
        }
        else {
          $ratings = array('Energy' => 0,'Comfort' => 0,'Perception' => 0,'Health' => 0 );
        }
      }
      $this->MailSender->getRecipients($ratings,  $this->data['selectedJob'], $this->userDataPath);
    }
  }
?>