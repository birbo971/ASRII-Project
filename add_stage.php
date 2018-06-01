
 <?php
 $titre="Ajouter un stage en alternance";
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
     if( empty($_POST['experience'])){
       $erreur="erreur";
     }else{
       $experience=$_POST['experience'];
       echo $experience;
     }
     if( !isset($erreur)){
       if( !empty($_SESSION['etat'])){
         Ajouter_projet::ajouter_stage($nom,$email,$title,$description,$experience,$_SESSION['id']);
       }else{
         Ajouter_projet::ajouter_stage($nom,$email,$title,$description,$experience,null);

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
       Vous êtes une entreprise et vous souhaitez nous soumettre un stage en alternance?
     </h1>
      <div class="bordure-horizontal"> </div>
 </br>

   <p style="">
     Vous voulez recruter un nouveau collaborateur mais vous avez de la peine à trouver le candidat idéal ? Les raisons peuvent être multiples. Peut-être qu’il y a pénurie de profils adaptés dans votre secteur. Ou alors, vos métiers ont évolué et vous avez besoin de rajeunir votre équipe. Mais vous n’êtes pas forcément en mesure d’embaucher à court terme.
Dans ces cas de figure, recruter un alternant peut être un bon moyen de répondre à vos besoins. En effet, l’alternance vous permet de former de nouveaux salariés pour adapter leurs compétences à vos métiers et pérenniser le développement de vos activités. En contrepartie, l’alternant apportera un regard neuf à votre entreprise. Et les connaissances acquises pendant ses temps de formation contribueront peut-être à redynamiser votre activité.
   </p>
   <p>
  <h2>   Rythme d’alternance</h2><br>

Octobre, novembre et décembre : une semaine sur deux en entreprise <br>
De janvier à mai : deux semaines successives par mois <br>
A partir du mois de juin : 100% en entreprise. <br>
   </p>


   <div class="bordure-horizontal"> </div>
   <p class="margin-centrer">Vous pouvez faire appel à nos étudiants et proposez votre stage à notre équipe enseignante.</p>
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
      <label class="control-label" for="titre">Intitulé stage: </label>
      <div class="col-sm-12">
        <input type="text" class="form-control <?= !isset($title) ? $erreur: ''; ?>" value="<?= isset($title) ? $title: ''; ?>" id="title"  name="title" placeholder="Intitulé stage">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label" for="description">Description stage: </label>
      <div class="col-sm-12">
        <textarea class="form-control <?= !isset($description) ? $erreur: ''; ?>" rows="5" value="<?= isset($description) ? $description: ''; ?>" id="description" name="description" placeholder="Veuillez entrer une description de votre stage"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label" for="titre">experience souhaitée en mois: </label>
      <div class="col-sm-12">
        <input type="number" class="form-control <?= !isset($experience) ? $erreur: ''; ?>" value="<?= isset($experience) ? $experience: ''; ?>" id="experience"  name="experience" placeholder="Précisez l'experience souhaitée en mois">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Valider</button>
      </div>
    </div>

   </form>
   </div>
 </div>
 <script type="text/javascript">
   document.getElementById('description').value = '<?= $description ; ?>';
 </script>
 <?php  include('includes/footer.php');
