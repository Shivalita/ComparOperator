<?php
// include($_SERVER['DOCUMENT_ROOT'].'/config.php');
include('../config.php');

$operatorManager = new OperatorManager($db);
$destinationManager = new DestinationManager($db);

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Master admin</title>
</head>
<body>

  <?php include '../assets/partials/nav-master-admin.php'; ?>
  <?php include '../assets/apps/feedback-message.php'; ?>

  <div class="container mt-5">
    <h1 class="text-center mb-5">Espace Administrateur</h1>

    <div class="container">
      <div class="container w-75 d-flex justify-content-center  mt-5">
        <div class="card p-4 shadow" style="width: 22rem;">
          <h4 class="text-center text-underlined"><strong>Ajouter un tour opérateur</strong></h4>
          <form class="p-3" action="../assets/apps/add-operator.php" method="POST" enctype="multipart/form-data">
            <input type="text" class="form-control mb-2" placeholder="Nom Tour operateurs" name="operatorName">
            <input type="text" class="form-control mb-2" placeholder="Lien site internet" name="operatorLink">
            <input type="file" class="form-control-file" accept="image/*" name="operatorLogo" >
            <div class="text-center">
              <button class="btn btn-success mt-2 align-center" type="submit" name="submit">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <h3>Liste tours opérateurs</h3>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>
          <th scope="col">Nom</th>
          <th scope="col">Premium</th>
        </tr>
      </thead>
      <tbody>
        <!-- FAIRE LA BOUCLE FOREACH A PARTIR D'ICI -->
        <?php    $allOperators = $operatorManager->getAllOperators();
        foreach ($allOperators as $oneOperator) { ?>
        <form id="deleteOperatorForm" class="p-3" action="../assets/apps/delete-operator.php" method="POST">
          <input name="operatorName" type="hidden" value="<?= ($oneOperator['name']); ?>">
          <tr>
            <th scope="row"><button type="submit" class="btn btn-danger" role="button">Supprimer</button></th>
        </form>
        <form id="changePremiumForm" class="p-3" action="../assets/apps/change-premium.php" method="POST">
            <input name="operatorName" type="hidden" value="<?= ($oneOperator['name']); ?>">
            <td class="font-weight-bold"><?= ($oneOperator['name']); ?></td>
            <?php 
            if ($oneOperator['is_premium'] === '1') {
              echo '<td><button class="btn btn-warning" type="submit" name="removePremium">Remove Premium</button>';
            } else {
              echo '<td><button class="btn btn-success" type="submit" name="setPremium">Set Premium</button>';
            }
            ?>
            </td>
          </tr>
        </form>

        <!-- JUSQU'ICI -->
        <?php } ?>
      </tbody>
    </table>
  </div>


  <div class="container mt-5">
    <h3>Liste destinations</h3>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>
          <th scope="col">Lieu</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody>
        <?php  $allDestinations = $destinationManager->getAllDestinations();
        foreach ($allDestinations as $oneDestination) { ?>
        <!-- FAIRE LA BOUCLE FOREACH A PARTIR D'ICI -->
        <form id="deleteDestinationForm" class="p-3" action="../assets/apps/delete-destination.php" method="POST">
        <input name="destinationLocation" type="hidden" value="<?= $oneDestination['location']; ?>">
        <tr>
          <th scope="row"><button class="btn btn-danger" role="button">Supprimer</button></th>
          <td class="font-weight-bold"><?= ($oneDestination['location']); ?></td>
          <td class="font-italic"><?= ($oneDestination['description']); ?></td>
        </tr>
        <?php } ?>
        <!-- JUSQU'ICI -->
      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="../assets/js/script.js"></script>
</body>
</html>
