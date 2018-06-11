<?php
$titre ="Ajouter une note";
$authentification = "active";
include('includes/header.php'); ?>
<?php include('includes/navbar.php');?>
<div class="container">
  <h1>Ajouter une note</h1>
    <hr>
    <br/>
  <form class="form" action="add_notes.php" method="post">
    <div class="form-row">
      <div class="col-md-8">
        <p>Matières</p>
        <select class="form-control"  name="matiere">
            <option value="vide"></option>
            <?php recupereMatiere(); ?>
        </select>
      </div>
      <br/>
      <div class="col-md-6 col-sm-12">
        <p>Notes</p>
        <input type="number" name="notes" class="form-control" placeholder="/20">
      </div>
      <br/>
      <div class="col-md-4 col-sm-12">
        <p>Etudiant</p>
        <select class="form-control"  name="etudiant">
          <option value="vide"></option>
          <?php recupereEtudiant(); ?>
        </select>
      </div>
    </div>
    <br/>
 <button type="submit" name="enregistre" class="btn btn-default">Enregistrer</button>
  </form>
  <?php insertionNotes(); ?>
</div>
<?php include('includes/footer.php'); ?>
