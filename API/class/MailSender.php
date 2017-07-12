<?php
  class MailSender {
    public function toApplicant ($to) {
      require('templates/mailApplicant.php');
      mail($to, $subject, $message, $headers); // working
    }

    public function toStarsRatings () {
      require('templates/mailStars.php');
      mail($to, $subject, $message, $headers);
    }

    public function toProjectResp ($project, $path) {
      require('templates/mailProjectResp.php');
      mail($to, $subject, $message, $headers); // working
    }
  }
?>