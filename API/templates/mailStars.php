<?php
    $subject = 'New LIPID appliance';
    $message = "Hi," ."\n\n". 
    "Someone just applied to a $job position at LIPID." . "\n\n".
    "He/she mentioned $key as their area of interest ($value stars)" . "\n\n";

    $message .= "Find data here: " . $path;
    $headers = 'From: noreply+lipid-form@epfl.ch' . "\r\n" .
    'Reply-To: noreply+lipid-form@epfl.ch' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
?>
