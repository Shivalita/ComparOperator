<?php
include('../../config.php');

$operatorManager = new OperatorManager($db);

if (isset($_POST['operatorName'])) {
    $operatorName = ucwords($_POST['operatorName']);

    /* Check if this operator is registered */
    if (!$operatorManager->checkOperatorExists($operatorName)) {
        $error = 'Cet opérateur est introuvable';
        $operatorUrl = '../../view/operators.php?error='.$error;
        header("Location:".$operatorUrl);
        exit;
    } else {
    $operator = $operatorManager->getOperator($operatorName);

    /* ----- REDIRECT TO DESTINATION PAGE ----- */
    $operatorUrl = '../../view/operator.php?name='.$operatorName;
 
    header("Location:".$operatorUrl);
    exit;
    }
}
?>