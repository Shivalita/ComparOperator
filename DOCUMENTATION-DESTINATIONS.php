<?php
/* ------------------------- DESTINATION PROPERTIES ------------------------ */

$destination->getId(); // Returns a NUMBER (int)
$destination->getLocation(); // Returns a STRING
$destination->getPrice(); // Returns a NUMBER (int)
$destination->getOperatorId(); // Returns a NUMBER (int)
$destination->getImg(); // Returns a STRING
$destination->getDescription(); // Returns a STRING


/* ------------------------ DESTINATION MANAGER METHODS -------------------- */

/* ---------- CREATE DESTINATION ------------------------------------------- */
$destinationManager->createDestination(Destination $destination); // Returns NOTHING but UPDATES DATABASE

// Ex:
$destination = new Destination([
    'location' => ($destinationLocation),
    'price' => $destinationPrice,
    'operator_id' => $operatorId,
    'img' => $destinationImage,
    'description' => $destinationDescription
]);

$destinationManager->createDestination($destination);
// CREATE a new destination in database from a DESTINATION INSTANCE OBJECT
/* ------------------------------------------------------------------------- */


/* ---------- GET DESTINATION ---------------------------------------------- */
$destinationManager->getDestination($request); // Returns an OBJECT
// $request can be either an ID or a LOCATION

// Ex:
$destination = $destinationManager->getDestination(1); // Same as :
$destination = $destinationManager->getDestination('Paris');
// Returns a DESTINATION INSTANCE OBJECT
$destination->getDescription(); // Returns 'Lorem ipsum...'
/* ------------------------------------------------------------------------- */


/* ---------- UPDATE DESTINATION ------------------------------------------- */
$destinationManager->updateDestination(Destination $destination); // Returns NOTHING but UPDATES DATABASE
// UPDATE a destination in database with current $destination properties
/* ------------------------------------------------------------------------- */


/* ---------- DELETE DESTINATION ------------------------------------------- */
$destinationManager->deleteDestination(Destination $destination); // Returns NOTHING but UPDATES DATABASE
// REMOVES an destination from database
/* ------------------------------------------------------------------------- */


/* ---------- GET ALL DESTINATIONS LIST ------------------------------------ */
$destinationManager->getAllDestinations(); // Returns an ARRAY OF DATA

// Ex:
$allDestinations = $destinationManager->getAllDestinations();
foreach ($allDestinations as $oneDestination) {
    echo ($oneDestination['location']);
}
// Displays the location of ALL DATABASE REGISTERED destinations WITHOUT DUPLICATES
/* ------------------------------------------------------------------------- */


/* ---------- COUNT DESTINATIONS ------------------------------------------- */
$destinationManager->countDestinations(); // Returns the NUMBER of destinations registered in database
/* ------------------------------------------------------------------------- */


/* ---------- CHECK IF DESTINATION EXISTS ---------------------------------- */
$destinationManager->checkDestinationExists($destination); // Returns a BOOLEAN
// Returns TRUE if destination is registered in database, else returns FALSE
// $destination can be either an ID or a LOCATION

// Ex:
echo ($destinationManager->checkDestinationExists(1)); // Returns true
// Same as :
echo ($destinationManager->checkDestinationExists('Paris')); // Returns true
echo ($destinationManager->checkDestinationExists(100000)); // Returns false
/* ------------------------------------------------------------------------- */


/* ---------- GET OPERATOR ID ---------------------------------------------- */
$destinationManager->getOperatorId($operatorName); // Returns a NUMBER
// Ex:
echo ($destinationManager->getOperatorId('Totoperator')); // Returns 107
/* ------------------------------------------------------------------------- */


/* ---------- GET ALL DESTINATIONS/OPERATORS FOR A LOCATION ---------------- */
$destinationManager->getDestinationOperators($destinationLocation, $sort); // Returns an ARRAY OF DATA
// Returns a list of each destination available for a location, SORTED BY $sort
// $sort can be 'lowPrice', 'highPrice', 'rate', or 'premium' string
// Each destination has BOTH destination's data and operator's data

// Ex:
$allDestinationOperators = $destinationManager->getDestinationOperators($destination->getLocation(), 'lowPrice');
foreach ($allDestinationOperators as $destinationOperator) {
    echo $destinationOperator['description']; // destination data
    echo $destinationOperator['price']; // destination data
    echo $destinationOperator['link']; // operator data
    echo $destinationOperator['is_premium']; // operator data
// Displays each destination's data and the associated operator's data for the location, SORTED BY lower price
/* ------------------------------------------------------------------------- */


/* ---------- GET OTHER DESTINATIONS LIST ---------------------------------- */
$destinationManager->getOtherDestinations($currentDestinationLocation); // Returns an ARRAY OF OBJECTS
// Returns a list of all destinations EXCEPTED the current one
// Each destination is a DESTINATION OBJECT INSTANCE

// Ex:
$allOtherDestinations = $destinationManager->getOtherDestinations($destination->getLocation());
foreach ($allOtherDestinations as $oneOtherDestination) {
    echo ($oneOtherDestination->getLocation());
}
// Displays the location of ALL DATABASE REGISTERED destinations EXCEPTED the current one
/* ------------------------------------------------------------------------- */