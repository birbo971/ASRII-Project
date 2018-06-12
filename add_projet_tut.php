<?php
$titre="Ajouter un projet tuteuré";
 require('/includes/Ajouter_projet.php');
  include('/includes/header.php');
  include('includes/navbar.php');
  if( $_POST){

    if( empty($_POST['email'])){

      $erreur="erreur";
    }else{
      $email=$_POST['email'];
    }

    if( empty($_POST['nom'])){
      $erreur="erreur";
    }else{
      $nom=$_POST['nom'];
    }

    if( empty($_POST['title'])){
      $erreur="erreur";
    }else{
      $title=$_POST['title'];
    }

    if( empty($_POST['description'])){
      $erreur="erreur";
    }else{
      $description=$_POST['description'];
    }
    if( !isset($erreur)){
      if( !empty($_SESSION['etat'])){
        echo "test";
         Ajouter_projet::ajouterProjet($nom,$email,$description,$title,$_SESSION['id']);
      }else{
        Ajouter_projet::ajouterProjet($nom,$email,$description,$title,null);
      }

		  $erreur='';
    }
  }else{
	  $erreur="";
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
 <div class="container" style="margin-bottom:60px;">

  <div class="col-sm-12">

    <h1 class="color-blue">
      Vous êtes une entreprise et vous souhaitez nous soumettre votre projet ?
    </h1>
</br>

  <p style="font-weight:bold;">
    Vous avez une problématique d’entreprise liée à une activité de e-commerce ? Vous souhaitez développer votre activité digitale ?
    Vous avez pour projet la réalisation ou la refonte d’un site web ?
  </p>
  <p>
    Ces services sont totalement gratuits, aucune rémunération ne sera versé aux étudiants , c’est un projet pédagogique visant à professionnaliser les étudiants.
    Il vous faudra juste être présent pour présenter vos attentes et répondre à leurs éventuelles questions lors du projet. L’idéal est tout de même d’accompagner les étudiants à la réussite de leur projet.
  </p>

  <div class="bordure-horizontal"> </div>
  <h2>Vous pouvez faire appel à nos étudiants et proposez votre projet à notre équipe enseignante.</h2>
<br>
   <form class="form-horizontal col-sm-10 margin-centrer"   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
     <div class="form-group">
       <label class="control-label " for="nom">Nom de votre entreprise:</label>
       <div class="col-sm-12">
         <input type="text" class="form-control <?= !isset($nom) ? $erreur: ''; ?>" value="<?= isset($nom) ? $nom: ''; ?>" id="nom" name="nom" placeholder="Entrez le nom de votre entreprise">
       </div>
     </div>
   <div class="form-group">
     <label class="control-label " for="email">Email:</label>
     <div class="col-sm-12">
       <input type="email" class="form-control <?= !isset($email) ? $erreur: ''; ?>" value="<?= isset($email) ? $email: ''; ?>" id="email" name="email" placeholder="Entrez votre email">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label" for="titre">Titre projet tuteuré:</label>
     <div class="col-sm-12">
       <input type="text" class="form-control <?= !isset($title) ? $erreur: ''; ?>" value="<?= isset($title) ? $title: ''; ?>" id="title"  name="title" placeholder="Titre projet tuteuré">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label" for="description">Description Projet: </label>
     <div class="col-sm-12">
       <textarea class="form-control <?= !isset($description) ? $erreur: ''; ?>" rows="5" value="<?= isset($description) ? $description: ''; ?>" id="description" name="description" placeholder="Veuillez entrer une description de votre projet"></textarea>
     </div>
   </div>
   <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" class="btn btn-default">Valider</button>
     </div>
   </div>
  </form>
  <?php if($erreur){ ?>
        <div class='alert alert-danger' role='alert'>
            <p>Tous les champs ne sont pas correctement remplies</p>
          </div>
  <?php  } ?>
  </div>

</div>
<script type="text/javascript">
  document.getElementById('description').value = '<?= $description ; ?>';
</script>
<?php  include('includes/footer.php');
