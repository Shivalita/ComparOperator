<?php
include('../../config.php');

$reviewManager = new ReviewManager($db);
$operatorManager = new OperatorManager($db);

/* ----- GET DATA ----- */
/* Get data and store it in variables */
if (!empty($_POST['username']) && !empty($_POST['message'])) {
    $cleanName = cleanData($_POST['username']);
    $username = htmlspecialchars($cleanName);
    $message = htmlspecialchars($_POST['message']);
    $ipAddress = $_SERVER['REMOTE_ADDR'];
}

/* Get operator id */
$operatorName = $_POST['operatorName'];
$operatorId = $reviewManager->getOperatorId($operatorName);

/* Remove data spaces and backslashs */
function cleanData($data) {
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}


/* ----- CREATE REVIEW IF NOT ALREADY REVIEWED ----- */
if (!$reviewManager->checkUsernameExists($username, $operatorId)) {
    $review = new Review([
        'message' => ucfirst($message),
        'author' => ucfirst($username),
        'operator_id' => $operatorId,
        'ip_address' => $ipAddress
    ]);
    
    $review->setOperatorId($operatorId);
    $review->setIpAddress($ipAddress);
    
    $reviewManager->createReview($review);
    $reviewManager->updateReview($review);

    $success = 'Review postée';
} else {
    $error = 'Vous avez déjà posté une review pour cet opérateur';
}


/* ----- REDIRECT TO OPERATOR PAGE ----- */
if ($success) {
    $operatorUrl = '../../view/operator.php?name='.$operatorName.'&success='.$success;
} else if ($error) {
    $operatorUrl = '../../view/operator.php?name='.$operatorName.'&error='.$error;
} else {
    $operatorUrl = '../../view/operator.php?name='.$operatorName;
}

header("Location:".$operatorUrl);
exit;