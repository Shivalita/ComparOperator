<?php
include('../../config.php');

$destinationManager = new DestinationManager($db);

if (isset($_POST['location'])) {
    /* Get destinations/operators for this location */
    $destinationLocation = ucwords($_POST['location']);
    if (isset($_POST['sortBy']) && ($_POST['sortBy'] != 'Trier')) {
        $sort = $_POST['sortBy'];
    }

    /* Check if there are destinations for this location */
    if (!$destinationManager->checkDestinationExists($destinationLocation)) {
        $error = 'Cette destination n\'est pas disponible';
        $destinationUrl = '../../view/destinations.php?error='.$error;
        header("Location:".$destinationUrl);
        exit;
    } else {
        /* REMOVED - SET DIRECTLY IN DESTINATION MANAGER METHOD */
        // $destinationOperators = $destinationManager->getDestinationOperators($destinationLocation, );

        // /* Sort the results array after the "sort by" choice */
        // if (isset($_POST['sortBy']) && ($_POST['sortBy'] === 'lowPrice')) { 
        //     usort($destinationOperators, function($a, $b) {
        //         return $a['price'] <=> $b['price'];
        //     });
        // } else if (isset($_POST['sortBy']) && ($_POST['sortBy'] === 'highPrice')) {
        //     usort($destinationOperators, function($a, $b) {
        //         return $b['price'] <=> $a['price'];
        //     });
        // } else if (isset($_POST['sortBy']) && ($_POST['sortBy'] === 'rate')) {
        //     usort($destinationOperators, function($a, $b) {
        //         return $b['rate'] <=> $a['rate'];
        //     });
        // } else {
        //     usort($destinationOperators, function($a, $b) {
        //         return $b['is_premium'] <=> $a['is_premium'];
        //     });
        // }

        /* ----- REDIRECT TO DESTINATION PAGE ----- */
        if (isset($_POST['sortBy']) && ($_POST['sortBy'] != 'Trier')) {
            $destinationUrl = '../../view/destination.php?name='.$destinationLocation.'&sort='.$sort;
        } else {
            $destinationUrl = '../../view/destination.php?name='.$destinationLocation;
        }
       
        header("Location:".$destinationUrl);
        exit;
    }
}
?>