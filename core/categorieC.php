<?PHP

if(file_exists("config.php"))
{
	include "config.php";
}
else
{
	include "../config.php";
}
class categorieC {
function affichercategorie ($categorie){
		echo "nomcat: ".$categorie->getnom()."<br>";
		echo "referencee: ".$categorie->getref()."<br>";
		
		
	}
	
	function ajoutercategorie($categorie){
		$sql="insert into categorie (nomcat,referencee) values (:nomcat, :referencee)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		$referencee=$categorie->getref();
        $nomcat=$categorie->getnom();
      
        $req->bindValue(':referencee',$referencee);
		$req->bindValue(':nomcat',$nomcat);
		
	
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichercategories(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercategorie($referencee){
		$sql="DELETE FROM categorie where referencee=:referencee";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':referencee',$referencee);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiercategorie($categorie,$referencee){
		$sql="UPDATE categorie SET referencee=:reff,nomcat=:nomcat WHERE referencee=:referencee";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$reff=$categorie->getref();
        $nomcat=$categorie->getnom();
   
      
		$datas = array(':reff'=>$reff, ':referencee'=>$referencee, ':nomcat'=>$nomcat);
		$req->bindValue(':reff',$reff);
		$req->bindValue(':referencee',$referencee);
		$req->bindValue(':nomcat',$nomcat);

		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recuperercategorie($referencee){
		$sql="SELECT * from categorie where referencee=$referencee";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListecategories($referencee){
		$sql="SELECT * from categorie where referencee=$referencee";
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