<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Admin - fiche opérateur</title>
</head>
<body>

  <?php
  // include($_SERVER['DOCUMENT_ROOT'].'/config.php');
  include ('../config.php');
  include ('../assets/partials/nav-admin.php');
  include ('../assets/apps/fiche-operator-process.php');
  include ('../assets/apps/feedback.php');


  $destinationManager = new DestinationManager($db);
  $operatorManager = new OperatorManager($db);

  $operator = $operatorManager -> getOperator($_GET['name']);
  ?>

  <div class="container mt-5">
    <h1 class="text-center mb-5"><?php echo $_GET['name'] ?></h1>
    <h3>Liste destinations</h3>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>
          <th scope="col">Nom</th>
        </tr>
      </thead>
      <tbody>
        <!-- FAIRE LA BOUCLE FOREACH A PARTIR D'ICI -->
        <?php    $allOperatorDestinations = $operatorManager->getOperatorDestinations($operator->getId());
        foreach ($allOperatorDestinations as $oneDestination) { ?>
        <tr>
          <th scope="row"><a class="btn btn-warning" href="fiche-destination-admin.php?name=<?= ($_GET['name']); ?>&location=<?= ($oneDestination->getLocation()); ?>" role="button">Fiche </a></th>
          <td class="font-weight-bold"><?= ($oneDestination->getLocation()); ?></td>
        </tr>
        <!-- JUSQU'ICI -->
        <?php } ?>
      </tbody>
    </table>
  </div>

  <hr style="width:100%;height:2px;">

  <div class="container">
    <div class="container w-75 d-flex justify-content-center  mt-5">
      <div class="card p-4 shadow" style="width: 22rem;">
        <h4 class="text-center text-underlined"><strong>Ajouter une destination</strong></h4>
        <!-- <small>ici l'affichage du message d'erreur ou de validation </small> -->
        <form id="addDestinationForm" class="p-3 form" action="../assets/apps/add-destination.php" method="POST" enctype="multipart/form-data">
          <input type="text" class="form-control mb-2" placeholder="Nom destination" name="destinationLocation">
          <input type="text" class="form-control mb-2" placeholder="€" name="destinationPrice">
          <textarea class="form-control mb-2" placeholder="Description" name="destinationDescription"></textarea>
          <input type="file" class="form-control-file" accept="image/*" name="destinationImage" >
          <input name="operatorName" type="hidden" value="<?= $_GET['name'] ?>">
          <div class="text-center">
            <button class="btn btn-success align-center mt-2" type="submit" name="submit">Ajouter</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <form class="p-3" action="../assets/apps/operator-delete-operator.php" method="POST">
    <input name="operatorName" type="hidden" value="<?= $_GET['name'] ?>">
    <div class="d-flex justify-content-center mt-3 mb-5">
      <button class="btn btn-danger d-flex justify-content-center w-25" href="#" role="button">Supprimer cet opérateur</button>
    </div>
  </form>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <!-- <script src="../assets/js/script.js"></script> -->
</body>
</html>
