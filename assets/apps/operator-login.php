<?php
include ('../../config.php');

$operatorManager = new OperatorManager($db);

if (isset($_POST['username'])) {
    $operatorName = $_POST['username'];
    if (($operatorManager->checkOperatorExists($operatorName)) && ($_POST['password'] === 'admin')) {
        $operatorUrl = '../../admin/fiche-operator-admin.php?name='.$operatorName;
    } else {
        $error = 'Login ou mot de passe incorrect';
        $operatorUrl = '../../admin-login.php?error='.$error;
    }

    header("Location:".$operatorUrl);
    exit;
}
?>