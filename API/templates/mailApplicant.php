<?php
    $subject = 'Your applicance to LIPID Lab';
    $message = "Hi," ."\n\n".
    "Thank you for your interest in LIPID and applying for a position with us. Based on your interests and the information you provided us, someone from the lab will get back to you shortly." . "\n\n".
    "In the meanwhile, we invite you to subscribe to our news stream (http://lipid.epfl.ch/news) to stay connected \n\n";

    $message .= "Best regards,"."\n\n".
    "Team LIPID";
    $headers = 'From: noreply+lipid-form@epfl.ch' . "\r\n" .
    'Reply-To: noreply+lipid-form@epfl.ch' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
?>
