<?php include('../modeles/bd.php');

	if(!empty($_POST['selectenfant']) && ((isset($_POST['gateauselect']) && isset($_POST['boissonselect'])) ||
		isset($_POST['prodsuppselect']))){
		
		header('Location:../vues/pageConfirmationCommande.php');

		//determination du gouter en fonction du gateau et de la boisson choisie,
		//de l'enfant et du produit supplémentaire
		if(isset($_POST['gateauselect']) && isset($_POST['boissonselect']) && isset($_POST['qtégouter'])
		&& $_POST['qtégouter'] > 0){
			//savoir si la commande comporte un gouter ...
			$resultGouter = mysqli_query($co, "SELECT idgouter FROM gouter WHERE gateau =
				'".$_POST['gateauselect']."' AND boisson ='".$_POST['boissonselect']."'") or die("Impossible d'exécuter la requête.");
			$tableau = mysqli_fetch_array($resultGouter);
			$idgouter = $tableau['idgouter'];
			$qtégouter = htmlspecialchars($_POST['qtégouter']);
		}else{
			$idgouter = 1; //... sinon la valeur est NULL
			$qtégouter = 0;
		}

		if(isset($_POST['prodsuppselect']) && $_POST['qtéprodsupp'] > 0 && isset($_POST['qtéprodsupp'])){
			//savoir si la commande comporte des produits supplémentaires ...
			$resultProdSupp = mysqli_query($co, "SELECT idprodsupp FROM produitsupplementaire WHERE nomprodsupp = '".$_POST['prodsuppselect']."'") or die("Impossible d'exécuter la requête.");
			
			$tableau = mysqli_fetch_array($resultProdSupp);
			$idprodsupp = $tableau['idprodsupp'];
			$qtéprodsupp = htmlspecialchars($_POST['qtéprodsupp']);
		}else{
			$idprodsupp = 1; //... sinon la valeur est NULL
			$qtéprodsupp = 0;
		}

		$resultEnfant = mysqli_query($co, "SELECT idenfant FROM enfant
			WHERE prenomenfant = '".$_POST['selectenfant']."'") or die("Impossible d'exécuter la requête.");
		
		$tableau = mysqli_fetch_array($resultEnfant);
		$idenfant = $tableau['idenfant'];

		$date = date("Y/m/d");

		//insertions de la nouvelle consommation
		$resultInsert = mysqli_query($co, "INSERT INTO consommation (dateconso, idenfant, idprodsupp,idgouter,quantitegouter,quantiteprodsupp) VALUES
		('".$date."','".$idenfant."', '".$idprodsupp."','".$idgouter."',
		'".$qtégouter."','".$qtéprodsupp."')") or die("Impossible d'effectuer l'insertion de la consommation.");

		//mise à jour des quantités des stocks des gouters
		$resultMAJGouterStock = mysqli_query($co, "UPDATE stockgouter
		SET quantitegouter = quantitegouter - ".$qtégouter."
		WHERE IdGouter = '".$idgouter."'") or die("Impossible d'effectuer la mise à jour des stocks de gouter.");

		//mise à jour des quantités des stocks des produits supplémentaires
		$resultMAJProdsuppStock = mysqli_query($co, "UPDATE stockprodsupp
		SET QuantiteProdSuppStock = QuantiteProdSuppStock - ".$qtéprodsupp."
		WHERE idprodsupp = '".$idprodsupp."'") or die("Impossible d'effectuer la mise à jour des stocks de prodsupp.");

	}else header('Location:../vues/pageCommande.php');
?>