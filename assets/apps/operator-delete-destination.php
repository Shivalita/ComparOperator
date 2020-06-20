<?php

include('../../config.php');

$destinationManager = new DestinationManager($db);

/* ----- GET DESTINATION ----- */
if (!empty($_POST['destinationLocation'])) {
    $destination = $destinationManager->getDestination($_POST['destinationLocation']);
}

/* ----- DELETE DESTINATION ----- */
if ($destination) {
    if (!$destinationManager->checkDestinationExists($destination->getLocation())) {
        $message = 'Destination not found.';
        unset($destination);
    } else {
        $destinationManager->deleteDestination($destination);
        $message = 'Destination deleted.';
    }
}

/* ----- REDIRECT TO MASTER ADMIN ----- */
$operatorUrlName = $_POST['operatorName'];
$operatorUrl = '../../admin/fiche-operator-admin.php?name='.$operatorUrlName;

header("Location:".$operatorUrl);
exit;