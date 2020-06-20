<?php

include ('../../config.php');

$operatorManager = new OperatorManager($db);

if (isset($_POST['username'])) {
    $operatorUrl = '../../admin/fiche-operator-admin.php?name='.$_POST['username'];
    header("Location:".$operatorUrl);
    exit;
}