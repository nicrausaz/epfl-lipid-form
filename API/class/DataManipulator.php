<?php
  class DataManipulator {
    public $data;
    public $dataPath = "D:/Data/";
    public $logsPath = "D:/php_logs/";
    public $userDataPath = '';

    public function __constructor ($data) {
        $this->data = $data;
        $this->userDataPath = $this->userDataPath . uniqid(); //wtf
        $this->createFolders();
    }

    public function createFolders () {
      if (!mkdir($this->userDataPath, 0777, true)) {
        $this->log('User folder creation failed');
      }
      else {
        $this->log('User folder created');
      }
    }

    public function writeDataFile () {
      if (file_put_contents("data.json", json_encode($this->data))){
        $this->log('Data file created');
      }
      else {
        $this->log('Error creating data file');
      }
    }

    public function log ($log) {
      $date = date('d-m-Y-H-i-s');
      $content = file_get_contents($this->logsPath . 'logs.txt');
      $content .= file_put_contents($this->logsPath . 'logs.txt', $date . $log);
    }

  }
?>