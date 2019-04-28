                           <?PHP
$connect = mysqli_connect("localhost", "root", "", "cave");

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM livraison 
  WHERE nom LIKE '%".$search."%'
  OR livreur LIKE '%".$search."%' 
  OR priorite LIKE '%".$search."%' 
  OR ref LIKE '%".$search."%' 
 
 ";
}
else
{
 $query = "
  SELECT * FROM livraison ORDER BY priorite DESC
 ";
}
$result = mysqli_query($connect, $query);


//var_dump($listeEmployes->fetchAll());
?>
						   <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">Reference</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Ville</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Livreur</th>
                                        <th scope="col">Priorite</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$i=0;
								while($row = mysqli_fetch_array($result)){
									$i++;
									$nom=$row['nom'];
									$reference=$row['ref'];
									$prenom=$row['prenom'];
									$mail=$row['mail'];
									$tel=$row['numtel'];
									$ville=$row['ville'];
									$adresse=$row['adresse'];
									$poste=$row['codepostal'];
									$livreur=$row['livreur'];
									$priorite=$row['priorite'];
									echo "
									<tr>
                                        <th scope='row'>
                                            <input type='checkbox' name='choix[]' value='$reference' aria-label='Checkbox'>
                                        </th>
                                        <td class='tm-product-name'><a href='edit-livraison.php?reference=$reference'>$reference</a></td>
                                        <td class='text-center'>$nom</td>
                                        <td>$tel</td>
                                        <td>$ville</td>
                                        <td>$adresse</td>";
										if($livreur == "A definir")
										{
											echo "<td style='color:red;'>$livreur</td>";
										}
										else
										{
											echo "<td>$livreur</td>";
										}
										echo "
                                        <td>$priorite</td>
                                        <td><a href='views/supprimerlivraison.php?reference=$reference'><i class='fas fa-trash-alt tm-trash-icon'></i></a></td>
                                    </tr>
									";
								}
								if($i == 0)
								{
									echo"<p style='color:red;'>aucun resultat pour votre recherche</p>";
								}
								?>
                                </tbody>
                            </table>