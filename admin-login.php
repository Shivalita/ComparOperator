<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Connexion</title>
</head>
<body>
  <div class="container">
    <h1 class="text-center mt-5 mb-5">Connexion Admin</h1>

    <div class="row row-cols-1 row-cols-md-2">

      <div class="col mb-4">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="card-title text-center">Administrateur Tour Operateurs</h5>
          <form class="mx-auto" action="#" method="#" >
              <div class="form-group mt-3">
                <div class="form-group">
                  <input type="text" name='username' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
              <a class="btn btn-success" href="admin/index.php" role="button">Se connecter</a>
            </form>
          </div>
        </div>
      </div>

      <div class="col mb-4">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="card-title text-center">Master Admin</h5>
          <form class="mx-auto" action="#" method="#" >
              <div class="form-group mt-3">
                <div class="form-group">
                  <input type="text" name='username' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
              <a class="btn btn-success" href="master-admin/master-admin.php" role="button">Se connecter</a>
            </form>
          </div>
        </div>
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
