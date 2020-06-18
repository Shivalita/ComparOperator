<?php
include('../../config.php');

$destinationManager = new DestinationManager($db);
$operatorManager = new OperatorManager($db);

/* ----- GET DATA ----- */

/* Get post data and store it in variables */
if (
    !empty($_POST['destinationLocation']) &&
    !empty($_POST['destinationPrice']) &&
    !empty($_POST['destinationDescription'])
) {
    $cleanName = cleanData($_POST['destinationLocation']);
    $destinationLocation = htmlspecialchars($cleanName);
    $destinationPrice = cleanData($_POST['destinationPrice']);
    $destinationDescription = $_POST['destinationDescription'];
}

/* Remove data spaces and backslashs */
function cleanData($data) {
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

/* Check file extension/size/errors, then store it */
if (!empty($_FILES['destinationImage']) AND $_FILES['destinationImage']['error'] === 0) {
    if ($_FILES['destinationImage']['size'] <= 1000000) {
        $infosfichier = pathinfo($_FILES['destinationImage']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees)) {
            $destinationImage = '../images/destinations_img/'.$destinationLocation.'.'.$extension_upload;
            // move_uploaded_file(
            //     $_FILES['destinationImage']['tmp_name'],
            //     $destinationImage
            // );
        } else {
            echo ('wrong_extension');
        }
    } else {
        echo ('file_size');
    }
} else {
    /* Assign a default image if not added */
    $destinationImage = '';
}

function getFormattedName($nameToFormat) {
    $nameToFormat = str_replace('%20', ' ', $nameToFormat);
    $nameToFormat = ucwords($nameToFormat);
    return $nameToFormat;
}

if (isset($_GET['name'])) {
    $operatorName = getFormattedName($_GET['name']);
}

$operatorId = $destinationManager->getOperatorId($_POST['operatorName']);

/* ----- CREATE NEW DESTINATION INSTANCE ----- */
$destination = new Destination([
    'location' => ucfirst($destinationLocation),
    'price' => $destinationPrice,
    'operator_id' => $operatorId,
    'img' => $destinationImage,
    'description' => $destinationDescription
]);

$destination->setOperatorId($operatorId);

$destinationManager->createDestination($destination);
$destinationManager->updateDestination($destination);


/* ----- REDIRECT TO DESTINATION PAGE WITH GET NAME ----- */
function setFormattedName($nameToFormat) {
    $nameToFormat = str_replace(' ', '%20', $nameToFormat);
    $nameToFormat = strtolower($nameToFormat);
    return $nameToFormat;
}

if ($destination) {
    $destinationUrlName = setFormattedName($destination->getLocation());
    $destinationUrl = '../../admin/fiche-destination-admin.php?location='.$destinationUrlName;

header("Location:".$destinationUrl);
exit;
}