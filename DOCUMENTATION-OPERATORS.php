<?php
/* -------------------------- OPERATOR PROPERTIES -------------------------- */

$operator->getId(); // Returns a NUMBER (int)
$operator->getName(); // Returns a STRING
$operator->getRate(); // Returns a NUMBER (float)
$operator->getLink(); // Returns a STRING
$operator->getIsPremium(); // Returns a NUMBER (0 or 1)
$operator->getLogo(); // Returns a STRING


/* ------------------------ OPERATOR MANAGER METHODS ----------------------- */

/* ---------- CREATE OPERATOR ---------------------------------------------- */
$operatorManager->createOperator(Operator $operator); // Returns NOTHING but UPDATES DATABASE

// Ex:
$operator = new Operator([
    'name' => ($operatorName), 
    'link' => $operatorLink, 
    'logo' => $operatorLogo
]);
$operatorManager->createOperator($operator);
// CREATE a new operator in database from a OPERATOR INSTANCE OBJECT
/* ------------------------------------------------------------------------- */


/* ---------- GET OPERATOR ------------------------------------------------- */
$operatorManager->getOperator($request); // Returns an OBJECT
// $request can be either an ID or a NAME

// Ex:
$operator = $operatorManager->getOperator(1); // Same as :
$operator = $operatorManager->getOperator('Club Med');
// Returns a OPERATOR INSTANCE OBJECT
$operator->getLink(); // Returns 'https://www.clubmed.fr/'
/* ------------------------------------------------------------------------- */


/* ---------- UPDATE OPERATOR ---------------------------------------------- */
$operatorManager->updateOperator(Operator $operator); // Returns NOTHING but UPDATES DATABASE
// UPDATE a operator in database with current $operator properties
/* ------------------------------------------------------------------------- */


/* ---------- DELETE OPERATOR ---------------------------------------------- */
$operatorManager->deleteOperator(Operator $operator); // Returns NOTHING but UPDATES DATABASE
// REMOVES an operator from database
/* ------------------------------------------------------------------------- */


/* ---------- CHECK IF OPERATOR EXISTS ------------------------------------- */
$operatorManager->checkOperatorExists($operator); // Returns a BOOLEAN
// Returns TRUE if operator is registered in database, else returns FALSE
// $operator can be either an ID or a NAME

// Ex:
echo ($operatorManager->checkOperatorExists(1)); // Returns true
// Same as :
echo ($operatorManager->checkOperatorExists('Club Med')); // Returns true
echo ($operatorManager->checkOperatorExists(100000)); // Returns false
/* ------------------------------------------------------------------------- */


/* ---------- GET ALL OPERATORS LIST --------------------------------------- */
$operatorManager->getAllOperators(); // Returns an ARRAY of data

// Ex:
$allOperators = $operatorManager->getAllOperators();
foreach ($allOperators as $oneOperator) {
    echo ($oneOperator['name']);
}
// Displays the name of ALL DATABASE REGISTERED operators ORDER BY premium ones first
/* ------------------------------------------------------------------------- */


/* ---------- COUNT OPERATORS ---------------------------------------------- */
$operatorManager->countOperators(); // Returns the NUMBER of operators registered in database
/* ------------------------------------------------------------------------- */


/* ---------- GET ALL OPERATOR'S DESTINATIONS ------------------------------ */
$operatorManager->getOperatorDestinations($operatorId); // Returns an ARRAY OF OBJECTS
// Returns the list of all destinations offered by this operator
// Each destination is a DESTINATION OBJECT INSTANCE

// Ex:
$allOperatorDestinations = $operatorManager->getOperatorDestinations($operator->getId());
foreach ($allOperatorDestinations as $oneDestination) {
    echo ($oneDestination->getLocation());
}
// Displays the locations of ALL DATABASE REGISTERED destinations for this operator
/* ------------------------------------------------------------------------- */


/* ---------- GET OTHER OPERATORS LIST ------------------------------------- */
$operatorManager->getOtherOperators($currentOperatorName); // Returns an ARRAY OF OBJECTS
// Returns a list of all operators EXCEPTED the current one
// Each operator is a OPERATOR OBJECT INSTANCE

// Ex:
$allOtherOperators = $operatorManager->getOtherOperators($operator->getName());
foreach ($allOtherOperators as $oneOtherOperator) {
    echo ($oneOtherOperator->getName());
}
// Displays the name of ALL DATABASE REGISTERED operators EXCEPTED the current one
/* ------------------------------------------------------------------------- */