<?php
include ($_SERVER['DOCUMENT_ROOT'].'/config.php');
// include ('../config.php');

$operatorManager = new OperatorManager($db);
$destinationManager = new DestinationManager($db);

$destination = $destinationManager->getDestination($_GET['location']);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Admin - fiche destination</title>
</head>
<body>

  <?php
  include ('../assets/partials/nav-admin.php');
  include ('../assets/apps/feedback.php');
  ?>

  <div class="container">
    <div class="container w-75 d-flex justify-content-center  mt-5">
      <div class="card p-4 shadow" style="width: 22rem;">
        <h4 class="text-center text-underlined"><strong><?= $destination->getLocation() ?></strong></h4>
        <!-- <small>ici l'affichage du message d'erreur ou de validation </small> -->
        <form class="p-3" action="../assets/apps/update-destination.php" method="POST" enctype="multipart/form-data">
          <input name="destinationLocation" type="hidden" value="<?= $destination->getLocation() ?>">
          <input name="operatorName" type="hidden" value="<?= $_GET['name'] ?>">
          <input type="text" class="form-control mb-2" placeholder="<?= $destination->getPrice() ?>€" name="destinationPrice">
          <textarea class="form-control mb-2" placeholder="<?= $destination->getDescription() ?>" name="destinationDescription"></textarea>
          <input type="file" class="form-control-file" accept="image/*" name="destinationImg">
          <div class="text-center">
            <button class="btn btn-success align-center mt-3" type="submit" name="submit">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <form class="mt-4" action="../assets/apps/operator-delete-destination.php" method="POST">
    <input name="destinationLocation" type="hidden" value="<?= $destination->getLocation() ?>">
    <input name="operatorName" type="hidden" value="<?= $_GET['name'] ?>">
    <div class="text-center">
      <button class="btn btn-danger align-center" type="submit" name="submit">Supprimer cette destination</button>
    </div>
  </form>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
