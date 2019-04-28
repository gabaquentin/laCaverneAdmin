<?php  
/*
include "../entities/produit.php";
include "../core/produitC.php";


if (isset($_POST['ajouter'])){
//$file = file_get_contents($_FILES["image"]["tmp_name"]);
$produit1=new produit($_POST['reference'],$_POST['nom'],$_POST['categorie'],$_POST['prix'],$_POST['description'],$_POST['image']);
$produit1C=new produitC();
$produit1C->ajouterproduit($produit1);
header("location: ../products.php");

}
*/
 ?> 
 

<?php 
include "../entities/produit.php";

 $connect = mysqli_connect("localhost", "root", "", "cave");  
 if(isset($_POST["ajouter"]))  
 {  
      //$file = $_POST['image'];
	  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	  $reference = mysqli_real_escape_string($connect, $_POST['reference']);
	  $nom = mysqli_real_escape_string($connect, $_POST['nom']);
	  $categorie = mysqli_real_escape_string($connect, $_POST['categorie']);
	  $prix = mysqli_real_escape_string($connect, $_POST['prix']);
	  $description = mysqli_real_escape_string($connect, $_POST['description']);


 $query = "INSERT INTO produit(reference,nom,categorie,prix,description,image) values ('$reference','$nom','$categorie','$prix','$description','$file')"; 
mysqli_query($connect, $query); 
 header('location: ../products.php');
 } 

 ?> 
