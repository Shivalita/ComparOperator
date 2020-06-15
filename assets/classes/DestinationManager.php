<?php

class OperatorManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}

/* ---------- GET ALL DESTINATIONS ---------- */

    public function getAllDestinations() 
    {
        $allDestinationsQuery = $this->db->query('SELECT * FROM destinations');
        $allDestinationsArray = $allDestinationsQuery->fetchAll();
    
        return $allDestinationsArray;
    }

?>