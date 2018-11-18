<?php
	include('../modeles/bd.php');
	include('../modeles/membre.php');
	
	if(!empty($_POST['login']) && !empty($_POST['mdpasse'])){

		$resultParent = mysqli_query($co, "SELECT Login, MotDePasse FROM Parent WHERE Login =
			'".$_POST['login']."' AND MotDePasse = '".$_POST['mdpasse']."'") or die("Impossible d'exécuter la requête de connexion.");
		$resultAdmin = mysqli_query($co, "SELECT Login, motdepasse FROM Admin WHERE Login = 
			'".$_POST['login']."' AND motdepasse = '".$_POST['mdpasse']."'") or die("Impossible d'exécuter la requête de connexion.");

		if (mysqli_num_rows($resultAdmin) == 0 && mysqli_num_rows($resultParent) == 0)
			header('Location:../vues/pageConnexion.php');
		else{
			header('Location:../vues/accueil.php');

			$newMembre = new Membre($_POST['login'], $_POST['login']);
			$newMembre->connexion();
		}
	}else header('Location:../vues/pageConnexion.php');
?>