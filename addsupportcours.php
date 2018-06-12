<?php
$enseignant ='active';
$titre ="Ajouter un support de cours";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<?php if($_SESSION['etat'] == "enseignant" || $_SESSION['etat'] == "personnel miaw" ){
  ?><!--Content-->
  <div class="container">
    <h1>Ajouter un support de cours</h1>
    <hr/>
    <br/>
     <form action="addsupportcours.php" method="POST" enctype="multipart/form-data">
            <legend>  <h3 class="text-center">Importez un support de cours :</h3> <br/>
                <input type="file" name="fichier" class="btn btn-secondary" /><br />
                <input type="submit" name="btn-upload" value="Envoyer le fichier" class="btn btn-light" /></legend>
     </form>

     <?php
           addSupportCours();
  ?>
  </div>
<?php
}
include('includes/footer.php');
 ?>
