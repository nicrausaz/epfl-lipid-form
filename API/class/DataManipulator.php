<?php
  require_once('class/MailSender.php');

  class DataManipulator {
    private $data = [];
    private $dataPath = "D:/data/";
    private $userDataPath = '';
    private $userFullName = '';
    private $recipients = [];
    private $files = [];
    public $MailSender;

    function __construct ($data) {
      $this->data = $data;
      $this->files = $data['data']['files'];
      $this->userFullName = $this->data['data']['personalInfos']['name'] . $this->data['data']['personalInfos']['familyName'];
      $this->userDataPath = $this->dataPath . $this->userFullName .'/';
      $this->MailSender = new MailSender();
      $this->createFolders();
      $this->uploadFiles();
    }

    private function createFolders () {
      if (!is_dir($this->userDataPath)) {
        if (mkdir($this->userDataPath, 0777, true)) {
          $this->writeDataFile();
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
      foreach ($this->files as $key => $value) {
        echo($value);
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
        $ratings = array(
          'Energy' => $this->data['data']['q5']['ratings']['ratingEnergy'],
          'Comfort' => $this->data['data']['q5']['ratings']['ratingComfort'],
          'Perception' => $this->data['data']['q5']['ratings']['ratingPerception'],
          'Health' => $this->data['data']['q5']['ratings']['ratingHealth']
        );
      }
      else {
        $ratings = array(
          'Energy' => $this->data['data']['q4']['ratings']['ratingEnergy'],
          'Comfort' => $this->data['data']['q4']['ratings']['ratingComfort'],
          'Perception' => $this->data['data']['q4']['ratings']['ratingPerception'],
          'Health' => $this->data['data']['q4']['ratings']['ratingHealth']
        );
      }
      $this->MailSender->getRecipients($ratings,  $this->data['selectedJob'], $this->userDataPath);
    }
  }
?>