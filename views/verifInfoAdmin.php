<?PHP
include "../entities/administrateur.php";
include "../core/administrateurC.php";


if (isset($_POST['email']) and isset($_POST['pass'] )){
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$administrateur1C=new administrateurC();
$listeAdmins=$administrateur1C->afficherAdmins();
$mail=0;
                           foreach($listeAdmins as $row){
							   
							if($row['email'] == $_POST['email'] && $row['motdepasse'] == $_POST['pass'])
							{
								
								$mail=1;
							}
						   }
						 
						   if($mail == 1)
						   {
							 $mail=$_POST['email'];
                             header("location: ../index.php?email=$mail");
						   }
						   else if ($mail == 0)
						   {
							   header('Location:../login.php?connect=reconnexion');
						   }

}
//*/

?>