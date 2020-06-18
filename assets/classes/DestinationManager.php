<?php

class DestinationManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /* ---------- GET ALL DESTINATIONS ---------- */
    public function getAllDestinations() 
    {
        $allDestinationsQuery = $this->db->query(
            // 'SELECT * (DISTINCT location) FROM destinations'
            'SELECT 
                *
            FROM 
                destinations
            GROUP BY 
                location
            ORDER BY
                location'
        );
        $allDestinationsArray = $allDestinationsQuery->fetchAll(PDO::FETCH_ASSOC);
    
        return $allDestinationsArray;
    }

     /* ---------- COUNT DESTINATIONS ---------- */
     public function countDestinations()
    {
        $destinationsCountQuery = $this->db->query(
            'SELECT * from destinations'
        );
        $destinationsCount = $destinationsCountQuery->fetchAll(PDO::FETCH_ASSOC);

        return count($destinationsCount);
    }

    /* ---------- CHECK IF DESTINATION EXISTS ---------- */
    public function checkDestinationExists($destination)
    {
        if (is_int($destination)) {
            return (bool) $this->db->query(
                'SELECT COUNT(*) FROM destinations WHERE id = '
                .$destination)->fetchColumn();
        }

        $verifyDestinationExists = $this->db->prepare(
            'SELECT COUNT(*) FROM destinations WHERE location = :location'
        );
        $verifyDestinationExists->execute([':location' => $destination]);
        
        return (bool) $verifyDestinationExists->fetchColumn();           
    }


    /* ---------- CREATE DESTINATION ---------- */
    public function createDestination(Destination $destination)
    {
        $addDestinationQuery = $this->db->prepare(
        'INSERT INTO destinations(location, price, operator_id, img, description)
         VALUES(:location, :price, :operator_id, :img, :description)'
        );

        // $addDestinationQuery->bindValue(':location', $destination->getLocation());
        // $addDestinationQuery->bindValue(':price', $destination->getPrice());
        // $addDestinationQuery->bindValue(':operator_id', $destination->getOperatorId());
        // $addDestinationQuery->bindValue(':img', $destination->getImg());
        // $addDestinationQuery->bindValue(':description', $destination->getDescription());

        $addDestinationQuery->execute([
            ':location' => $destination->getLocation(),
            ':price' => $destination->getPrice(),
            ':operator_id' => $destination->getOperatorId(),
            ':img' => $destination->getImg(),
            ':description' => $destination->getDescription()
        ]);

        $destination->hydrate([
            'id' => $this->db->lastInsertId()
        ]);
    }

    /* ---------- GET OPERATOR ID ---------- */
    public function getOperatorId($operatorName) 
    {
        $getOperatorIdQuery = $this->db->prepare(
            'SELECT id FROM operators WHERE name = ?'
        );
        $getOperatorIdQuery->execute([$operatorName]);
        $operator = $getOperatorIdQuery->fetch(PDO::FETCH_ASSOC);
        $operatorId = $operator['id'];
    
        return $operatorId;
    }

    /* ---------- UPDATE DESTINATION ---------- */
    public function updateDestination(Destination $destination)
    {
       $updateDestinationQuery = $this->db->prepare(
           'UPDATE destinations 
            SET location = ?, price = ?, operator_id = ?, img = ?, description = ?
            WHERE id = ?'
        );
       $updateDestinationQuery->execute([
           $destination->getLocation(),
           $destination->getPrice(),
           $destination->getOperatorId(),
           $destination->getImg(),
           $destination->getDescription(),
           $destination->getId()
       ]); 
    }

    /* ---------- DELETE DESTINATION ---------- */
    public function deleteDestination(Destination $destination)
    {
        $deleteDestinationQuery = $this->db->prepare(
            'DELETE FROM destinations WHERE id = ?'
        );
        $deleteDestinationQuery->execute([$destination->getId()]);
    }

    /* ---------- GET DESTINATION ---------- */
    public function getDestination($request)
    {
        if (is_int($request)) {
            $getDestinationData = $this->db->prepare(
                'SELECT * FROM destinations WHERE id = ?'
            );
            $getDestinationData->execute([$request]);
            $destinationData = $getDestinationData->fetch(PDO::FETCH_ASSOC);
       
        } else if (is_string($request)) {
            $getDestinationData = $this->db->prepare(
                'SELECT * FROM destinations WHERE location = ?'
            );
            $getDestinationData->execute([$request]);
            $destinationData = $getDestinationData->fetch(PDO::FETCH_ASSOC);
            
        }

        return new Destination($destinationData);
    }

    /* ---------- GET OTHER DESTINATIONS LIST ---------- */
    public function getOtherDestinations($currentDestinationLocation)
    {
        $otherDestinationsArray = [];

        $otherDestinationsQuery = $this->db->prepare(
            'SELECT * FROM destinations WHERE location <> :location ORDER BY location'
        );
        $otherDestinationsQuery->execute([':location' => $currentDestinationLocation]);

        while ($destinationData = $otherDestinationsQuery->fetch(PDO::FETCH_ASSOC)) {
            $otherDestination = new Destination($destinationData);
            array_push($otherDestinationsArray, $otherDestination);
            // break;
        }
        return $otherDestinationsArray;
    }

     /* ---------- GET DESTINATION OPERATORS ---------- */
     public function getDestinationOperators($destinationLocation)
     {
         $destinationOperatorsArray = [];
 
         $destinationQuery = $this->db->prepare(
             'SELECT * FROM destinations WHERE location = ?'
         );
         $destinationQuery->execute([$destinationLocation]);
         $destinationArray = $destinationQuery->fetchAll(PDO::FETCH_ASSOC);
 
         while ($destinationOperator = $destinationQuery->fetch(PDO::FETCH_ASSOC)) {
             $operator = new Operator($destinationOperator);
             array_push($destinationOperatorsArray, $operator);
             // break;
         }
 
         return $destinationOperatorsArray;
     }
}

?>