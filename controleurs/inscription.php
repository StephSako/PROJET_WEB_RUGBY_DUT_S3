<?php
	include('../modeles/bd.php');
	include('../modeles/membre.php');

	if(!empty($_POST['login']) && !empty($_POST['mdpasse']) && !empty($_POST['nom']) &&
	   !empty($_POST['selectcategorie']) && !empty($_POST['pEnfant']) && !empty($_POST['nEnfant'])
	   && !empty($_POST['soldeinitial']) && $_POST['soldeinitial'] > 10 && $_POST['soldeinitial'] <= 150){
		$login = htmlspecialchars($_POST['login']);			
		$mdpasse = htmlspecialchars($_POST['mdpasse']);
		$nom = htmlspecialchars($_POST['nom']);

		//determination du moyen de paiement
		if(empty($_POST['CarteBancaire'])) $CarteBancaire = 0;
		else $CarteBancaire = 1;
		if(empty($_POST['Espece'])) $Espece = 0;
		else $Espece = 1;
		$resultMoyPaiement = mysqli_query($co, "SELECT IdMoyPaiement FROM MoyenPaiement WHERE '".$CarteBancaire."' = CarteBancaire AND '".$Espece."' = Espece") or die("Impossible d'effectuer l'insertion.");
		$tableau = mysqli_fetch_array($resultMoyPaiement);
		$IdMoyPaiement = $tableau['IdMoyPaiement'];

		//on verirife l'unicité du nouveau membre
		$resultLogin = mysqli_query($co, "SELECT login FROM parent WHERE login = '".$login."'") or die("Impossible d'exécuter la requête.");
		$resultNom = mysqli_query($co, "SELECT nomparent FROM parent WHERE nomparent = '".$nom."'") or die("Impossible d'exécuter la requête.");
		$resultMDP = mysqli_query($co, "SELECT MotDePasse FROM parent WHERE motdepasse = '".$mdpasse."'") or die("Impossible d'exécuter la requête.");

		//on vérifie que l'enfant n'est pas déjà associé à un parent
		$resultVerifAssoc = mysqli_query($co, "SELECT idenfant FROM compteenfant NATURAL JOIN enfant
		WHERE prenomenfant = '".$_POST['pEnfant']."' AND nomenfant = '".$_POST['nEnfant']."'")
		or die("Impossible d'exécuter la requête.");
		
		// On vérifie
		if (mysqli_num_rows($resultLogin) == 0 && mysqli_num_rows($resultNom) == 0 && mysqli_num_rows($resultMDP) == 0 && mysqli_num_rows($resultVerifAssoc) == 0)
			$exist = false;
		else $exist = true;

		//traitement en fonction de l'existence
		if ($exist == false){
			header('Location:../vues/accueil.php');
			if(!isset($_SESSION['login'])){ //dans le cas ou un utilisateur creer un compte et etant deja connecter
				$newMembre = new Membre($mdpasse, $login);
				$newMembre->inscription($_POST['selectcategorie'], $nom, $mdpasse, $login, $IdMoyPaiement,$_POST['nEnfant'], $_POST['nEnfant'], $_POST['soldeinitial']);
				$newMembre->connexion();
			}
		}else header('Location:../vues/pageInscription.php');
	}else header('Location:../vues/pageInscription.php');
?>