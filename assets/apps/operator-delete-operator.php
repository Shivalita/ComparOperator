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
        $error = 'Opérateur introuvable';
        unset($operator);
    } else {
        $operatorManager->deleteOperator($operator);
        $success = 'Opérateur supprimé';
    }
}

/* ----- REDIRECT TO MASTER ADMIN ----- */
if ($success) {
    $operatorUrl = '../../admin-login.php'.'?success='.$success;
} else if ($error) {
    $operatorUrl = '../../admin-login.php'.'?error='.$error;
} else {
    $operatorUrl = '../../admin-login.php';
}

header("Location:".$operatorUrl);
exit;