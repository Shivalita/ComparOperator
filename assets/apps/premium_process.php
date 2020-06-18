<?php

$destinationManager = new DestinationManager($db);
$operatorManager = new OperatorManager($db);

if (isset($_POST['premium']) && isset($_POST['nameValue'])) {
    $operator = $operatorManager->getOperator($_GET['name']);
    $operator->setIsPremium(1);
    $operatorManager->updateOperator($operator);
}

?>