<?php
include('../core/livreurC.php');
include('../entities/livreur.php');
if (isset($_POST['maj'])){
    $livreur=new livreur($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['tel'],$_POST['mail']);
	$livreurC=new livreurC();
    $livreurC->modifierlivreur($livreur,$_GET['cin']);
	
		$sql="UPDATE livraison SET livreur=:livreur WHERE livreur=:nomliv";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
        $liv=$_POST['nom'];
        $nomliv=$_GET['nom'];
		
		$req->bindValue(':livreur',$liv);
		$req->bindValue(':nomliv',$nomliv);

            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
        }
		
    header('location: ../livraison.php');

}
?>