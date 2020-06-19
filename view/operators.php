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
  <title>Operators</title>
</head>
<body>

  <?php include '../assets/partials/nav-user.php'; ?>

  <div class="jumbotron jumbotron-fluid fond">
    <div class="container text-center">
      <h1 class="display-4 text-white">Tour operateurs</h1>
    </div>
  </div>


  <div class="container">
    <div class="row row-cols-1 row-cols-md-3">

      <?php    $allOperators = $operatorManager->getAllOperators();
      foreach ($allOperators as $oneOperator) { ?>

        <div class="col mb-4">
          <div class="card shadow">
            <img src="../assets/images/operators-logo.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <!-- Voir si possible d'afficher si l'operator est premium ou pas. EN DESSOUS -->
              <?php
              if($oneOperator['is_premium'] === '1')
              {
                echo '<span class="badge badge-success">Premium</span>';
              }
              ?>
              <span class="badge badge-success"></span>
              <h5 class="card-title text-center font-weight-bold"><?=($oneOperator['name']);?> </h5>
              <div class="stars">
                <form action="">
                  <input class="star star-1" id="star-1" type="radio" name="star"/>
                  <label class="star star-1" for="star-1"></label>
                  <input class="star star-2" id="star-2" type="radio" name="star"/>
                  <label class="star star-2" for="star-2"></label>
                  <input class="star star-3" id="star-3" type="radio" name="star"/>
                  <label class="star star-3" for="star-3"></label>
                  <input class="star star-4" id="star-4" type="radio" name="star"/>
                  <label class="star star-4" for="star-4"></label>
                  <input class="star star-5" id="star-5" type="radio" name="star"/>
                  <label class="star star-5" for="star-5"></label>
                  <small class="text-muted">44 review</small>
                </form>
              </div>
              <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                  <a class="btn btn-info btn-lg btn-block" href="<?=($oneOperator['link']);?>" role="button">WEBSITE</a>
                </div>
                <div class="btn-group mr-2 mt-2" role="group" aria-label="Second group">
                  <a class="btn btn-warning btn-lg btn-block" href="operator.php?name=<?=($oneOperator['name']);?>" role="button">Voir les destinations</a>
                </div>
              </div>
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
