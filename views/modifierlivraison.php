<?php
include('../core/livraisonC.php');
include('../entities/livraison.php');
if (isset($_POST['maj'])){
	
		$sql="UPDATE livraison SET livreur=:livreur  WHERE ref=:ref";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$ref=$_GET['reference'];
		
        $livreur=$_POST['livreur'];

		$req->bindValue(':ref',$ref);

		$req->bindValue(':livreur',$livreur);

            $s=$req->execute();
			
        }
        catch (Exception $e){
        }
		
	/*
    $livraison=new livraison($_POST['reference'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['tel'],$_POST['ville'],$_POST['ville'],$_POST['adresse'],$_POST['poste'],$_POST['livreur']);
	$livraisonC=new livraisonC();
    $livraisonC->modifierlivraison($livraison,$_GET['reference']);
	*/
    header('location: ../livraison.php');

}
?>