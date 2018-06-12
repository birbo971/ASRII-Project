<?php
$enseignant ='active';
$titre ="Espace Personnel Miaw";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<!--Content-->
<div class="container center">
  <h1>Espace Personnel Miaw</h1>
  <hr>
  <h2>Validations <i class="fas fa-project-diagram"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="validation_projet.php">Valider les projets tuteurés.</a>
    </li>
    <li>
      <a href="validation_stage.php">Valider les offres d'alternances.</a>
    </li>
  </ul><br/>
  <h2>Utilisateurs</h2>
    <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="ajout_membre.php">Ajouter un utilisateur.</a>
    </li>
  </ul>
</div>


<?php include("includes/footer.php"); ?>
