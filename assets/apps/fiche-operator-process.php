
<?php
  function getFormattedOperatorName($nameToFormat) {
      $nameToFormat = str_replace('%', ' ', $nameToFormat);
      $nameToFormat = ucwords($nameToFormat);
      return $nameToFormat;
  }

  $operatorManager = new OperatorManager($db);

  if (isset($_GET['name'])) {
      $operatorName = getFormattedOperatorName($_GET['name']);
      $operator = $operatorManager->getOperator($operatorName);
      $operatorId = $operator->getId();
  }
?>