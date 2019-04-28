<?php  

include "../entities/categorie.php";
include "../core/categorieC.php";


if (isset($_POST['ajouter'])){
$categorie1=new categorie($_POST['reference'],$_POST['nom']);
$categorie1C=new categorieC();
$categorie1C->ajoutercategorie($categorie1);
header("location: ../products.php");

}

 ?> 