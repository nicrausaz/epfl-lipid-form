<?php
  class Validator {
		public $postedData;
		public $errors = [];

		function __construct($data) {
				$this->postedData = $data;
				$this->mainCheck();
		}

		private function mainCheck ()  {
			if ($this->checkSelectedJob()) {
				if ($this->postedData['selectedJob'] == 'Master' || $this->postedData['selectedJob'] == 'Internship') {
					$this->checkMiRequired();
				}
				else if ($this->postedData['selectedJob'] == 'Phd' || $this->postedData['selectedJob'] == 'Postdoc') {
					$this->checkPpRequired();
				}
				else {
					$this->errors['job'] = 'Invalid job';
				}
			}
			else {
				$this->errors['job'] = 'Select a job';
			}
			echo '<pre>';
      print_r($this->postedData);
			print_r($this->errors);
			echo '</pre>';
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

			foreach ($this->postedData['data']['q7']['personalInfos'] as $key => $value) {
				if ($value == '') {
					$this->errors[$key] = 'Please fill';
				}
			}
		}

		private function checkPpRequired () {
			foreach ($this->postedData['data']['q1']['personalInfos'] as $key => $value) {
				if ($value == '') {
					$this->errors[$key] = 'Please fill';
				}
			}

      if (is_null($this->postedData['data']['q3']) || $this->postedData['data']['q3'] === '') {
				$this->errors['knowAboutLab'] = 'Please fill';
			}

      if (is_null($this->postedData['data']['q5']) || $this->postedData['data']['q5'] === '') {
				$this->errors['mindProject'] = 'Please fill';
			}

      if ($this->postedData['data']['q6']['interest']) {
				if ($this->postedData['data']['q6']['selectedProject'] === '') {
					$this->errors['project'] = 'Please select';
				}
			}

      if (is_null($this->postedData['data']['q7']) || $this->postedData['data']['q7'] === '') {
				$this->errors['fitForLipid'] = 'Please fill';
			}

      if (is_null($this->postedData['data']['q8']) || $this->postedData['data']['q8'] === '') {
				$this->errors['fitForYou'] = 'Please fill';
			}
		}

		private function checkSelectedJob() {
			return is_null($this->postedData['selectedJob']) || $this->postedData['selectedJob'] === '' ? false : true;
		}

    public function returnStatus () {
      
    }

    public function getErrors () {
      return $this->errors;
    }
  }
?>