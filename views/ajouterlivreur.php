<?php  

include "../entities/livreur.php";
include "../core/livreurC.php";


if (isset($_POST['ajouter'])){
$livreur1=new livreur($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['tel'],$_POST['mail']);
$livreur1C=new livreurC();
$livreur1C->ajouterlivreur($livreur1);
header("location: ../livraison.php");

}

 ?> 