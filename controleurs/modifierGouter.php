<?php include('../modeles/bd.php'); session_start();
	
	if(!empty($_POST['gateauModif']) && !empty($_POST['boissonModif']) && !empty($_POST['prixGModif'])
	&& !empty($_POST['qtéGModif'])){
		header('Location:../vues/afficheStocks.php');

		//mise à jour
		$result = mysqli_query($co, "UPDATE gouter
		SET gateau = '".$_POST['gateauModif']."', boisson = '".$_POST['boissonModif']."', prixgouter = '".$_POST['prixGModif']."'
		WHERE idgouter = '".$_SESSION['idGModif']."'") or die("Impossible d'exécuter la requête de gouter.");

		$result = mysqli_query($co, "UPDATE stockgouter
		SET quantitegouter = '".$_POST['qtéGModif']."'
		WHERE idgouter = '".$_SESSION['idGModif']."'") or die("Impossible d'exécuter la requête de stockG.");

	}else header('Location:../vues/pageSelectionModifG.php');
	
?>