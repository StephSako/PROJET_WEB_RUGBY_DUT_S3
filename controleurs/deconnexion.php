<?php include('../modeles/membre.php');
	header('Location:../vues/accueilConInscr.php');
	$decoMembre = new Membre($_SESSION['mdpasse'], $_SESSION['login']);
	$decoMembre->deconnexion();
?>