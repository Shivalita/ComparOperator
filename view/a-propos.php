<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://kit.fontawesome.com/a58b6117a4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Destinations</title>
</head>
<body>

  <?php 
  include ('../assets/partials/nav-user.php'); 
  ?>

<div class="jumbotron jumbotron-fluid fond1 shadow-sm">
    <div class="container text-center">
      <h1 class="display-4 text-white">À propos</h1>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <h4>Le site</h4>
    </div>
    <div class="col-12 mt-2">
      <p>
        Le but de ce site était de créer un POC (Proof Of Concept), par conséquent toutes les fonctionnalités n'ont pas encore été mises en place ou finalisées.<br>
        Le système de notation et les boutons de réservation n'ont pas été implémentés, et sont actuellement de simples indicateurs de fonctionnalités futures.<br>
        Des améliorations diverses seront apportées au projet afin de le perfectionner.
      </p>
      <hr>
      <p>
        L'ensemble du site est dynamique et géré par un panel administrateur. Un accès est également dédié aux tours opérateurs pour la gestion de leurs profils.<br>
        N'hésitez pas à nous contacter pour une démonstration des fonctionnalités. 
      </p>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12 text-center">
      <h4>L'équipe</h4>
    </div>
    <div class="col-12 text-center mt-2">
      <p >
          Ce projet a été réalisé en duo, et le travail a été divisé en pôles Front-End et Back-End.
      </p>
    </div>
    <div class="col-6 mb-4">
      <div class="card shadow">
        <div class="card-body">
          <h5 class="card-title font-weight-bold text-center">Antonin</h5>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          </p>
        </div>
      </div>
    </div>

    <div class="col-6 mb-4">
      <div class="card shadow">
        <div class="card-body">
          <h5 class="card-title font-weight-bold text-center">Perle</h5>
          <p>
            J'ai pris en charge le développement Back-End et mis en place l'ensemble des fonctionnalités du site. 
            Conçu en POO PHP, il est géré dynamiquement via des managers de classe. J'ai rédigé une documentation qui recense toutes les méthodes créées, 
            accompagnées du type de données récupérées, d'informations et d'exemples afin de faciliter leur utilisation.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include ('../assets/partials/footer.php'); 
  ?>