<?php
  class DataManipulator {
    public $data;
    private $dataPath = '../Data/';
    private $logsPath = '../php_logs/';
    private $userDataPath = '';

    public function __constructor ($data) {
        $this->data = $data;
        //$this->userDataPath = $this->userDataPath;
        $this->createFolders();
        print_r($data);
    }

    public function createFolders () {
      if (!mkdir($this->$dataPath, 0777, true)) {
        $this->log('Data folder creation failed');
      }
      else {
        $this->log('Data folder created');
      }

      // if (!mkdir($this->$userDataPath, 0777, true)) {
      //   $this->log('User folder creation failed');
      // }
      // else {
      //   $this->log('User folder created');
      // }
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
      $date = date('d-m-Y');
      $content = file_get_contents('logs.txt');
      $content .= file_put_contents($this->logsPath . 'logs.txt', $date . $log);
    }

  }
?>