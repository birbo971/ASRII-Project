<?php
$titre ="Connexion";
$authentification = "active";
include('includes/header.php'); ?>
<?php include('includes/navbar.php');?>
<div class="container">
  <h1>Authentification</h1>
    <hr>
    <br/>
  <form class="form" action="authentification.php" method="post">
    <div class="form-group">
   <label for="exampleInputEmail1">Adresse Email</label>
   <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre mail">
 </div>
 <div class="form-group">
   <label for="exampleInputPassword1">Mot de passe</label>
   <input type="password" name="motdepasse" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
   <small id="emailHelp" class="form-text text-muted">Ne partagez pas votre mot de passe.</small>
 </div>
 <button type="submit" name="connexion" class="btn btn-default">Connexion</button>
  </form>
</div>
<?php connexionEspaceEtud();?>
<?php include("includes/footer.php"); ?>
