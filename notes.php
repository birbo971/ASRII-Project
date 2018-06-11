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
  <div id="more_com" class="">

  </div>
<?php }

include('includes/footer.php');
?>

<script type="text/javascript">

$(".test").change(function(){
  var notes = this.value;

  $.ajax({
     url : 'ajax.php',
     type : 'GET',
     data : 'id_codes=' + notes+'&id='+this.id,
     success : function(code_html, statut){ // code_html contient le HTML renvoyé

       $('#more_com').html(code_html);
       console.log(code_html);
     }
  });
});




</script>
