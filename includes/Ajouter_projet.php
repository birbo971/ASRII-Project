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
}
