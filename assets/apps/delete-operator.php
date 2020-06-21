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
    $masterUrl = '../../master-admin/master-admin.php?'.'success='.$success;
} else if ($error) {
    $masterUrl = '../../master-admin/master-admin.php?'.'error='.$error;
} else {
    $masterUrl = '../../master-admin/master-admin.php?';
}

header("Location:".$masterUrl);
exit;