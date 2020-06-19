<?php
include($_SERVER['DOCUMENT_ROOT'].'/config.php');

$operatorManager = new OperatorManager($db);
$destinationManager = new DestinationManager($db);

$destination = $destinationManager -> getDestination($_GET['name']);
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

  <div class="jumbotron jumbotron-fluid fond1">
    <div class="container text-center">
      <h1 class="display-4 text-white"><?php echo $_GET['name'] ?></h1>
    </div>
  </div>

  <div class="container">
    <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#describ" role="tab" aria-controls="home" aria-selected="true">Description</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#maps" role="tab" aria-controls="profile" aria-selected="false">Maps</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#images" role="tab" aria-controls="contact" aria-selected="false">Images</a>
      </li>
    </ul>
    <div class="tab-content text-center" id="myTabContent">

      <div class="tab-pane fade show active" id="describ" role="tabpanel" aria-labelledby="home-tab">
        <img src="https://source.unsplash.com/random/600x450/?city,landscape,<?php echo $_GET['name'] ?>" class="img-fluid mt-3 mb-3 shadow" alt="Responsive image">
        <p class=""><?= ($destination->getDescription()); ?></p>
        </div>

        <div class="tab-pane fade" id="maps" role="tabpanel" aria-labelledby="profile-tab">
          <div class="container-fluid">
            <div class="map-responsive mt-3 shadow">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=<?php echo $_GET['name'] ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="contact-tab">
          <div id="carouselExampleIndicators" class="carousel slide shadow" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner mt-3">
              <div class="carousel-item active">
                <img src="https://source.unsplash.com/random/1600x800/?city,landscape,<?php echo $_GET['name'] ?>/1" class="d-block w-100 img-fluid" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://source.unsplash.com/random/1600x800/?city,landscape<?php echo $_GET['name'] ?>/2" class="d-block w-100 img-fluid" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://source.unsplash.com/random/1600x800/?city,landscape,<?php echo $_GET['name'] ?>/3" class="d-block w-100 img-fluid" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

      </div>
    </div>

    <hr class="bg-dark mb-5" style="width:50%">

    <div class="container">
      <h1 class="text-center mb-3">Les tours opérators proposant ce voyage</h1>
      <div class="row row-cols-1 row-cols-md-3">
<?php
$allDestinationOperators = $destinationManager->getDestinationOperators($destination->getLocation());

foreach ($allDestinationOperators as $destinationOperator) {
    echo('
        <div class="col mb-4">
        <div class="card shadow">
        <img src="../assets/images/operators-logo.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">'.$destinationOperator['name'].'</h5>
            <p class="card-text">'.$destinationOperator['description'].'</p>
        </div>
        <div class="card-footer bg-white">
            <small class="float-right text-success font-weight-bold">A partir de '.$destinationOperator['price'].'€</small>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a class="btn btn-warning btn-sm" href="#" role="button">Réserver</a>
        </div>
        </div>
    </div>
    ');
}
?>
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
