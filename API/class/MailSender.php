<?php
  class MailSender {
    public function toApplicant ($to) {
      require_once('templates/mailApplicant.php');
      mail($to, $subject, $message, $headers); // working
    }

    public function toStarsRatings () {
      require_once('templates/mailStars.php');
      mail($to, $subject, $message, $headers);
    }

    public function toProjectResp ($project, $path) {
      $to = $project['responsibleMail'];
      $projectName = $project['name'];
      $userPath = $path;
      require_once('templates/mailProjectResp.php');
      mail($to, $subject, $message, $headers);
    }
  }
?>