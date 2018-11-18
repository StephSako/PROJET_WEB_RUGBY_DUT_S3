<?php include('../modeles/bd.php');
	header('Location:../vues/confirmViderBD.php');

	//si la vue voirchaquesoldechaqueenfant est vide c'est qu'il y a deja eu une reinitialisation et un mail a deja ete envoyé

	$resultMail = mysqli_query($co, "SELECT idenfant FROM voirsoldechaqueenfant") or die("Impossible d'exécuter la requête des mails vue.");

	if(mysqli_num_rows($resultMail) != 0){
		//tous les mails à rembourser
		$resultMail = mysqli_query($co, "SELECT nomparent, solde, login FROM parent NATURAL JOIN compteenfant NATURAL JOIN voirsoldechaqueenfant WHERE solde > 0") or die("Impossible d'exécuter la requête des mails complete.");

		if(mysqli_num_rows($resultMail) != 0){
			while($row = mysqli_fetch_assoc($resultMail)) {
			    $to      = $row['login'];
			    $subject = 'Votre Solde APERO';
	    $message =
	    'Bonjour '.$row['nomparent'].' !

Toutes les consommations de l\'application APERO ont été réinitialisés.
Il reste du solde dans votre compte APERO qui vous sera remboursé à la rentrée : '.$row['solde'].' €.

Merci et à bientôt au salon des Associations pour une nouvelle réinscription !
Les Administrateurs APERO';
			    $headers = 'From: steph.sako@gmail.com';
			    mail($to, $subject, $message, $headers);
			}
		}

		//tous les mails qui doivent rembourser leur solde négatif
		$resultMail = mysqli_query($co, "SELECT nomparent, solde, login FROM parent NATURAL JOIN compteenfant NATURAL JOIN voirsoldechaqueenfant WHERE solde < 0 AND nomparent = 'Sakovitch'") or die("Impossible d'exécuter la requête des mails negatif.");
		if(mysqli_num_rows($resultMail) != 0){
			while($row = mysqli_fetch_assoc($resultMail)) {
			    $to      = $row['login'];
			    $subject = 'Votre Solde APERO';
			    $message =
	    'Bonjour '.$row['nomparent'].' !

Toutes les consommations de l\'application APERO ont été réinitialisées.
Votre solde APERO est en négatif, que vous devrez rembourser au plus vite auprès du président : '.$row['solde'].' €.

Merci et à bientôt au salon des Associations pour une nouvelle réinscription !
Les Administrateurs APERO';
			    $headers = 'From: steph.sako@gmail.com';
			    mail($to, $subject, $message, $headers);
			}
		}
	}
	
	$resultTruncate = mysqli_query($co, "TRUNCATE consommation") or die("Impossible d'exécuter la requête de reinitialisation des tables.");
?>