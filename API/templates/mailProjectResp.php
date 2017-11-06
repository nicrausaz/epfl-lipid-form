<?php
    $to = $project['responsibleMail'];
    $projectName = $project['name'];
    $userPath = $path;

    $subject = 'New interest in your project';
    $message = "Hi," ."\n\n".
    "Someone just mention interest in your project/research '$projectName'" . "\n\n";

    $message .= "Find data here: " . $userPath;
    $headers = 'From: noreply+lipid-form@epfl.ch' . "\r\n" .
    'Reply-To: noreply+lipid-form@epfl.ch' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
?>