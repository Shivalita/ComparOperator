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
        $error = 'Destination introuvable';
        unset($destination);
    } else {
        $destinationManager->deleteDestination($destination);
        $success = 'Destination supprimée';
    }
}

/* ----- REDIRECT TO MASTER ADMIN ----- */
$operatorUrlName = $_POST['operatorName'];

if ($success) {
    $operatorUrl = '../../admin/fiche-operator-admin.php?name='.$operatorUrlName.'&success='.$success;
} else if ($error) {
    $operatorUrl = '../../admin/fiche-operator-admin.php?name='.$operatorUrlName.'&error='.$error;
} else {
    $operatorUrl = '../../admin/fiche-operator-admin.php?name='.$operatorUrlName;
}

header("Location:".$operatorUrl);
exit;