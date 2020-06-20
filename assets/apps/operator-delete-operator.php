<?php

include('../../config.php');

$operatorManager = new OperatorManager($db);

/* ----- GET OPERATOR ----- */
if (!empty($_POST['operatorName'])) {
    $operator = $operatorManager->getOperator($_POST['operatorName']);
}


/* ----- DELETE OPERATOR ----- */
if ($operator) {
    if (!$operatorManager->checkOperatorExists($operator->getName())) {
        $message = 'Operator not found.';
        unset($operator);
    } else {
        $operatorManager->deleteOperator($operator);
        $message = 'Operator deleted.';
    }
}

/* ----- REDIRECT TO MASTER ADMIN ----- */
$operatorUrl = '../../admin-login.php';
header("Location:".$operatorUrl);
exit;