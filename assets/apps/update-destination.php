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

var_dump($destination);


/* ----- UPDATE DESTINATION ----- */
if (!empty($_POST['destinationPrice'])) {
    $destination->setPrice($_POST['destinationPrice']);
} 
if (!empty($_POST['destinationDescription'])) {
    $destination->setDescription($_POST['destinationDescription']);
} 
if (!empty($_POST['destinationImg'])) {
    $destination->setImg($_POST['destinationImg']);
}
$destinationManager->updateDestination($destination);

echo '<br>';
var_dump($destination);


/* ----- REDIRECT TO MASTER ADMIN ----- */
$destinationUrl = '../../admin/fiche-operator-admin.php?name='.$operatorName;
header("Location:".$destinationUrl);
exit;