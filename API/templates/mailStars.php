<?php
    $subject = 'New LIPID appliance';
    $message = "Hi," ."\n\n". 
    "Someone just applied to a $job  position at LIPID." . "\n\n".
    "He/she mentioned $$$$$$energy as their area of interest ($$numStars)";

    $message .= "$PATH";
    $headers = 'From: noreply+lipid-form@epfl.ch' . "\r\n" .
    'Reply-To: noreply+lipid-form@epfl.ch' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
?>
