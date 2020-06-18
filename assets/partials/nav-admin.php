<?php include ('../assets/apps/premium_process.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="index.php">ADMINISTRATOR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link text-white" href="/index.php">Retour au site</a>
      <form class="" action="#" method="POST">
      <?php
        if (isset($_GET['name'])) {
          echo ('<input name="nameValue" type="hidden" value="'.$_GET['name'].'">');
        } else if (isset($_GET['location'])) {
          echo ('<input name="locationValue" type="hidden" value="'.$_GET['location'].'">');
        }
      ?>
        <button class="btn btn-success" type="submit" role="button" name="premium">Deviens Premium</button>
      </form>
    </div>
  </div>
</nav>
