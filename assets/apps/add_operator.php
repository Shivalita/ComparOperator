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
            // $file = $_FILES['operatorLogo'];
            // $contentFile = file_get_contents($file['tmp_name']);
            // $operatorLogo = './images/operators_logos/'.$operatorName.'.'.$extension_upload;
            // file_put_contents($operatorLogo, $contentFile);
            // var_export(realpath('../images/operators_logos'));
            // var_export(__DIR__);
            $operatorLogo = '../images/operators_logos/'.$operatorName.'.'.$extension_upload;
            move_uploaded_file(
                $_FILES['operatorLogo']['tmp_name'],
                $operatorLogo
            );
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
if ($operator) {
    $operatorUrl = '../../admin/fiche-operator-admin.php?'.$operator->getName();

// header("Location:".$operatorUrl);
// exit;
}



/* ----- TESTS ----- */

// $operator->setName('TEST');
// $operatorManager->updateOperator($operator);
// echo $operator->getName();

// $operator->setRate(5);
// $operatorManager->updateOperator($operator);
// echo $operator->getRate();

// $operator->setIsPremium(true);
// $operatorManager->updateOperator($operator);
// echo $operator->getIsPremium();

// echo ('getName 1 = '.$operator->getName());
// $operatorManager->deleteOperator($operator);
// echo ('getName 2 = '.$operator->getName());
// $operatorManager->deleteOperator($operator);

// $allOperatorsArray = $operatorManager->getAllOperators();
// foreach ($allOperatorsArray as $singleOperator) {
//     echo ($singleOperator['name']);
// }

// echo $operatorManager->countOperators();

// echo $operatorManager->checkOperatorExists('test');

$opeId = $operatorManager->getOperator($operator->getId());
// $opeName = $operatorManager->getOperator($operator->getName());
echo $opeId->getName().'<br>';
// echo $opeName->getName().'<br>';
// echo $opeName->getRate().'<br>';
// echo $opeName->getId().'<br>';

// echo $operator->getRate();
var_dump($operatorManager->getOperator($operator->getId()));
