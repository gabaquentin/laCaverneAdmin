<?PHP
include "../core/produitC.php";

$produitC=new produitC();
if (isset($_GET["reference"])){
	$produitC->supprimerproduit($_GET["reference"]);
	header('Location: ../products.php');
}
else if(isset($_POST['choix']))
{
	for ($j=0;$j<count($_POST['choix']);$j++){
		$choix = $_POST['choix'][$j];
		$produitC->supprimerproduit($choix);
	}
	header('Location: ../products.php');
}
else
{
	header('Location: ../products.php');
}
?>