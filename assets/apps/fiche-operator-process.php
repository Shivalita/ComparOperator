<?php
function getFormattedOperatorName($nameToFormat) {
      $nameToFormat = str_replace('%', ' ', $nameToFormat);
      $nameToFormat = ucwords($nameToFormat);
      return $nameToFormat;
    }
    echo getFormattedOperatorName($_GET['name']);
?>