<?php
$subject = 'Votre candidature pour une place d\'apprentissage';

$message = "Nous venons d'enregistrer votre candidature et vous remercions de votre intérêt pour la "."\n".
"formation professionnelle à l’Ecole polytechnique fédérale de Lausanne."."\n\n".
"Nous allons étudier votre dossier avec la plus grande attention et nous ne manquerons "."\n".
"pas de vous contacter si votre profil répond à nos attentes."."\n\n";


$message .= "Avec nos meilleures salutations."."\n\n".
"Formation Apprentis EPFL";

$headers = 'From: noreply+formulaireApprentis@epfl.ch' . "\r\n" .
'Reply-To: formation.apprentis@epfl.ch' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
?>