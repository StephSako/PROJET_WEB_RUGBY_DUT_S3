<?php
	session_start();
	class Membre{		
		private $connexion;
		private $login;
		private $mdpasse;
		private $statutAdmin;

		public function __construct(){
	    	include('bd.php');
    		$resultAdmin = mysqli_query($co, "SELECT login FROM admin WHERE login = '".func_get_arg(1)."'") or die("Impossible d'exécuter la requête de verification de l'admin.");

			if (mysqli_num_rows($resultAdmin) == 0) $this->statutAdmin = false;
			else $this->statutAdmin = true;
			$this->mdpasse = func_get_arg(0);
	        $this->login = func_get_arg(1);
			$this->connexion = $co;
	    }

		public function modifier($newlogin, $newmdpasse){
			$this->mdpasse = $newmdpasse;
			$this->login = $newlogin;
			$_SESSION['mdpasse'] = $this->mdpasse;
			$_SESSION['login'] = $this->login;
		}

		public function connexion(){
			$_SESSION['login'] = $this->login;
			$_SESSION['mdpasse'] = $this->mdpasse;
			$_SESSION['statutAdmin'] = $this->statutAdmin;
		}

		public function deconnexion(){
			session_unset();
			mysqli_close($this->connexion);			
		}

		public function inscription($selectcat, $nom, $mdpasse, $login, $IdMoyPaiement,$nEnfant, $pEnfant,
			$soldeinitial){
			include('bd.php');

			$resultIDCat = mysqli_query($co, "SELECT idcategorie FROM categorie WHERE
				nomcategorie = '".$selectcat."'") or die("Impossible d'exécuter la requête de categorie.");
		
			$tableau = mysqli_fetch_array($resultIDCat);
			$idCat = $tableau['idcategorie'];

			//insertion du nouveau parent
			$resultInsertP = mysqli_query($co, "INSERT INTO Parent (NomParent, MotDePasse, Login, IdMoyPaiement) VALUES ('".$nom."','".$mdpasse."', '".$login."','".$IdMoyPaiement."')") or die("Impossible d'effectuer l'insertion dans parent.");
			$idparent = mysqli_insert_id($co);

			//insertion du nouvel enfant
			$resultInsertE = mysqli_query($co, "INSERT INTO enfant (Nomenfant, prenomenfant, idcategorie) VALUES ('".$nEnfant."','".$pEnfant."', '".$idCat."')") or die("Impossible d'effectuer l'insertion dans enfant.");
			$idenfant = mysqli_insert_id($co);

			//insertion du nouveau compte enfant
			$resultInsertCE = mysqli_query($co, "INSERT INTO compteenfant (idparent, idenfant, soldeinitial) VALUES ('".$idparent."','".$idenfant."','".$soldeinitial."')") or die("Impossible d'effectuer l'insertion dans compte enfant.");
		}
	}
?>