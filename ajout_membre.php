<?php
$titre="Ajouter un utilisateur";
 require('/includes/Ajouter_projet.php');
  include('/includes/header.php');
  include('includes/navbar.php');
  if($_POST){
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['select']) && !empty($_POST['mdp'])){

         Ajouter_projet::ajoute_utilisateur($_POST['nom'], $_POST['prenom'] , $_POST['email'] , $_POST['select'] , $_POST['mdp']);
         $test=1;
    }
}
 ?>

<style>
.margin-centrer{
  margin:auto;
  display:table;
}
.erreur{
  border:1px solid red;
}

div.bordure-horizontal {
margin:10px;
border-top: 1px solid #00B2CC;
}
.erreur-haut{

  padding:2px 2px 0 2px;
  border:2px solid red;
  -webkit-border-radius: 15px;
  -moz-border-radius: 15px;
  border-radius: 15px;
}
.color-blue{
color:#00B2CC;
}
</style>

<div class="container">
  <h1>Ajouter un utilisateur</h1>

    <hr>
    <br/>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="form-group">
       <label class="control-label " for="nom">Nom:</label>
       <div class="col-sm-12">
         <input type="text" class="form-control"  id="nom" name="nom" placeholder="Nom">
       </div>
     </div>
     <div class="form-group">
       <label class="control-label " for="prenom">Prenom:</label>
       <div class="col-sm-12">
         <input type="text" class="form-control"  id="prenom" name="prenom" placeholder="prenom">
       </div>
     </div>
     <div class="form-group">
       <label class="control-label " for="email">Email:</label>
       <div class="col-sm-12">
         <input type="email" class="form-control"  id="email" name="email" placeholder="email">
       </div>
     </div>
     <div class="form-group">
       <label class="control-label " for="mdp">Mot de passe</label>
       <div class="col-sm-12">
         <input type="password" class="form-control"  id="mdp" name="mdp" placeholder="Mot de passe">
       </div>
     </div>
     <div class="form-group">
       <label class="control-label " for="etat">Type utilisateur</label>
       <div class="col-sm-12">
       <select id="monselect" name="select"  class="form-control">
          <option value=""></option>
          <option value="enseignant" >enseignant</option>
          <option value="entreprise"  >entreprise</option>
          <option value="etudiant"  >etudiant</option>
          <option value="personnel miaw"  >personnel miaw</option>
      </select>
       </div>
     </div>

   <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" class="btn btn-default">Valider</button>
     </div>
   </div>
    </form>
    <?php
    if( isset($test)){
        echo '<div class="col-sm-8 text-center contentcenter"><div class="alert alert-success" role="alert">
        L\'utilisateur à bien été ajouté.
    </div></div>';
    }

?>
  <hr>
</div>



<?php  include('includes/footer.php'); ?>
