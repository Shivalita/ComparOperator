<?php
    if (($_POST['adminLogin'] === 'admin') && ($_POST['adminPassword'] === 'admin')) {
        $masterUrl = '../../master-admin/master-admin.php';
    } else {
        $error = 'Login ou mot de passe incorrect';
        $masterUrl = '../../admin-login.php?error='.$error;
    }

    header("Location:".$masterUrl);
    exit;
?>