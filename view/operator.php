<?php
// include ($_SERVER['DOCUMENT_ROOT'].'/config.php');
include('../config.php');

$operatorManager = new OperatorManager($db);
$destinationManager = new DestinationManager($db);
$reviewManager = new ReviewManager($db);

$operator = $operatorManager -> getOperator($_GET['name']);

$operatorId = $reviewManager -> getOperatorId($_GET['name']);

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
  <?php 
  include ('../assets/partials/nav-user.php'); 
  include ('../assets/apps/feedback.php');
  ?>
  

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
          <div class="card shadow">
            <img src="https://source.unsplash.com/random/800x600/?city,landscape,<?= ($oneDestination->getLocation()); ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center font-weight-bold"><?= ($oneDestination->getLocation()); ?></h5>
              <p class="text-success font-weight-bold"><span>A partir de <?= ($oneDestination->getPrice()); ?>€</span></p>
              <p class="card-text mt-2"><?= ($oneDestination->getDescription()); ?></p>
              <a class="btn btn-warning float-right font-weight-bold" href="destination.php?name=<?= $operator->getName(); ?>&location=<?= $oneDestination->getLocation(); ?>" role="button">Voir le voyage</a>
            </div>
          </div>
        </div>
        <!-- echo ($oneDestination->getLocation()); -->
      <?php  } ?>

    </div>
  </div>

  <div class="container mt-5">
    <h1 class="text-center mt-3 mb-4">Nos avis clients</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#exampleModal">
      Laissez votre avis
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Laisser votre avis</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form class="#" action="../assets/apps/add-review.php" method="POST">
              <input name="operatorName" type="hidden" value="<?= $_GET['name'] ?>">
              <div class="form-group">
                <input type="text" class="form-control mb-2" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="username" required>
                <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Votre avis" rows="3" maxlength="400" name="message" required></textarea>
                </div>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-success">Envoyer</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide shadow" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php
        $operatorId = $operator->getId();
        $reviews = $reviewManager->getOperatorReviews($operatorId);

        for ($i = 0; $i < count($reviews); $i++) {
          echo ('<li data-target="#carouselExampleCaptions" data-slide-to="'.$i.'"></li>');
        }
        ?>
      </ol>
      <div class="carousel-inner">
        <?php
        for ($i = 0; $i < count($reviews); $i++) {
          if ($i <= 0) {
            echo ('<div class="carousel-item active">');
          } else {
            echo ('<div class="carousel-item">');
          }
          ?>
          <img src="../assets/images/dark-bg.jpg" style="width: 800px; height: 300px;" class="d-block w-100" alt="...">
          <div class="carousel-caption d-sm-block">
            <h5><i class="fas fa-user fa-2x"></i></h5>
            <small><?= $reviews[$i]["message"] ?></small>
            <p class="font-italic"><small><?= $reviews[$i]["author"] ?></small></p>
          </div>
        </div>
      <?php } ?>

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
</div>

<?php include '../assets/partials/footer.php'; ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
