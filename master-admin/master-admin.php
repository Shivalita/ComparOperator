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

  <div class="container mt-5">
    <h1 class="text-center mb-5">Espace Administrateur</h1>
    <h3>Liste tour operator</h3>
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
        <tr>
          <th scope="row"><a class="btn btn-danger" href="#" role="button">Supprimer</a></th>
          <td>Mark</td>
          <td><input class="form-check-input ml-3" type="checkbox" id="gridCheck1"></td>
        </tr>
        <!-- JUSQU'ICI -->
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
        <!-- FAIRE LA BOUCLE FOREACH A PARTIR D'ICI -->
        <tr>
          <th scope="row"><a class="btn btn-danger" href="#" role="button">Supprimer</a></th>
          <td>Mark</td>
          <td>Hello,World!</td>
        </tr>
        <!-- JUSQU'ICI -->
      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
