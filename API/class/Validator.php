<?php
	require("./class/DataManipulator.php");

  class Validator {
		public $postedData;
		public $errors = [];

		function __construct ($data) {
				$this->postedData = $data;
				$this->mainCheck();
        print_r($this->returnStatus());
		}

		private function mainCheck ()  {
			if ($this->checkSelectedJob()) {
        
        if (!empty($this->postedData['data'])) {

          if ($this->postedData['selectedJob'] == 'Master' || $this->postedData['selectedJob'] == 'Internship') {
					  $this->checkMiRequired();
				  }
				  else if ($this->postedData['selectedJob'] == 'Phd' || $this->postedData['selectedJob'] == 'PostDoc') {
					  $this->checkPpRequired();
				  }
				  else {
				  	$this->errors['job'] = 'Invalid job';
				  }
        }
        else {
          $this->errors['data'] = 'Please fill the form';
        }
			}
      else {
        $this->errors['job'] = 'No job was selected';
      }
		}

		private function checkMiRequired () {
			if (count($this->postedData['data']['q1']['choices']) > 0) {
				foreach ($this->postedData['data']['q1']['choices'] as $key => $value) {
					if ($value === 'Other') {
						if ($this->postedData['data']['q1']['textOther'] === '') {
							$this->errors['OtherText'] = 'Question1: Text input must be filled';
						}
					}
				}
			}
			else {
				$this->errors['choices'] = 'Question1: Select at least one checkbox';
			}

			if (is_null($this->postedData['data']['q2']['interestInLab']) || $this->postedData['data']['q2']['interestInLab'] === '') {
				$this->errors['interestInLab'] = 'Question2: Missing anwser';
			}

			if ($this->postedData['data']['q3']['interest']) {
				if ($this->postedData['data']['q3']['selectedProject'] === '') {
					$this->errors['project'] = 'Question3: Project not selected';
				}
			}

			if ($this->postedData['data']['q4']['interest']) {
				if ($this->postedData['data']['q4']['selectedResearch'] === '') {
					$this->errors['research'] = 'Question4: Project not selected';
				}
			}

			if ($this->postedData['data']['q6']['interest']) {
				if ($this->postedData['data']['q6']['text'] === '') {
					$this->errors['mindProject'] = 'Question6: Missing answer';
				}
			}

      if (!empty($this->postedData['data']['personalInfos'])){
				$this->checkEmail($this->postedData['data']['personalInfos']['email']);
				$this->checkNamesChars();
        foreach ($this->postedData['data']['personalInfos'] as $key => $value) {
          if ($value == '') {
            $this->errors[$key] = 'Question7: Missing some personal informations';
          }
			  }
      }
      else {
        $this->errors['personalInfos'] = 'Question7: Missing personal informations';
      }
		}

		private function checkPpRequired () {
      if (!empty($this->postedData['data']['personalInfos'])){
				$this->checkEmail($this->postedData['data']['personalInfos']['email']);
				$this->checkNamesChars();
        foreach ($this->postedData['data']['personalInfos'] as $key => $value) {
          if ($key !== 'personalURL') {
            if ($value == '') {
              $this->errors[$key] = 'Question1: Missing some personal informations';
            }
          }
        }
      }
      else {
        $this->errors['personalInfos'] = 'Question1: Missing personal informations';
      }

      if (is_null($this->postedData['data']['q3']['answer']) || $this->postedData['data']['q3']['answer'] === '') {
				$this->errors['knowAboutLab'] = 'Question3: Missing answer';
			}

      if (!empty($this->postedData['data']['q4']['ratings']['other'])) {
        if ($this->postedData['data']['q4']['ratings']['other']['selected']) {
          if ($this->postedData['data']['q4']['ratings']['other']['text'] !== '') {
              if ($this->postedData['data']['q4']['ratings']['other']['rate'] <= 0) {
                $this->errors['topicOther'] = 'Question 4: Missing rating';
              }
          }
        }
      }

      if (is_null($this->postedData['data']['q5']['answer']) || $this->postedData['data']['q5']['answer'] === '') {
				$this->errors['mindProject'] = 'Question5: Missing answer';
			}

      if ($this->postedData['data']['q6']['interest']) {
				if ($this->postedData['data']['q6']['selectedProject'] === '') {
					$this->errors['project'] = 'Question6: Project not selected';
				}
			}

      if (!empty($this->postedData['data']['q7']['other'])) {
        if ($this->postedData['data']['q7']['other']['text'] !== '') {
            if ($this->postedData['data']['q7']['other']['rate'] <= 0) {
              $this->errors['areasOther'] = 'Question7: Missing rating';
            }
        }
      }
      if (is_null($this->postedData['data']['q8']['answer']) || $this->postedData['data']['q8']['answer'] === '') {
				$this->errors['fitForYou'] = 'Question8: Missing answer';
			}

      if (is_null($this->postedData['data']['q9']['answer']) || $this->postedData['data']['q9']['answer'] === '') {
				$this->errors['fitForLipid'] = 'Question9: Missing answer';
			}
		}

		private function checkNamesChars () {
				$this->postedData['data']['personalInfos']['name'] = $this->checkSpecialChars($this->postedData['data']['personalInfos']['name']);
				$this->postedData['data']['personalInfos']['familyName'] = $this->checkSpecialChars($this->postedData['data']['personalInfos']['familyName']);
		}

		private function checkSelectedJob () {
			return is_null($this->postedData['selectedJob']) || $this->postedData['selectedJob'] === '' ? false : true;
		}

		private function checkEmail ($email) {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$this->errors['email'] = 'Invalid email';
			}
		}

		private function checkSpecialChars ($toCheck) {
			return preg_replace('/[^A-Za-z0-9\-]/', '', $toCheck);
		}

    public function returnStatus () {
      if (count($this->errors) > 0) {
        return json_encode($this->errors); 
      }
      else {
        // return json_encode([]);
				$DataManipulator = new DataManipulator($this->postedData);
      }
    }
  }
?>