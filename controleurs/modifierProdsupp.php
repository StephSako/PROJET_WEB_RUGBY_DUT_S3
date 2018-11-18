<?php include('../modeles/bd.php'); session_start();
	
	if(!empty($_POST['nomPSModif']) && !empty($_POST['prixPSModif']) && !empty($_POST['qtéPSModif'])){
		header('Location:../vues/afficheStocks.php');

		//mise à jour
		$result = mysqli_query($co, "UPDATE produitsupplementaire
		SET nomprodsupp = '".$_POST['nomPSModif']."', prixprodsupp = '".$_POST['prixPSModif']."'
		WHERE idprodsupp = '".$_SESSION['idPSModif']."'") or die("Impossible d'exécuter la requête de PS.");

		$result = mysqli_query($co, "UPDATE stockprodsupp
		SET quantiteprodsuppstock = '".$_POST['qtéPSModif']."'
		WHERE idprodsupp = '".$_SESSION['idPSModif']."'") or die("Impossible d'exécuter la requête de stockPS.");

	}else header('Location:../vues/pageSelectionModifPS.php');
	
?>