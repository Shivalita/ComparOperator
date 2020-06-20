<?php

class ReviewManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    

    /* ---------- CREATE REVIEW ---------- */
    public function createReview(Review $review)
    {
        $addReviewQuery = $this->db->prepare(
        'INSERT INTO reviews(message, author, operator_id, ip_address)
         VALUES(:message, :author, :operator_id, :ip_address)'
        );

        $addReviewQuery->execute([
            ':message' => $review->getMessage(),
            ':author' => $review->getAuthor(),
            ':operator_id' => $review->getOperatorId(),
            ':ip_address' => $review->getIpAddress()
        ]);

        $review->hydrate([
            'id' => $this->db->lastInsertId()
          ]);
    }


    /* ---------- GET REVIEW ---------- */
    public function getReview($reviewId)
    {
        $getReviewData = $this->db->prepare(
            'SELECT * FROM reviews WHERE id = ?'
        );
        $getReviewData->execute([$reviewId]);
        $reviewData = $getReviewData->fetch(PDO::FETCH_ASSOC);
        
        return new Review($reviewData);
    }


    /* ---------- UPDATE REVIEW ---------- */
    public function updateReview(Review $review)
    {
        $updateReviewQuery = $this->db->prepare(
            'UPDATE reviews 
                SET message = ?, author = ?, operator_id = ?, ip_address = ?
                WHERE id = ?'
            );
        $updateReviewQuery->execute([
            $review->getMessage(),
            $review->getAuthor(),
            $review->getOperatorId(),
            $review->getIpAddress(),
            $review->getId()
        ]); 
    }


    /* ---------- DELETE REVIEW ---------- */
    public function deleteReview(Review $review)
    {
      $deleteReviewQuery = $this->db->prepare(
        'DELETE FROM reviews WHERE id = ?'
      );
      $deleteReviewQuery->execute([$review->getId()]);
    }


    /* ---------- GET OPERATOR ID ---------- */
    public function getOperatorId($operatorName)
    {
        $getOperatorId = $this->db->prepare(
            'SELECT id FROM operators WHERE name = ?'
        );
        $getOperatorId->execute([$operatorName]);
        $operatorId = $getOperatorId->fetch(PDO::FETCH_ASSOC);
        
        return $operatorId['id'];
    }


     /* ---------- GET OPERATOR REVIEWS ---------- */
    public function getOperatorReviews($operatorId) 
    {
        $operatorReviewsQuery = $this->db->prepare(
        '   SELECT *
            FROM reviews
            INNER JOIN operators
            ON reviews.operator_id = operators.id
            AND operators.id = ?
            ORDER BY reviews.id DESC
            LIMIT 6'
        );

        $operatorReviewsQuery->execute([$operatorId]);
        $operatorReviewsArray = $operatorReviewsQuery->fetchAll(PDO::FETCH_ASSOC);
       
        return $operatorReviewsArray;
    }

    
    /* ---------- CHECK IF USER HAS ALREADY REVIEWED THIS OPERATOR ---------- */
    public function checkUsernameExists($username, $operatorId)
    {
        $checkUsernameQuery = $this->db->prepare(
            '   SELECT *
                FROM reviews
                INNER JOIN operators
                ON reviews.operator_id = operators.id
                AND reviews.author = ?
                AND operators.id = ?'
            );
    
            $checkUsernameQuery->execute([$username, $operatorId]);
            $checkUsername = $checkUsernameQuery->fetchAll(PDO::FETCH_ASSOC);
           
            return $checkUsername;         
    }
}

?>