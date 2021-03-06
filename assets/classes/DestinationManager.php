<?php

class DestinationManager
{
  protected $db;

  public function __construct(PDO $db)
  {
    $this->db = $db;
  }


  /* ---------- CREATE DESTINATION ---------- */
  public function createDestination(Destination $destination)
  {
    $addDestinationQuery = $this->db->prepare(
      'INSERT INTO destinations(location, price, operator_id, img, description)
      VALUES(:location, :price, :operator_id, :img, :description)'
    );

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
  

  /* ---------- GET ALL DESTINATIONS ---------- */
  public function getAllDestinations()
  {
    $allDestinationsQuery = $this->db->query(
      'SELECT * FROM destinations'
    );
    $allDestinationsArray = $allDestinationsQuery->fetchAll(PDO::FETCH_ASSOC);

    function super_unique($array, $key)
    {
      $temp_array = [];
      foreach ($array as &$v) {
        if (!isset($temp_array[$v[$key]]))
        $temp_array[$v[$key]] =& $v;
      }
      $array = array_values($temp_array);
      return $array;
    }

    $allDestinations = super_unique($allDestinationsArray, 'location');

    return $allDestinations;
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


    /* ---------- GET ALL DESTINATIONS/OPERATORS FOR A LOCATION ---------- */
    public function getDestinationOperators($destinationLocation, $sort)
    {
      $allDestinationOperatorsArray = [];

      if ($sort === 'lowPrice') {
        $destinationOperatorsQuery = $this->db->prepare(
          '   SELECT destinations.*, operators.*
              FROM destinations
              INNER JOIN operators
              ON destinations.operator_id = operators.id
              AND destinations.location = ?
              ORDER BY destinations.price ASC'
          );
      } else if ($sort === 'highPrice') {
        $destinationOperatorsQuery = $this->db->prepare(
          '   SELECT destinations.*, operators.*
              FROM destinations
              INNER JOIN operators
              ON destinations.operator_id = operators.id
              AND destinations.location = ?
              ORDER BY destinations.price DESC'
          );
      } else if ($sort === 'rate') {
        $destinationOperatorsQuery = $this->db->prepare(
          '   SELECT destinations.*, operators.*
              FROM destinations
              INNER JOIN operators
              ON destinations.operator_id = operators.id
              AND destinations.location = ?
              ORDER BY operators.rate DESC'
          );
      } else if ($sort === 'premium') {
        $destinationOperatorsQuery = $this->db->prepare(
          '   SELECT destinations.*, operators.*
              FROM destinations
              INNER JOIN operators
              ON destinations.operator_id = operators.id
              AND destinations.location = ?
              ORDER BY operators.is_premium DESC'
          );
      }

      $destinationOperatorsQuery->execute([$destinationLocation]);
      $allDestinationOperatorsArray = $destinationOperatorsQuery->fetchAll(PDO::FETCH_ASSOC);

      return $allDestinationOperatorsArray;
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
      }
      return $otherDestinationsArray;
    }
  }

  ?>
