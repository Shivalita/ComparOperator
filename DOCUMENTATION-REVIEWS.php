<?php
/* --------------------------- REVIEW PROPERTIES --------------------------- */

$review->getId(); // Returns a NUMBER (int)
$review->getMessage(); // Returns a STRING
$review->getAuthor(); // Returns a STRING
$review->getOperatorId(); // Returns a NUMBER (int)
$review->getIpAddress(); // Returns a STRING


/* ------------------------- REVIEW MANAGER METHODS ------------------------ */

/* ---------- CREATE REVIEW ------------------------------------------------ */
$reviewManager->createReview(Review $review); // Returns NOTHING but UPDATES DATABASE

// Ex:
$review = new Review([
    'message' => $message,
    'author' => $username,
    'operator_id' => $operatorId,
    'ip_address' => $ipAddress
]);
$reviewManager->createReview($review);
// CREATE a new review in database from a REVIEW INSTANCE OBJECT
/* ------------------------------------------------------------------------- */


/* ---------- GET REVIEW ------------------------------------------------- */
$reviewManager->getReview($reviewId); // Returns an OBJECT

// Ex:
$review = $reviewManager->getReview(1);
// Returns a REVIEW INSTANCE OBJECT
$review->getAuthor(); // Returns 'Toto'
/* ------------------------------------------------------------------------- */


/* ---------- UPDATE REVIEW ------------------------------------------------ */
$reviewManager->updateReview(Review $review); // Returns NOTHING but UPDATES DATABASE
// UPDATE a review in database with current $review properties
/* ------------------------------------------------------------------------- */


/* ---------- DELETE REVIEW ------------------------------------------------ */
$reviewManager->deleteReview(Review $review); // Returns NOTHING but UPDATES DATABASE
// REMOVES a review from database
/* ------------------------------------------------------------------------- */


/* ---------- GET OPERATOR ID ---------------------------------------------- */
$reviewManager->getOperatorId($operatorName); // Returns a NUMBER
// Returns the OPERATOR'S ID from its name
/* ------------------------------------------------------------------------- */


/* ---------- GET OPERATOR REVIEWS ----------------------------------------- */
$reviewManager->getOperatorReviews($operatorId); // Returns an ARRAY OF DATA

// Ex:
$allOperatorReviews = $reviewManager->getOperatorReviews($operatorId) ;
foreach ($allOperatorReviews as $operatorReview) {
    echo ($operatorReview['message']);
}
// Displays the messages of the SIX LAST operator's reviews ORDER BY more recents first
/* ------------------------------------------------------------------------- */


/* ---------- CHECK IF USER HAS ALREADY REVIEWED THIS OPERATOR ------------- */
$reviewManager->checkUsernameExists($username, $operatorId); // Returns NULL or an existing review

// Ex:
if (!$reviewManager->checkUsernameExists($username, $operatorId)) {
    $review = new Review([
        'message' => $message,
        'author' => $username,
        'operator_id' => $operatorId,
        'ip_address' => $ipAddress
    ]);
} else {
    $message = 'Vous avez déjà posté une review pour cet opérateur.';
}
// Create a review ONLY IF the user hasn't reviewed this operator already
/* ------------------------------------------------------------------------- */