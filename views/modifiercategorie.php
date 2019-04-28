<?php
include('../core/categorieC.php');
include('../entities/categorie.php');
if (isset($_POST['maj'])){
    $categorie=new categorie($_POST['reference'],$_POST['nom']);
	$categorieC=new categorieC();
    $categorieC->modifiercategorie($categorie,$_GET['reference']);
	
		$sql="UPDATE produit SET categorie=:categorie WHERE categorie=:nomcat";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
        $cat=$_POST['nom'];
        $nomcat=$_GET['nom'];
		
		$req->bindValue(':categorie',$cat);
		$req->bindValue(':nomcat',$nomcat);

            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
        }
		
    header('location: ../products.php');

}
?>