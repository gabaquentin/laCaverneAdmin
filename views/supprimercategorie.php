<?PHP
include "../core/categorieC.php";

$categorieC=new categorieC();
if (isset($_GET["reference"])){
	$categorieC->supprimercategorie($_GET["reference"]);
	header('Location: ../products.php');
}
else
{
	header('Location: ../products.php');
}
?>