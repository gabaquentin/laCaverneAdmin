<?PHP
include "../core/livraisonC.php";

$livraisonC=new livraisonC();
if (isset($_GET["reference"])){
	$livraisonC->supprimerlivraison($_GET["reference"]);
	header('Location: ../livraison.php');
}
else if(isset($_POST['choix']))
{
	for ($j=0;$j<count($_POST['choix']);$j++){
		$choix = $_POST['choix'][$j];
		$livraisonC->supprimerlivraison($choix);
	}
	header('Location: ../livraison.php');
}
else
{
	header('Location: ../livraison.php');
}
?>