<?php

$destinationManager = new DestinationManager($db);
$operatorManager = new OperatorManager($db);

if (isset($_POST['premium'])) {
    if (isset($_POST['name'])) {
        $operator = $operatorManager->getOperator($_GET['name']);
    } else if (isset($_POST['location'])) {
        $destination = $destinationManager->getDestination($_GET['location']);
        $operator = $operatorManager->getOperator($destination->getOperatorId());
    }
    
    $operator->setIsPremium(1);
    $operatorManager->updateOperator($operator);
}

echo 'coucou';

?>