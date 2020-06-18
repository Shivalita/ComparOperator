<?php
include($_SERVER['DOCUMENT_ROOT'].'/config.php');

$operatorManager = new OperatorManager($db);
$destinationManager = new DestinationManager($db);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://kit.fontawesome.com/a58b6117a4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Home</title>
</head>
<body>

  <?php include '../assets/partials/nav-user.php'; ?>


  <div class="container mb-5">
    <div id="carouselExampleSlidesOnly" class="carousel slide shadow" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="5000">
          <img class="d-block w-100 img-fluid" src="https://source.unsplash.com/EXdXLrZXS9Q/1600x800/" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Londres</h1>
            <a class="btn btn-warning btn-lg" href="destination.php?name=Londres" role="button">Visiter</a>
          </div>
        </div>
        <div class="carousel-item" data-interval="5000">
          <img class="d-block w-100 img-fluid" src="https://source.unsplash.com/NiyRORf8d8I/1600x800/" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h3>Tokyo</h3>
            <a class="btn btn-warning btn-lg" href="destination.php?name=Tokyo" role="button">Visiter</a>
          </div>
        </div>
        <div class="carousel-item" data-interval="5000">
          <img class="d-block w-100 img-fluid" src="https://source.unsplash.com/nnzkZNYWHaU/1600x800/" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h3>Paris</h3>
            <a class="btn btn-warning btn-lg" href="destination.php?name=Paris" role="button">Visiter</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <h2 class="text-center mb-4">Nos destinations</h2>

    <div class="row row-cols-1 row-cols-md-3">
    <?php  $allDestinations = $destinationManager->getAllDestinations();
      foreach ($allDestinations as $oneDestination) { ?>

        <div class="col mb-4">
          <div class="card shadow">
            <img src="<?= ($oneDestination['img']); ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center"><?= ($oneDestination['location']); ?></h5>
              <p class="card-text"><?= ($oneDestination['description']); ?></p>
              <a class="btn btn-warning font-weight-bold d-flex justify-content-center" href="destination.php?name=<?= ($oneDestination['location']); ?>" role="button">En savoir plus</a>
            </div>
          </div>
        </div>
      <?php } ?>

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
