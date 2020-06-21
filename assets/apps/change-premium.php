<?php

include('../../config.php');

$operatorManager = new OperatorManager($db);

/* ----- GET OPERATOR ----- */
/* Get post data and store it in variables */
if (!empty($_POST['operatorName'])) {
    $operatorName = htmlspecialchars($_POST['operatorName']);
}

$operator = $operatorManager->getOperator($operatorName);

/* ----- CHANGE PREMIUM OPERATOR STATUS ----- */
if (isset($_POST['setPremium'])) {
    $operator->setIsPremium(1);
    $success = $operator->getName().' est maintenant membre premium';
} else if (isset($_POST['removePremium'])) {
    $operator->setIsPremium(0);
    $success = $operator->getName().' n\'est plus membre premium';
}

$operatorManager->updateOperator($operator);
$operator->getIsPremium();

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