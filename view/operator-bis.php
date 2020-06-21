<?php
include ('../config.php');

$operatorManager = new OperatorManager($db);
$destinationManager = new DestinationManager($db);

$operator = $operatorManager -> getOperator($_GET['name']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://kit.fontawesome.com/a58b6117a4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Operator</title>
</head>
<body>
  <?php include '../assets/partials/nav-user.php'; ?>

  <div class="jumbotron jumbotron-fluid fond">
    <div class="container text-center">
      <h1 class="display-4 text-white"><?php echo $_GET['name'] ?></h1>
    </div>
  </div>

  <div class="container">
    <h1 class="text-center mt-3 mb-4">Les Destinations</h1>
    <div class="row row-cols-1 row-cols-md-4">
      <?php $allOperatorDestinations = $operatorManager->getOperatorDestinations($operator->getId());
      foreach ($allOperatorDestinations as $oneDestination) { ?>

        <div class="col mb-4">
          <div class="card">
            <img src="<?= ($oneDestination->getImg()); ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= ($oneDestination->getLocation()); ?></h5>
              <span class"float-right">A partir de <?= ($oneDestination->getPrice()); ?>€</span>
              <p class="card-text mt-2"><?= ($oneDestination->getDescription()); ?></p>
              <a class="btn btn-warning float-right font-weight-bold" href="destination.php?name=<?= ($oneDestination->getLocation()); ?>" role="button">Voir le voyage</a>
            </div>
          </div>
        </div>
        <!-- echo ($oneDestination->getLocation()); -->
      <?php  } ?>

    </div>
  </div>

  <div class="container mt-5">
    <h1 class="text-center mt-3 mb-4">Nos avis clients</h1>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <?php
          for ($i = 0; $i < count($allOperatorDestinations); $i++) { 
            if ($i <= 0) {
              echo ('<div class="carousel-item active">');
            } else {
              echo ('<div class="carousel-item">');
            }
            
            echo ('
              <img src="https://source.unsplash.com/G9i_plbfDgk/1600x325/" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>'.$operator->getName().'</h5>
                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,
                  when an unknown printer took a galley of type and scrambled it to make a type
                  specimen book.</small>
                </div>
              </div>
          ');
          }
        ?>
        
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>


  <?php include '../assets/partials/footer.php'; ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
