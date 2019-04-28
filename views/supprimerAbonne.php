<?PHP
include "../config.php";
include "../core/AbonneC.php";

$abonneC=new AbonneC();
if (isset($_POST["email"])){
	$abonneC->supprimerAbonne($_POST["email"]);
	header('Location: ../accounts.php?compte=client');
}
else
{
	header('Location: ../accounts.php?compte=client');
}
?>