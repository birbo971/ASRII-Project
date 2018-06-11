<?php
$enseignant ='active';
$titre ="Notes";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<?php if($_SESSION['etat'] == "etudiant"){
  ?><!--Content-->
  <div class="container">
    <h1>Mes Notes</h1>
    <br/>
    <?php notesEtudiant(); ?>
  </div>
<?php
}else if($_SESSION['etat'] == "enseignant"){
?>
  <div class="container">
    <h1>Notes déposées</h1>
    <br/>
    <?php notesEnseignant(); ?>
  </div>
<?php }
include('includes/footer.php');
?>
