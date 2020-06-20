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
    echo 'coché <br>';
    $operator->setIsPremium(1);
    $message = $operator->getName().' is now premium.';
} else if (isset($_POST['removePremium'])) {
    echo 'décoché <br>';
    $operator->setIsPremium(0);
    $message = $operator->getName().' is no premium anymore.';
}

$operatorManager->updateOperator($operator);
$operator->getIsPremium();

/* ----- REDIRECT TO MASTER ADMIN ----- */

header("Location: ../../master-admin/master-admin.php");
exit;