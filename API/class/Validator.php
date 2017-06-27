<?php
  class Validator {
		public $postedData = [];
		public $requiredData = [];
		public $errors = [];

		function __construct($data) {
				$this->postedData = $data;
				$this->setRequiredData($this->postedData);
		}

		public function setRequiredData ($postedData)  {
			if ($this->checkSelectedJob()) {
				if ($this->postedData['selectedJob'] == 'Master' || $this->postedData['selectedJob'] == 'Internship') {
					unset($postedData['q5']);
					$this->requiredData = $postedData;
					$this->checkMiRequired();
				}
				else if ($this->postedData['selectedJob'] == 'Phd' || $this->postedData['selectedJob'] == 'Postdoc') {
					unset($postedData['q1']['personalInfos']['personalURL'], $postedData['q2'], $postedData['q7']);
					$this->requiredData = $postedData;
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
			print_r($this->requiredData);
			print_r($this->errors);
			echo '</pre>';
		}

		public function checkMiRequired () {
			if (count($this->requiredData['q1']['choices']) > 0) {
				foreach ($this->requiredData['q1']['choices'] as $key => $value) {
					if ($value === 'Other') {
						if ($this->requiredData['q1']['textOther'] === '') {
							$this->errors[$key] = 'Please fill';
						}
					}
				}
			}
			else {
				$this->errors['choices'] = 'Select at least one';
			}

			if (is_null($this->requiredData['q2']) || $this->requiredData['q2'] === '') {
				$this->errors['interestInLab'] = 'Please fill';
			}

			if ($this->requiredData['q3']['interest']) {
				if ($this->requiredData['q3']['selectedProject'] === '') {
					$this->errors['project'] = 'Please select';
				}
			}

			if ($this->requiredData['q4']['interest']) {
				if ($this->requiredData['q4']['selectedResearch'] === '') {
					$this->errors['research'] = 'Please select';
				}
			}

			if ($this->requiredData['q6']['interest']) {
				if ($this->requiredData['q6']['text'] === '') {
					$this->errors['mindProject'] = 'Please fill';
				}
			}

			foreach ($this->requiredData['q7']['personalInfos'] as $key => $value) {
				if ($value == '') {
					$this->errors[$key] = 'Please fill';
				}
			}
		}

		public function checkPpRequired () {
			$this->postedData;
		}

		private function checkSelectedJob() {
			return is_null($this->postedData['selectedJob']) || $this->postedData['selectedJob'] === '' ? false : true;
		}
  }
?>