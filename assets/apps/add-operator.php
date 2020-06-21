<?php

include ('../../config.php');

$operatorManager = new OperatorManager($db);

/* ----- GET DATA ----- */
/* Remove data spaces and backslashs */
function cleanData($data) {
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

/* Get post data and store it in variables */
if (!empty($_POST['operatorName']) && !empty($_POST['operatorLink'])) {
    $cleanName = cleanData($_POST['operatorName']);
    $operatorName = htmlspecialchars($cleanName);
    $operatorLink = 'https://'.cleanData($_POST['operatorLink']);

    /* Check file extension/size/errors, then store it */
    if (!empty($_FILES['operatorLogo']) AND $_FILES['operatorLogo']['error'] === 0) {
        if ($_FILES['operatorLogo']['size'] <= 1000000) {
            $infosfichier = pathinfo($_FILES['operatorLogo']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                $operatorLogoPath = '../images/operators_logos/'.$operatorName.'.'.$extension_upload;
                move_uploaded_file(
                    $_FILES['operatorLogo']['tmp_name'],
                    $operatorLogoPath
                );
                $operatorLogo = substr_replace($operatorLogoPath, 'assets/', 3, 0);
            } else {
                $error = 'Fichier refusé (jpg, jpeg, gif et png uniquement)';
            }
        } else {
            $error = 'Fichier refusé (1Mo max)';
        }
    } else {
        /* Assign a default logo if not added */
        $operatorLogo = '../assets/images/operators-logo.jpg';
    }


    /* ----- CREATE NEW OPERATOR INSTANCE ----- */
    if (!$error) {
        $operator = new Operator([
            'name' => ucfirst($operatorName), 
            'link' => $operatorLink, 
            'logo' => $operatorLogo
        ]);
    
        if ($operatorManager->checkOperatorExists($operator->getName())) {
            $error = 'Ce tour opérateur est déjà enregistré';
            unset($operator);
        } else {
            $operatorManager->createOperator($operator);
            $operatorManager->updateOperator($operator);
            $success = 'Tour opérateur ajouté';
        }
    }
    
    /* ----- REDIRECT TO MASTER ADMIN PAGE ----- */
    if ($success) {
        $destinationUrl = '../../master-admin/master-admin.php?'.'&success='.$success;
    } else if ($error) {
        $destinationUrl = '../../master-admin/master-admin.php?'.'&error='.$error;
    } else {
        $destinationUrl = '../../master-admin/master-admin.php?';
    }
        
    header("Location:".$destinationUrl);
    exit;
}
