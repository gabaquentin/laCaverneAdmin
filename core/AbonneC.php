<?PHP

class AbonneC {
function afficherAbonne ($abonne){
		echo "Nom: ".$abonne->getName()."<br>";
		echo "Prénom: ".$abonne->getPrenom()."<br>";
		echo "Date de naissance: ".$abonne->getDatenaiss()."<br>";
		echo "Numero de telephone: ".$abonne->getTel()."<br>";
		echo "Email: ".$abonne->getEmail()."<br>";
		echo "Adresse: ".$abonne->getAdresse()."<br>";
		echo "Mot de passe: ".$abonne->getPass()."<br>";
	}
	function ajouterAbonne($abonne){
		$sql="insert into abonne (nom,prenom,datenaiss,telephone,email,adresse,motdepasse) values (:nom,:prenom,:datenaiss,:telephone,:email,:adresse,:motdepasse)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

        $nom=$abonne->getName();
        $prenom=$abonne->getPrenom();
        $datenaiss=$abonne->getDatenaiss();
        $tel=$abonne->getTel();
        $email=$abonne->getEmail();
        $adresse=$abonne->getAdresse();
        $pass=$abonne->getPass();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':datenaiss',$datenaiss);
		$req->bindValue(':telephone',$tel);
		$req->bindValue(':email',$email);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':motdepasse',$pass);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function afficherAbonnes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From abonne";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function supprimerAbonne($email){
		$sql="DELETE FROM abonne where email= :email";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':email',$email);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierAbonne($abonne,$email){
		$sql="UPDATE abonne SET nom=:nom,prenom=:prenom,datenaiss=:datenaiss,telephone=:telephone,email=:emaill,adresse=:adresse,motdepasse=:pass WHERE email=:email";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
        $nom=$abonne->getName();
        $prenom=$abonne->getPrenom();
        $datenaiss=$abonne->getDatenaiss();
        $tel=$abonne->getTel();
        $emaill=$abonne->getEmail();
        $adresse=$abonne->getAdresse();
        $pass=$abonne->getPass();
		$datas = array(':emaill'=>$emaill, ':nom'=>$nom,':prenom'=>$prenom,':datenaiss'=>$datenaiss,':telephone'=>$tel,':email'=>$email,':adresse'=>$adresse,':pass'=>$pass);
		$req->bindValue(':emaill',$emaill);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':datenaiss',$datenaiss);
		$req->bindValue(':telephone',$tel);
		$req->bindValue(':email',$email);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':pass',$pass);


            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }

	}

	function recupererAbonne($email){
		$sql="SELECT * from abonne where email=$email";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function afficheAbpp(){
		$sql="SELECT COUNT(*) as nbabonne FROM abonne";
		$db = config::getConnexion();
		try{
            $liste=$db->query($sql);
            $donnees = $liste->fetch();
            $liste->closeCursor();
            $_SESSION['nbabonne']=$donnees['nbabonne'];
            //echo "<p style='color:white;'>".$donnees['nbabonne']."</p>";
            $_SESSION['perpage'] = 10 ;
            $_SESSION['nbpage']=ceil($_SESSION['nbabonne']/$_SESSION['perpage']);
            if(isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $_SESSION['nbpage'] )
            {
                $_SESSION['cPage'] = $_GET['p'];
                $_SESSION['nbpage']=ceil(($_SESSION['nbabonne']/$_SESSION['perpage'])/7)+$_GET['p'];
            }
            else
            {
                $_SESSION['cPage'] = 1;
            }
            if($_SESSION['nbpage'] > ceil($_SESSION['nbabonne']/$_SESSION['perpage']))
            {
                $_SESSION['nbpage'] = ceil($_SESSION['nbabonne']/$_SESSION['perpage']);
            }


		$sql="SELECT *  FROM abonne ORDER BY Date_Creation ASC LIMIT ".(($_SESSION['cPage']-1)*$_SESSION['perpage']).",".$_SESSION['perpage']."";
		$db = config::getConnexion();
		try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function rechercherDouble($mail){
		$sql="SELECT count(*) FROM abonne WHERE email = :email";
		$db = config::getConnexion();
		try{
		$req_prep=$db->query($sql);
        $req_prep->execute(array(0=>$mail));
        $resultat = $req_prep->fetchColumn();
		return $req_prep;

		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

}

?>