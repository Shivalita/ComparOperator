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
      <?php $allDestinations = $destinationManager->getAllDestinations();
      foreach ($allDestinations as $oneDestination) { ?>

        <div class="col mb-4">
          <div class="card">
            <img src="<?= ($oneDestination['img']); ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= ($oneDestination['location']); ?></h5>
              <span class"float-right">A partir de <?= ($oneDestination['price']); ?></span>
              <p class="card-text mt-2"><?= ($oneDestination['description']); ?></p>
              <a class="btn btn-warning float-right font-weight-bold" href="destination.php?=name<?=($oneOperator['name']);?>" role="button">Voir les prix</a>
            </div>
          </div>
        </div>
        <!-- echo ($oneDestination->getLocation()); -->
      <?php  } ?>
      <div class="col mb-4">
        <div class="card">
          <img src="https://source.unsplash.com/random/400x300/?landscape" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <span class"float-right">A partir de €€€</span>
            <p class="card-text mt-2">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a class="btn btn-warning float-right font-weight-bold" href="destination.php?=name<?=($oneOperator['name']);?>" role="button">Voir les prix</a>
          </div>
        </div>
      </div>

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
