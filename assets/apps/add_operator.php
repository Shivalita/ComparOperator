<?php
include($_SERVER['DOCUMENT_ROOT'].'/comparOperator/config.php');
include(ROOT.DS.'assets'.DS.'config'.DS.'connection.php');
include(ROOT.DS.'assets'.DS.'config'.DS.'autoload.php');

$operatorManager = new OperatorManager($db);

/* ----- GET DATA ----- */

/* Get post data and store it in variables */
if (!empty($_POST['operatorName']) && !empty($_POST['operatorLink'])) {
    $cleanName = cleanData($_POST['operatorName']);
    $operatorName = htmlspecialchars($cleanName);
    $operatorLink = cleanData($_POST['operatorLink']);
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
            $file = $_FILES['operatorLogo'];
            $contentFile = file_get_contents($file['tmp_name']);
            $operatorLogo = ROOT.DS.'assets'.DS.'images'.DS.'operators_logos'.DS.$operatorName.'.'.$extension_upload;
            file_put_contents($operatorLogo, $contentFile);
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

echo ($operatorName.'<br>');
echo ($operatorLink.'<br>');
echo ($operatorLogo.'<br>');

/* ----- CREATE NEW OPERATOR INSTANCE ----- */
$operator = new Operator(['name' => ucfirst($operatorName), 'link' => $operatorLink, 'logo' => $operatorLogo]);
echo ('$operator->getName() = '.$operator->getName().'</br>');
echo ('$operator->getLink() = '.$operator->getLink().'</br>');
echo ('$operator->getLogo() = '.$operator->getLogo().'</br>');

if ($operatorManager->operatorExists($operator->getName())) {
    $message = 'Operator already registered.';
    unset($operator);
} else {
    $operatorManager->createOperator($operator);
    $operatorManager->updateOperator($operator);
}

?>