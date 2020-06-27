<div class="container mb-5 mt-2">
    <div id="carouselExampleSlidesOnly" class="carousel slide shadow" data-ride="carousel" data-interval="1000">
      <div class="carousel-inner">
      <?php 
        $allOperators = $operatorManager->getAllOperators();
        $destinationsArray = [];

        for ($i = 0; $i < 3; $i++) { 
          $operator = $operatorManager->getOperator($allOperators[$i]['name']);
          $operatorDestinations = $operatorManager->getOperatorDestinations($operator->getId());
          array_push($destinationsArray, $operatorDestinations[0]);
        }

        for ($i = 0; $i < 3; $i++) { 
          if ($i === 0) {
            echo ('<div class="carousel-item active" data-interval="3000">');
          } else {
            echo ('<div class="carousel-item" data-interval="3000">');
          }
          ?>

            <img class="d-block w-100 img-fluid" src="https://source.unsplash.com/random/1600x800/?city,landscape,<?= $destinationsArray[$i]->getLocation() ?>" alt="Slide '.$i.'">
            <div class="carousel-caption d-none d-md-block">
              <h1><?= $destinationsArray[$i]->getLocation() ?></h1>
              <a class="btn btn-warning btn-lg" href="destination.php?location=<?= $destinationsArray[$i]->getLocation() ?>" role="button">Visiter</a>
            </div>
          </div>
      <?php
        }
      ?>
      
      </div>
    </div>
  </div>