<?php

include('../../config.php');

$destinationManager = new DestinationManager($db);
$operatorManager = new OperatorManager($db);


/* ----- GET DESTINATION AND OPERATOR NAMES ----- */
if (!empty($_POST['destinationLocation'])) {
    $destinationLocation = $_POST['destinationLocation'];
    $operatorName = $_POST['operatorName'];
}
$destination = $destinationManager->getDestination($destinationLocation);
$operator = $operatorManager->getOperator($operatorName);

$operatorId = $operator->getId();
$destination->setOperatorId($operatorId);


/* ----- UPDATE DESTINATION ----- */
if (!empty($_POST['destinationPrice'])) {
    $destination->setPrice($_POST['destinationPrice']);
} 
if (!empty($_POST['destinationDescription'])) {
    $destination->setDescription($_POST['destinationDescription']);
} 
if (!empty($_POST['destinationImg'])) { // INCOMPLET - NON FONCTIONNEL
    $destination->setImg($_POST['destinationImg']);
}
$destinationManager->updateDestination($destination);
$success = 'Destination mise à jour';


/* ----- REDIRECT TO MASTER ADMIN ----- */
if ($success) {
    $destinationUrl = '../../admin/fiche-operator-admin.php?name='.$operatorName.'&success='.$success;
} else if ($error) {
    $destinationUrl = '../../admin/fiche-operator-admin.php?name='.$operatorName.'&error='.$error;
} else {
    $destinationUrl = '../../admin/fiche-operator-admin.php?name='.$operatorName;
}

header("Location:".$destinationUrl);
exit;