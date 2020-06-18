
<?php

include('config.php');
$operatorManager = new OperatorManager($db);
$destinationManager = new DestinationManager($db);

$allDestinations = $destinationManager->getAllDestinations();

    foreach ($allDestinations as $oneDestination) {
        var_dump($oneDestination);
        echo '<br>';
    }

?>
