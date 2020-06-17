<?php

include('../../config.php');

$operatorManager = new OperatorManager($db);

/* ----- GET DATA ----- */

/* Get post data and store it in variables */
if (!empty($_POST['operatorName']) && !empty($_POST['operatorLink'])) {
    $cleanName = cleanData($_POST['operatorName']);
    $operatorName = htmlspecialchars($cleanName);
    $operatorLink = 'https://'.cleanData($_POST['operatorLink']);
}

/* Remove data spaces and backslashs */
function cleanData($data) {
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

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
            echo ('wrong_extension');
        }
    } else {
        echo ('file_size');
    }
} else {
    /* Assign a default logo if not added */
    $operatorLogo = '';
}


/* ----- CREATE NEW OPERATOR INSTANCE ----- */
$operator = new Operator([
    'name' => ucfirst($operatorName), 
    'link' => $operatorLink, 
    'logo' => $operatorLogo
]);

if ($operatorManager->checkOperatorExists($operator->getName())) {
    echo ('Operator already registered');
    // $message = 'Operator already registered.';
    unset($operator);
} else {
    $operatorManager->createOperator($operator);
    $operatorManager->updateOperator($operator);
}

/* ----- REDIRECT TO OPERATOR PAGE WITH GET NAME ----- */
function setFormattedOperatorName($nameToFormat) {
    $nameToFormat = str_replace(' ', '%', $nameToFormat);
    $nameToFormat = strtolower($nameToFormat);
    return $nameToFormat;
}

if ($operator) {
    $operatorUrlName = setFormattedOperatorName($operator->getName());
    $operatorUrl = '../../admin/fiche-operator-admin.php?name='.$operatorUrlName;

header("Location:".$operatorUrl);
exit;
}