<?php
  class MailSender {
    public function toApplicant ($to) {
      require('templates/mailApplicant.php');
      mail($to, $subject, $message, $headers);
    }

    public function toStarsRatings ($to, $job, $path, $key, $value) {
      require('templates/mailStars.php');
      // mail($to, $subject, $message, $headers);
    }

    public function toProjectResp ($project, $path) {
      require('templates/mailProjectResp.php');
      mail($to, $subject, $message, $headers);
    }

    public function getRecipients ($ratings, $job, $path) {
      foreach ($ratings as $key => $value) {
        $email = strtolower($this->getMailingList($key));
        if ($value !== 0) {
          $this->toStarsRatings($email, $job, $path, $key, $value);
        }
      }
    }

    public function getMailingList ($key) {
      return $email =  $key . '.lipid@groupes.epfl.ch';
    }
  }
?>