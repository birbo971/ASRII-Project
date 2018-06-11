<?php
$enseignant ='active';
$titre ="Ajouter un support de cours";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<?php if($_SESSION['etat'] == "enseignant"){
  ?><!--Content-->
  <div class="container">
    <h1>Ajouter un support de cours</h1>
    <hr/>
    <br/>
     <form class="" action="addsupportcours.php" method="post">
            <fieldset>  <h3>Importez un support de cours :</h3> <br/>
                <input class="btn btn-secondary" type="file" name="file" /><br />
                <input class="btn btn-light" type="submit" name="btn-upload" value="Envoyer le fichier" /></fieldset>
     </form>
     <?php addSupportCours();?>
  </div>
<?php
}
include('includes/footer.php');
 ?>
