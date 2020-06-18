<?php
  function getFormattedName($nameToFormat) {
      $nameToFormat = str_replace('%20', ' ', $nameToFormat);
      $nameToFormat = ucwords($nameToFormat);
      return $nameToFormat;
  }

  $operatorManager = new OperatorManager($db);

  if (isset($_GET['name'])) {
      $operatorName = getFormattedName($_GET['name']);
      $operator = $operatorManager->getOperator($operatorName);
      $operatorId = $operator->getId();
  }
?>