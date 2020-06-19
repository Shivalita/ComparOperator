
<?php

include('config.php');
$operatorManager = new OperatorManager($db);
$destinationManager = new DestinationManager($db);

$allOperators = $destinationManager->getDestinationOperators('Miami');

foreach ($allOperators as $oneOperator) {
    echo ($oneOperator->getId().'</br>');
    echo ($oneOperator->getName().'</br>');
    echo ($oneOperator->getIsPremium().'</br>');
    echo '<br><br>';
}

?>
