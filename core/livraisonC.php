<?PHP
if(file_exists("config.php"))
{
	include "config.php";
}
else
{
	include "../config.php";
}
class livraisonC {
function afficherLivraison ($livraison){
		echo "Réfèrence: ".$livraison->getRef()."<br>";
		echo "Nom: ".$livraison->getNom()."<br>";
		echo "Prénom: ".$livraison->getPrenom()."<br>";
		echo "E-mail: ".$livraison->getMail()."<br>";
		echo "Téléphone: ".$livraison->getNumtel()."<br>";
		echo "Ville: ".$livraison->getVille()."<br>";
		echo "Adresse: ".$livraison->getAdresse()."<br>";
		echo "Code Postal: ".$livraison->getCodepostal()."<br>";	
		echo "Livreur: ".$livraison->getLivreur()."<br>";
		
	}
	
	function ajouterLivraison($livraison){
		$sql="insert into livraison (ref,nom,prenom,mail,numtel,ville,adresse,codepostal,livreur) values (:ref,:nom,:prenom,:mail,:numtel,:ville,:adresse,:codepostal,:livreur)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $ref=$livraison->getRef();
        $nom=$livraison->getNom();
        $prenom=$livraison->getPrenom();
        $mail=$livraison->getMail();
        $numtel=$livraison->getNumtel();
        $ville=$livraison->getVille();
        $adresse=$livraison->getAdresse();
 		$codepostal=$livraison->getCodepostal();
 		$livreur=$livraison->getLivreur();




		$req->bindValue(':ref',$ref);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':numtel',$numtel);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':codepostal',$codepostal);
		$req->bindValue(':livreur',$livreur);
		
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function afficherLivraisons(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivraison($ref){
		$sql="DELETE FROM livraison where ref= :ref";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':ref',$ref);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierLivraison($livraison,$ref){
		$sql="UPDATE livraison SET ref=:refn, nom=:nom,prenom=:prenom,mail=:mail,numtel=:numtel,ville=:ville,adresse=:adresse,codepostal=:codepostal,livreur=:livreur  WHERE ref=:ref";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$refn=$livraison->getRef();
        $nom=$livraison->getNom();
        $prenom=$livraison->getPrenom();
        $mail=$livraison->getMail();
        $numtel=$livraison->getNumtel();
        $ville=$livraison->getVille();
        $adresse=$livraison->getAdresse();
  		$codepostal=$livraison->getCodepostal();
        $livreur=$livraison->getLivreur();

        
        
		$datas = array(':refn'=>$refn, ':ref'=>$ref, ':nom'=>$nom,':prenom'=>$prenom,':mail'=>$mail,':numtel'=>$numtel,':ville'=>$ville,    ':adresse'=>$adresse,':codepostal'=>$codepostal,':livreur'=>$livreur);
		$req->bindValue(':refn',$refn);
		$req->bindValue(':ref',$ref);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':numtel',$numtel);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':codepostal',$codepostal);
		$req->bindValue(':livreur',$livreur);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	
	function afficherlivreurs(){
		//$sql="SElECT * From produit e inner join formationphp.produit a on e.reference= a.reference";
		$sql="SElECT * From livreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function recupererLivraison($ref){
		$sql="SELECT * from livraison where ref=$ref";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
}

?>