<?php
include('../core/produitC.php');
include('../entities/produit.php');
if (isset($_POST['maj'])){
    $produit=new produit($_POST['reference'],$_POST['nom'],$_POST['categorie'],$_POST['prix'],$_POST['description']);
	$produitC=new produitC();
    $produitC->modifierproduit($produit,$_GET['reference']);
    header('location: ../products.php');

}
?>