<?php
  class Validator {
		public $postedData;
		public $errors = [];

		function __construct($data) {
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
          $this->errors['data'] = 'Fill the form';
        }
			}
      else {
        $this->errors['job'] = 'Select a job';
      }
			// echo '<pre>';
      // print_r($this->postedData);
			// print_r($this->errors);
			// echo '</pre>';
		}

		private function checkMiRequired () {
			if (count($this->postedData['data']['q1']['choices']) > 0) {
				foreach ($this->postedData['data']['q1']['choices'] as $key => $value) {
					if ($value === 'Other') {
						if ($this->postedData['data']['q1']['textOther'] === '') {
							$this->errors['OtherText'] = 'Please fill';
						}
					}
				}
			}
			else {
				$this->errors['choices'] = 'Select at least one';
			}

			if (is_null($this->postedData['data']['q2']['interestInLab']) || $this->postedData['data']['q2']['interestInLab'] === '') {
				$this->errors['interestInLab'] = 'Please fill';
			}

			if ($this->postedData['data']['q3']['interest']) {
				if ($this->postedData['data']['q3']['selectedProject'] === '') {
					$this->errors['project'] = 'Please select';
				}
			}

			if ($this->postedData['data']['q4']['interest']) {
				if ($this->postedData['data']['q4']['selectedResearch'] === '') {
					$this->errors['research'] = 'Please select';
				}
			}

			if ($this->postedData['data']['q6']['interest']) {
				if ($this->postedData['data']['q6']['text'] === '') {
					$this->errors['mindProject'] = 'Please fill';
				}
			}

      if (!empty($this->postedData['data']['q7']['personalInfos'])){
        foreach ($this->postedData['data']['q7']['personalInfos'] as $key => $value) {
          if ($value == '') {
            echo $key;
            $this->errors[$key] = 'Please fill';
          }
			  }
      }
      else {
        $this->errors['personalInfos'] = 'Please fill';
      }
			
		}

		private function checkPpRequired () {
      if (!empty($this->postedData['data']['q1']['personalInfos'])){
        foreach ($this->postedData['data']['q1']['personalInfos'] as $key => $value) {
          if ($key !== 'personalURL') {
            if ($value == '') {
              $this->errors[$key] = 'Please fill';
            }
          }
        }
      }
      else {
        $this->errors['personalInfos'] = 'Please fill';
      }

      if (is_null($this->postedData['data']['q3']['answer']) || $this->postedData['data']['q3']['answer'] === '') {
				$this->errors['knowAboutLab'] = 'Please fill';
			}

      if (!empty($this->postedData['data']['q4']['ratings']['other'])) {
        if ($this->postedData['data']['q4']['ratings']['other']['selected']) {
          if ($this->postedData['data']['q4']['ratings']['other']['text'] !== '') {
              if ($this->postedData['data']['q4']['ratings']['other']['rate'] <= 0) {
                $this->errors['topicOther'] = 'Please rate';
              }
          }
        }
      }

      if (is_null($this->postedData['data']['q5']['answer']) || $this->postedData['data']['q5']['answer'] === '') {
				$this->errors['mindProject'] = 'Please fill';
			}

      if ($this->postedData['data']['q6']['interest']) {
				if ($this->postedData['data']['q6']['selectedProject'] === '') {
					$this->errors['project'] = 'Please select';
				}
			}

      if (!empty($this->postedData['data']['q7']['other'])) {
        if ($this->postedData['data']['q7']['other']['text'] !== '') {
            if ($this->postedData['data']['q7']['other']['rate'] <= 0) {
              $this->errors['areasOther'] = 'Please rate';
            }
        }
      }
      if (is_null($this->postedData['data']['q8']['answer']) || $this->postedData['data']['q8']['answer'] === '') {
				$this->errors['fitForYou'] = 'Please fill';
			}

      if (is_null($this->postedData['data']['q9']['answer']) || $this->postedData['data']['q9']['answer'] === '') {
				$this->errors['fitForLipid'] = 'Please fill';
			}
		}

		private function checkSelectedJob() {
			return is_null($this->postedData['selectedJob']) || $this->postedData['selectedJob'] === '' ? false : true;
		}

    public function returnStatus () {
      if (count($this->errors) > 0) {
        return json_encode($this->errors);
      }
      else {
        return json_encode([]);
      }
    }
  }
?>