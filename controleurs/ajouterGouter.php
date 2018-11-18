<?php include('../modeles/bd.php');

	if(!empty($_POST['newnomGateau']) && !empty($_POST['newnomBoisson']) && !empty($_POST['newprixG']) && !empty($_POST['newquantiteG'])){

		$resultG = mysqli_query($co, "SELECT idgouter FROM gouter WHERE gateau = 
			'".$_POST['newnomGateau']."' AND boisson = '".$_POST['newnomBoisson']."'") or die("Impossible d'effectuer la search dans gouter.");

		if(mysqli_num_rows($resultG) == 0){
			header('Location:../vues/afficheStocks.php');

			$resultInsertG = mysqli_query($co, "INSERT INTO gouter (gateau, boisson, prixgouter) VALUES ('".ucfirst(strtolower($_POST['newnomGateau']))."','".ucfirst(strtolower($_POST['newnomBoisson']))."','".$_POST['newprixG']."')") or die("Impossible d'effectuer l'insertion dans gouter.");
			$idnewG = mysqli_insert_id($co);

			$resultInsertGStock = mysqli_query($co, "INSERT INTO stockgouter (idgouter, quantitegouter) VALUES ('".$idnewG."','".$_POST['newquantiteG']."')") or die("Impossible d'effectuer l'insertion dans stock gouter.");
		}else header('Location:../vues/pageAjouterGouter.php');
	}else header('Location:../vues/pageAjouterGouter.php');
?>