<?PHP
include "../core/livreurC.php";

$livreurC=new livreurC();
if (isset($_GET["cin"])){
	$livreurC->supprimerlivreur($_GET["cin"]);
	header('Location: ../livraison.php');
}
else
{
	header('Location: ../livraison.php');
}
?>