<?php
	        include_once "../config.php";
		include "../core/AbonneC.php";
		$abonne1C=new AbonneC();
		$listeAbonnes1=$abonne1C->afficherAbonnes();

?>
                    

		             <?PHP
					 /*
                     if(isset($_GET['data']))
                     {
                         foreach($listeAbonnes as $row){
                             
                             if($row['email'] == $_GET['data'])
                             {
                                 $nom=$row['nom'];
                                 $prenom=$row['prenom'];
                                 $datenaiss=$row['datenaiss'];
                                 $email=$row['email'];
                                 $adresse=$row['adresse'];
                                 $pass=$row['motdepasse'];
                                 $tel=$row['telephone'];
                                 
                                 header('location : accounts.php?compte=client&amp;nom=$nom&amp;prenom=$prenom&amp;datenaiss=$datenaiss&amp;email=$email&amp;adresse=$adresse&amp;pass=$pass&amp;tel=$tel');
                             }


                         }
                     }
                     else
                     {*/
				 $j=0;
                         foreach($listeAbonnes1 as $row){
                             $j++;
                             echo "   <li class='tm-list-group-item' >";
                             
                             $nom=$row['nom'];
                             $prenom=$row['prenom'];
                             $datenaiss=$row['datenaiss'];
                             $email=$row['email'];
                             $adresse=$row['adresse'];
                             $pass=$row['motdepasse'];
                             $tel=$row['telephone'];
							 $ptpa=$row['ptpa'];
							 $ntpa=$row['ntpa'];							 
						     $p=($ntpa/50)*100;
                             $pr=($ptpa/200)*100;
                             $fid=($p+$pr)/2;
                             
                             if($row['etat_fid'] == 1)
                             {
                                 echo "<a href='accounts.php?compte=client&amp;nom=$nom&amp;prenom=$prenom&amp;datenaiss=$datenaiss&amp;email=$email&amp;adresse=$adresse&amp;pass=$pass&amp;tel=$tel&amp;fid=$fid' style='color:gold;'>$email</a>"; 
                             }
                             else
                             {
                                 echo "<a href='accounts.php?compte=client&amp;nom=$nom&amp;prenom=$prenom&amp;datenaiss=$datenaiss&amp;email=$email&amp;adresse=$adresse&amp;pass=$pass&amp;tel=$tel&amp;fid=$fid' style='color:green;'>$email</a>"; 
                             }

                         }
								if($j == 0)
								{
									echo"<p style='color:red;'>aucun resultat pour votre recherche</p>";
								}
                     //}
                    ?>
                            
                    