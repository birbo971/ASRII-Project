<?php
$titre="Ajouter un projet tuteuré";
 require('/includes/Ajouter_projet.php');
  include('/includes/header.php');
  include('includes/navbar.php');

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
 
<?php  include('includes/footer.php');
