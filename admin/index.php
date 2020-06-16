<?php
include('../config.php');
include(ROOT.DS.'assets'.DS.'config'.DS.'connection.php');
include(ROOT.DS.'assets'.DS.'config'.DS.'autoload.php');
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>ADMIN</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-white" href="admin.html">ADMINISTRATOR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
<<<<<<< HEAD
        <a class="nav-item nav-link text-white" href="/view/fiche-to-admin.html">Fiche TO</a>
        <a class="nav-item nav-link text-white" href="/view/fiche-destination-admin.html">Fiche Destination</a>
=======
        <a class="nav-item nav-link text-white" href="../view/fiche-operator-admin.php">Fiche TO</a>
        <a class="nav-item nav-link text-white" href="../view/fiche-destination-admin.php">Fiche Destination</a>
>>>>>>> 1e0576a9c7db10ce60c9dbce8384758584e280e6
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h3>Liste tours operateurs</h3>
    <div class="row">

      <div class="col-sm-12 mb-4">
        <div class="card">
          <div class="card-body d-inline-flex">
            <p>Tour opérateur n°1</p>
            <a class="btn btn-warning ml-5" href="./view/fiche-destination-admin.html" role="button">Fiche </a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <hr style="width:100%;height:2px;">

  <div class="container">
    <div class="container w-75 d-flex justify-content-center  mt-5">
      <div class="card p-4 shadow" style="width: 22rem;">
        <h4 class="text-center text-underlined"><strong>Ajouter un TO</strong></h4>
<<<<<<< HEAD
        <form class="p-3" action="../assets/apps/add_operator.php" method="POST" enctype="multipart/form-data">
          <input type="text" class="form-control mb-2" placeholder="Nom Tour operateurs" name="operatorName">
          <input type="text" class="form-control mb-2" placeholder="Lien site internet" name="operatorLink">
          <input type="file" class="form-control-file" accept="image/*" name="operatorLogo" required>
          <div class="text-center">
              <button class="btn btn-success align-center" type="submit" name="submit">Ajouter</button>
=======
        <form class="p-3" action="./apps/add_to.php" method="POST" enctype="multipart/form-data">
          <input type="text" class="form-control mb-2" placeholder="Nom Tour operateurs" name="#">
          <input type="text" class="form-control mb-2" placeholder="Lien site internet" name="#">
          <input type="file" class="form-control-file" accept="image/*" name="#" required>
          <input class="form-check-input" type="checkbox" id="gridCheck1">
          <label class="form-check-label" for="gridCheck1">
            Example checkbox
          </label>
        </form>
        <div class="text-center">
          <button class="btn btn-success align-center" type="submit" name="submit">Ajouter</button>
>>>>>>> 1e0576a9c7db10ce60c9dbce8384758584e280e6
        </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
