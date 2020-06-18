<?php
/* ------------------------------ OPERATOR PROPERTIES ------------------------------ */

$operator->getId(); // Returns a NUMBER (int)
$operator->getName(); // Returns a STRING
$operator->getRate(); // Returns a NUMBER (float)
$operator->getLink(); // Returns a STRING
$operator->getIsPremium(); // Returns a NUMBER (0 or 1)
$operator->getLogo(); // Returns a STRING


/* ------------------------------ OPERATOR MANAGER METHODS ------------------------------ */

/* ---------- GET ALL OPERATORS LIST ---------- */
$operatorManager->getAllOperators(); // Returns an ARRAY of data

// Ex:
$allOperators = $operatorManager->getAllOperators();
foreach ($allOperators as $oneOperator) {
    echo ($oneOperator['name']);
}
// Displays the name of all registered operators ORDER BY premium ones first


/* ---------- COUNT OPERATORS ---------- */
$operatorManager->countOperators(); // Returns the NUMBER of operators registered


/* ---------- CHECK IF OPERATOR EXISTS ---------- */
$operatorManager->checkOperatorExists($operator); // Returns a BOOLEAN (true if exists)
// $operator can be either an ID or a NAME

// Ex:
echo ($operatorManager->checkOperatorExists(1)); // Returns true
echo ($operatorManager->checkOperatorExists('club med')); // Returns true
echo ($operatorManager->checkOperatorExists(100000)); // Returns false


/* ---------- GET OPERATOR ---------- */
$operatorManager->getOperator($request); // Returns an OBJECT
// $request can be either an ID or a NAME

// Ex:
$op = $operatorManager->getOperator(1);
// Same as :
$op = $operatorManager->getOperator('club med');

$op->getLink(); // Returns 'https://www.clubmed.fr/'


/* ---------- GET OTHER OPERATORS LIST ---------- */
$operatorManager->getOtherOperators($currentOperatorName); // Returns an ARRAY OF OBJECTS
// Returns a list of all operators except the current one

// Ex:
$allOperators = $operatorManager->getOtherOperators($operator->getName());
foreach ($allOperators as $oneOperator) {
    echo ($oneOperator->getName());
}
// Displays the name of all registered operators except the current one


/* ---------- GET OPERATOR DESTINATIONS ---------- */
$operatorManager->getOperatorDestinations($operatorId); // Returns an ARRAY OF OBJECTS
// Returns the list of all destinations of this operator

// Ex:
$allOperatorDestinations = $operatorManager->getOperatorDestinations($operator->getId());
foreach ($allOperatorDestinations as $oneDestination) {
    echo ($oneDestination->getLocation());
}
// Displays the locations of all registered destinations for this operator