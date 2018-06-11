<?php
include('includes/DB.php');
function updateNotes($id,$notes){
  $pdo = DB::get();

   $req = $pdo->prepare("UPDATE `asrii`.`notes` SET `notes` = '".$notes."' WHERE `notes`.`id_notes` = $id ");
  $req->execute();
  $res = $req->rowCount();
  if($res > 0){
    echo'<div class="alert alert-success">Notes enregistrée.  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
  }
}
if(isset($_GET["id"]) && isset($_GET['id_codes'])){
  updateNotes($_GET['id'],$_GET['id_codes']);
}

?>
