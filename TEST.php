
<?php

include('config.php');
$operatorManager = new OperatorManager($db);
$destinationManager = new DestinationManager($db);

$allDestinations = $destinationManager->getAllDestinations();
$destinationsLocations = [];
    foreach ($allDestinations as $oneDestination) {

    }

?>
