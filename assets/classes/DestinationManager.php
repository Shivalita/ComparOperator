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
            'SELECT * FROM destinations'
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

        $addDestinationQuery->bindValue(':location', $destination->getLocation());
        $addDestinationQuery->bindValue(':price', $destination->getPrice());
        $addDestinationQuery->bindValue(':operator_id', $destination->getOperatorId());
        $addDestinationQuery->bindValue(':img', $destination->getImg());
        $addDestinationQuery->bindValue(':description', $destination->getDescription());

        $addDestinationQuery->execute();

        $destination->hydrate([
            'id' => $this->db->lastInsertId()
        ]);
    }



}

?>