<?php
$enseignant ='active';
$titre ="Espace Enseignant";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<!--Content-->
<div class="container">
  <h1>Espace Enseignant</h1>
  <hr>
  <br/>
  <li><a href="">Acceder à ses notes.</a><i class="fas fa-edit"></i></li><br/>
  <li><a href="">Acceder à l'emploi du temps personnel.</a><i class="fas fa-newspaper"></i></li><br/>
  <li><a href="">Acceder au support de cours.</a><i class="fas fa-project-diagram"></i></li><br/>
</div>


<?php include("includes/footer.php"); ?>
