<?php
  class DataManipulator {
    public $data = [];
    public $dataPath = "D:/data/";
    public $logsPath = "D:/php_logs/";
    public $userDataPath = '';
    public $userFullName = '';

    function __construct ($data) {
      $this->data = $data;
      $this->userFullName = $this->data['data']['personalInfos']['name'] . $this->data['data']['personalInfos']['familyName'];
      $this->userDataPath = $this->dataPath . $this->userFullName .'/';
      $this->createFolders();
    }

    public function createFolders () {
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

    public function writeDataFile () {
      if (file_put_contents($this->userDataPath . "data.json", json_encode($this->data ,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT))){
        
      }
      else {
        // error
      }
    }

    public function getSelectedProjectResp ($project) {

    }
    public function getSelectedResearchResp ($research) {
      
    }
  }
?>