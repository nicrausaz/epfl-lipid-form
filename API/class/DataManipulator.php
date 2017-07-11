<?php
  class DataManipulator {
    private $data = [];
    private $dataPath = "D:/data/";
    private $logsPath = "D:/php_logs/";
    private $userDataPath = '';
    private $userFullName = '';
    private $recipients = [];

    function __construct ($data) {
      $this->data = $data;
      $this->userFullName = $this->data['data']['personalInfos']['name'] . $this->data['data']['personalInfos']['familyName'];
      $this->userDataPath = $this->dataPath . $this->userFullName .'/';
      $this->createFolders();
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
        $this->getResponsibles();
      }
      else {
        // error
      }
    }

    private function getResponsibles () {
      if ($this->data['job'] === 'Master' || $this->data['job'] === 'Internship') {
        if ($this->data['data']['q3']['interest']) {
          //array_push($this->recipients);
        }
      }
      else {
        $this->getSelectedResearchResp();
      }
    }

    private function getSelectedProjectResp ($project) {

    }
    private function getSelectedResearchResp ($research) {
      
    }
  }
?>