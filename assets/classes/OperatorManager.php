<?php

class OperatorManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /* ---------- GET ALL OPERATORS ---------- */
    public function getAllOperators() 
    {
        $allOperatorsQuery = $this->db->query(
            'SELECT * FROM operators'
        );
        $allOperatorsArray = $allOperatorsQuery->fetchAll(PDO::FETCH_ASSOC);
       
        return $allOperatorsArray;
    }

    /* ---------- COUNT OPERATORS ---------- */
     public function countOperators()
    {
        $operatorsCountQuery = $this->db->query(
            'SELECT * from operators'
        );
        $operatorsCount = $operatorsCountQuery->fetchAll(PDO::FETCH_ASSOC);

        return count($operatorsCount);
    }

     /* ---------- CHECK IF OPERATOR EXISTS ---------- */
     public function checkOperatorExists($operator)
    {
        if (is_int($operator)) {
            return (bool) $this->db->query(
                'SELECT COUNT(*) FROM operators WHERE id = '
                .$operator)->fetchColumn();
        }

        $verifyOperatorExists = $this->db->prepare(
            'SELECT COUNT(*) FROM operators WHERE name = :name'
        );
        $verifyOperatorExists->execute([':name' => $operator]);
        
        return (bool) $verifyOperatorExists->fetchColumn();           
    }

    /* ---------- CREATE OPERATOR ---------- */
    public function createOperator(Operator $operator)
    {
        $addOperatorQuery = $this->db->prepare(
        'INSERT INTO operators(name, link, logo)
         VALUES(:name, :link, :logo)'
        );

        $addOperatorQuery->bindValue(':name', $operator->getName());
        $addOperatorQuery->bindValue(':link', $operator->getLink());
        $addOperatorQuery->bindValue(':logo', $operator->getLogo());

        $addOperatorQuery->execute();
    }

    /* ---------- UPDATE OPERATOR ---------- */
    public function updateOperator(Operator $operator)
    {
       $updateOperatorQuery = $this->db->prepare(
           'UPDATE operators 
            SET name = ?, link = ?, is_premium = ?, logo = ?
            WHERE id = ?'
        );
       $updateOperatorQuery->execute([
           $operator->getName(),
           $operator->getLink(),
           $operator->getIsPremium(),
           $operator->getLogo(),
           $operator->getId()
       ]); 
    }

    /* ---------- DELETE OPERATOR ---------- */
    public function deleteOperator(Operator $operator)
    {
        $deleteOperatorQuery = $this->db->prepare(
            'DELETE FROM operators WHERE id = ?'
        );
        $deleteOperatorQuery->execute([$operator->getId()]);
    }

    /* ---------- GET OPERATOR ---------- */
    public function getOperator($request)
    {
        if (is_int($request)) {
            $getOperatorData = $this->db->prepare(
                'SELECT * FROM operators WHERE id = ?'
            );
            $getOperatorData->execute([$request]);
            $operatorData = $getOperatorData->fetch(PDO::FETCH_ASSOC);
            
        } else if (is_string($request)) {
            $getOperatorData = $this->db->prepare(
                'SELECT * FROM operators WHERE name = ?'
            );
            $getOperatorData->execute([$request]);
            $operatorData = $getOperatorData->fetch(PDO::FETCH_ASSOC);
            
        }

        return new Operator($operatorData);
    }

    /* ---------- GET OTHER OPERATORS LIST ---------- */
    public function getOtherOperators($currentOperatorName)
    {
        $otherOperators = [];

        $otherOperatorsQuery = $this->db->prepare(
            'SELECT * FROM operators WHERE name <> :name ORDER BY name'
        );
        $otherOperatorsQuery->execute([':name' => $currentOperatorName]);

        while ($operatorData = $otherOperatorsQuery->fetch(PDO::FETCH_ASSOC)) {
            $otherOperators[] = new Operator($operatorData);
            break;
        }
        return $otherOperators;
    }
        
}

?>