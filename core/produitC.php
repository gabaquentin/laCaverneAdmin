<?PHP
if(file_exists("config.php"))
{
	include "config.php";
}
else
{
	include "../config.php";
}
class produitC {
function afficherproduit ($produit){
		echo "reference: ".$produit->getreference()."<br>";
		echo "Nom: ".$produit->getNom()."<br>";
		echo "categorie: ".$produit->getcategorie()."<br>";
		echo "prix: ".$produit->getprix()."<br>";
		echo "desciption: ".$produit->getdescription()."<br>";
		echo "image: ".$produit->getimage()."<br>";

	}

	function ajouterproduit($produit){
		$sql="insert into produit (reference,nom,categorie,prix,description) values (:reference, :nom,:categorie,:prix,:description,:image)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

        $reference=$produit->getreference();
        $nom=$produit->getNom();
        $categorie=$produit->getcategorie();
        $prix=$produit->getprix();
        $description=$produit->getdescription();
        $image=$produit->getimage();


		$req->bindValue(':reference',$reference);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':description',$description);
		$req->bindValue(':image',$image);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function afficherproduits(){
		//$sql="SElECT * From produit e inner join formationphp.produit a on e.reference= a.reference";
		if(isset($_POST["query"]))
{
        $sql = "SELECT * FROM produit WHERE nom LIKE '%".$search."%'OR categorie LIKE '%".$search."%' ";
}
else
{
		$sql="SElECT * From produit";
}
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function affichercategories(){
		//$sql="SElECT * From produit e inner join formationphp.produit a on e.reference= a.reference";
		$sql="SElECT nomcat From categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function supprimerproduit($reference){
		$sql="DELETE FROM produit where reference= :reference";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':reference',$reference);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierproduit($produit,$reference){
		$sql="UPDATE produit SET reference=:referencen, nom=:nom, categorie=:categorie, prix=:prix, description=:description WHERE reference=:reference";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
		$referencen=$produit->getreference();
        $nom=$produit->getnom();
        $categorie=$produit->getcategorie();
        $prix=$produit->getprix();
        $description=$produit->getdescription();
		$datas = array(':referencen'=>$referencen, ':reference'=>$reference, ':nom'=>$nom,':categorie'=>$categorie,
			':prix'=>$prix,':description'=>$description);
		$req->bindValue(':referencen',$referencen);
		$req->bindValue(':reference',$reference);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':description',$description);


            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }

	}
	function recupererproduit($reference){
		$sql="SELECT * from produit where reference=$reference";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function rechercherListeproduits($prix){
		$sql="SELECT * from produit where prix=$prix";
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