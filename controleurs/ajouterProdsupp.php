<?php include('../modeles/bd.php');

	if(!empty($_POST['newnomPS']) && !empty($_POST['newprixPS']) && !empty($_POST['newquantitePS'])){

		$resultPS = mysqli_query($co, "SELECT Nomprodsupp FROM produitsupplementaire WHERE nomprodsupp = 
			'".$_POST['newnomPS']."'") or die("Impossible d'effectuer la search dans prodsupp.");

		if(mysqli_num_rows($resultPS) == 0){
			header('Location:../vues/afficheStocks.php');

			$resultInsertPS = mysqli_query($co, "INSERT INTO produitsupplementaire (nomprodsupp, prixprodsupp) VALUES ('".ucfirst(strtolower($_POST['newnomPS']))."','".$_POST['newprixPS']."')") or die("Impossible d'effectuer l'insertion dans produit supplementaire.");
			$idnewPS = mysqli_insert_id($co);

			$resultInsertPSStock = mysqli_query($co, "INSERT INTO stockprodsupp (idprodsupp, quantiteprodsuppstock) VALUES ('".$idnewPS."','".$_POST['newquantitePS']."')") or die("Impossible d'effectuer l'insertion dans stock produit supplementaire.");
		}else header('Location:../vues/pageAjouterProdsupp.php');
	}else header('Location:../vues/pageAjouterProdsupp.php');
?>