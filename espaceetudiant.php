<?php
$etudiant ='active';
$titre ="Espace Etudiant";
include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<div class="container">
  <h1>Espace Etudiant</h1>
    <hr>
    <br/>
  <li><a href="notes.php">Acceder à ses notes.</a>&nbsp;<i class="fas fa-edit"></i></li><br/>
  <li><a href="">Acceder à l'emploi du temps.</a>&nbsp;<i class="fas fa-newspaper"></i></li><br/>
  <li><a href="">Consulter les projets tuteurés disponibles.</a>&nbsp;<i class="fas fa-clipboard"></i></li><br/>
  <li><a href="">Consulter les offres d'alternances ouvertes à candidature.</a>&nbsp;<i class="fas fa-handshake"></i></li><br/>
  <li><a href="">Consulter les supports de cours.</a>&nbsp;<i class="fab fa-leanpub"></i></li>
</div>
<?php include("includes/footer.php"); ?>
