<?php

class Ajouter_projet
{
    public static function  ajouterProjet($nom, $email, $titre, $desc)
    {
        $sth = DB::get()->prepare("INSERT INTO `asrii`.`ajout_projet` (`id`, `nom`, `email`, `titre`, `description`, `etat`) VALUES (NULL, :nom, :email, :titre, :desc, 'en attente')");
        $sth->bindParam(':nom', $nom);
		$sth->bindParam(':email', $email);
		$sth->bindParam(':titre', $titre);
		$sth->bindParam(':desc', $desc);
		$sth->execute();
    }

}
?>
