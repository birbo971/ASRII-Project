<?php

class Ajouter_projet
{


    public static function  ajouterProjet($nom, $email, $titre, $desc,$id)
    {

        $sth = DB::get()->prepare("INSERT INTO `asrii`.`ajout_projet` (`id`, `id_entreprise`,`nom`, `email`, `titre`, `description`, `etat`) VALUES (NULL,:id_entreprise, :nom, :email, :titre, :desc, 'en attente')");
        $sth->bindParam(':nom', $nom);
		$sth->bindParam(':email', $email);
		$sth->bindParam(':titre', $titre);
		$sth->bindParam(':desc', $desc);
      $sth->bindParam(':id_entreprise', $id);
		$sth->execute();
    }

    public static function  get_Projet($email)
    {

        $sth = DB::get()->prepare("select * from ajout_projet where email = :email");
        $sth->bindParam(':email', $email);
	     	$sth->execute();
        echo $sth->rowCount();

    }
    public static function  get_all_Projet()
    {

        $sth = DB::get()->prepare("select * from ajout_projet");
	     	$sth->execute();
             return $sth;

    }
    public static function  get_all_Stage()
    {

        $sth = DB::get()->prepare("select * from ajout_stage");
	     	$sth->execute();
             return $sth;

    }
    public static function  getProjetEntreprise($id)
    {

        $sth = DB::get()->prepare("select * from ajout_projet where id_entreprise = :id");
        $sth->bindParam(':id', $id);
	     	$sth->execute();
        return $sth;

    }
    public static function  getStageEntreprise($id)
    {

        $sth = DB::get()->prepare("select * from ajout_stage where id_entreprise = :id");
        $sth->bindParam(':id', $id);
	     	$sth->execute();
        return $sth;

    }

    public static function  ajouter_stage($nom, $email, $titre, $desc,$experience,$id)
    {

    $sth = DB::get()->prepare("INSERT INTO `asrii`.`ajout_stage` (`id`, `id_entreprise`,`nom`, `email`, `titre`, `description`,`experience` ,`etat`) VALUES (NULL, :id_entreprise, :nom, :email, :titre, :desc,:experience, 'en attente')");
    $sth->bindParam(':nom', $nom);
		$sth->bindParam(':email', $email);
		$sth->bindParam(':titre', $titre);
		$sth->bindParam(':desc', $desc);
    $sth->bindParam(':experience', $experience);
    $sth->bindParam(':id_entreprise', $id);
		$sth->execute();
  }
    public static function  modifier_etat_projet($id,$etat)
    {
        $sth = DB::get()->prepare("update ajout_projet set etat = :etat where id = $id");
        $sth->bindParam(':etat', $etat);
        $sth->execute();
    }

    public static function  modifier_etat_stage($id,$etat)
    {
        $sth = DB::get()->prepare("update ajout_stage set etat = :etat where id = $id");
        $sth->bindParam(':etat', $etat);
        $sth->execute();
    }
    public static function  ajoute_utilisateur($nom,$prenom,$email,$select,$mdp)
    {
        $sth = DB::get()->prepare("INSERT INTO `utilisateurs` (`id_users`, `nom`, `prenom`, `email`, `mdp`, `etat`) VALUES (NULL, :nom, :prenom, :email, :mdp, :etat )");
        $sth->bindParam(':nom', $nom);
        $sth->bindParam(':prenom', $prenom);
        $sth->bindParam(':email', $email);
        $sth->bindParam(':mdp', $mdp);
        $sth->bindParam(':etat', $select);
        $sth->execute();
    }
}
