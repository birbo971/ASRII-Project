<?php
$etudiant ='active';
$titre ="Emploi du temps";

include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<div class="container">
  <h1>Emploi du temps</h1>

    <hr>
    <br/>
    <?php if($_SESSION['etat'] == 'etudiant'){
      edtEtudiant(); }else{
        echo'<div class="alert alert-info" role="alert">
  Aucun emploi du temps disponible.
</div>';
      }
      ?>

</div>
<?php include("includes/footer.php"); ?>
