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
// Displays the name of all registered destinations WITHOUT DUPLICATES


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
foreach ($allDestinations as $oneDestination) {
    echo ($oneDestination->getLocation());
}
// Displays the name of all registered destinations except the current one


/* ---------- GET ALL OPERATORS FOR THIS DESTINATION ---------- */
$destinationManager->getDestinationOperators($destinationLocation); // Returns an ARRAY
// Returns a list of each destination for this location, with his data and the operator data
$allOperators = $destinationManager->getDestinationOperators($destination->getLocation());
foreach ($allDestinationOperators as $destinationOperator) {
    echo $destinationOperator['operator_id'];
    echo $destinationOperator['id'];
    echo $destinationOperator['location'];
    echo $destinationOperator['name'];
    echo $destinationOperator['price'];
// Displays both destination data (location, description, price...), 
// and operator offering data (name, logo, is_premium...)


/* ---------- CODE A INSERER DANS VIEW/DESTINATION ---------- */

$allDestinationOperators = $destinationManager->getDestinationOperators($destination->getLocation());

        foreach ($allDestinationOperators as $destinationOperator) {
            echo('
                <div class="col mb-4">
                <div class="card">
                <img src="https://source.unsplash.com/random/800x600/?travel" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">'.$destinationOperator['name'].'</h5>
                    <p class="card-text">'.$destinationOperator['description'].'</p>
                </div>
                <div class="card-footer bg-white">
                    <small class="float-right text-success font-weight-bold">A partir de '.$destinationOperator['price'].'€€€</small>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a class="btn btn-warning btn-sm" href="#" role="button">Réserver</a>
                </div>
                </div>
            </div>
            ');
        }

// De rien ^^