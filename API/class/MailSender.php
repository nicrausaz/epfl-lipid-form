<?php
  class MailSender {
    public function toApplicant ($to) {
      require('templates/mailApplicant.php');
      mail($to, $subject, $message, $headers); // working
    }

    public function toStarsRatings ($recipients, $job, $path) {
      require('templates/mailStars.php');
      foreach ($recipients as $email) {
        mail($to, $subject, $message, $headers);
      }
    }

    public function toProjectResp ($project, $path) {
      require('templates/mailProjectResp.php');
      mail($to, $subject, $message, $headers); // working
    }

    public function getRecipients ($ratings, $job, $path) {
      $recipients = [];
      foreach ($ratings as $key => $value) {
        array_push($recipients, $this->getMailingList($key, $value));
      }
      $this->toStarsRatings($recipients, $job, $path);
    }

    public function getMailingList ($key, $value) {
      return $email = 'lipid-' . $key . $value . '@groupes.epfl.ch';
    }
  }
?>