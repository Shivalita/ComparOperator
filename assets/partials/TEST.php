<?php
    echo('TEST OK'.'</br>');
    include(ROOT.DS.'assets'.DS.'config'.DS.'connection.php');
    include(ROOT.DS.'assets'.DS.'config'.DS.'autoload.php');
    $manager = new Manager($db);
    $tours = $manager->getAllOperators();
    foreach ($tours as $tour) {
        echo('Tour name : '.$tour['name']);
    }
?>