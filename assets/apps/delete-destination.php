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
if ($success) {
    $masterUrl = '../../master-admin/master-admin.php?'.'success='.$success;
} else if ($error) {
    $masterUrl = '../../master-admin/master-admin.php?'.'error='.$error;
} else {
    $masterUrl = '../../master-admin/master-admin.php?';
}

header("Location:".$masterUrl);
exit;