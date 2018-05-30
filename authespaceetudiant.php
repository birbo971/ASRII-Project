<?php
$titre ="Espace Etudiant";
include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<div class="container">
  <h1>Authentification de l'étudiant</h1>
    <hr>
    <br/>
  <form class="form" action="espaceetudiant.php" method="post">
    <div class="form-group">
   <label for="exampleInputEmail1">Adresse Email</label>
   <input type="email" name="emailEtudiant" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre mail">
   <small id="emailHelp" class="form-text text-muted">Nous n'allons pas partager votre email.</small>
 </div>
 <div class="form-group">
   <label for="exampleInputPassword1">Mot de passe</label>
   <input type="password" name="motdepasseEtudiant" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
 </div>
 <button type="submit" name="connexion" class="btn btn-default">Se connecter</button>
  </form>
</div>
<?php include("includes/footer.php"); ?>
