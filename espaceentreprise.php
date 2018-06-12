<?php
$enseignant ='active';
$titre ="Espace Entreprise";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<!--Content-->
<div class="container center">
  <h1>Espace Entreprise</h1>
  <hr>
  <h2>Projets <i class="fas fa-project-diagram"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="add_projet_tut.php">Ajouter un projet tuteuré.</a>
    </li>
    <li>
      <a href="consulter_ses_projet.php">Consulter ses projets tuteurés.</a>
    </li>
  </ul><br/>
  <h2>Stages</h2>
    <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="add_stage.php">Ajouter une offre d'alternance</a>
    </li>
    <li>
      <a href="consulter_ses_stage.php">Consulter ses offres d'alternance</a>
    </li>
  </ul>
</div>


<?php include("includes/footer.php"); ?>
