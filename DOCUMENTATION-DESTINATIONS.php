<?php
/* ------------------------------ DESTINATION PROPERTIES ------------------------------ */

$operator->getId(); // Returns a NUMBER (int)
$operator->getLocation(); // Returns a STRING
$operator->getPrice(); // Returns a NUMBER (int)
$operator->getOperatorId(); // Returns a NUMBER (int)
$operator->getImg(); // Returns a STRING
$operator->getDescription(); // Returns a STRING


/* ------------------------------ DESTINATION MANAGER METHODS ------------------------------ */

/* ---------- GET ALL DESTINATIONS LIST ---------- */
$destinationManager->getAllDestinations(); // Returns an ARRAY of data

// Ex:
$allDestinations = $destinationManager->getAllDestinations();
foreach ($allDestinations as $oneDestination) {
    echo ($oneDestination['location']);
}
// Displays the name of all registered destinations


/* ---------- COUNT DESTINATIONS ---------- */
$destinationManager->countDestinations(); // Returns the NUMBER of destinations registered


/* ---------- CHECK IF OPERATOR EXISTS ---------- */
$destinationManager->checkDestinationExists($destination); // Returns a BOOLEAN (true if exists)
// $destination can be either an ID or a LOCATION

// Ex:
echo ($destinationManager->checkDestinationExists(1)); // Returns true
echo ($destinationManager->checkDestinationExists('Paris')); // Returns true
echo ($destinationManager->checkDestinationExists(100000)); // Returns false


/* ---------- GET DESTINATION ---------- */
$destinationManager->getDestination($request); // Returns an OBJECT
// $request can be either an ID or a LOCATION

// Ex:
$dest = $destinationManager->getDestination(1);
// Same as :
$dest = $destinationManager->getDestination('Paris');

$dest->getDescription(); // Returns 'Lorem ipsum.../'


/* ---------- GET OPERATOR ID ---------- */
$destinationManager->getOperatorId($operatorName); // Returns a NUMBER
// Ex:
echo ($destinationManager->getOperatorId('Totoperator')); // Returns 107


/* ---------- GET OTHER DESTINATIONS LIST ---------- */
$destinationManager->getOtherDestinations($currentDestinationLocation); // Returns an ARRAY OF OBJECTS
// Returns a list of all destinations except the current one

// Ex:
$allDestinations = $destinationManager->getOtherDestinations($destination->getLocation());
foreach ($allDestinations $oneDestination) {
    echo ($oneDestination->getLocation());
}
// Displays the name of all registered destinations except the current one