<?php

class Manager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /* ---------- OPERATORS ---------- */

    public function getAllOperators() 
    {
        $allOperatorsQuery = $this->db->query('SELECT * FROM tour_operators');
        $allOperatorsArray = $allOperatorsQuery->fetchAll();
       
        return $allOperatorsArray;
    }

    public function createOperator(Operator $operator)
    {

    }

    /* ---------- DESTINATIONS ---------- */

    public function getAllDestinations() 
    {
        $allDestinationsQuery = $this->db->query('SELECT * FROM destinations');
        $allDestinationsArray = $allDestinationsQuery->fetchAll();
       
        return $allDestinationsArray;
    }

    /* ---------- REVIEWS ---------- */


}
?>