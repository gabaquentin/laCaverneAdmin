<?php


								$nom="";
								$email="";
								$pass="";
								$tel="";
								$pp="";

                                if(isset($_GET['email']))
                                {
                                    setcookie('email', $_GET['email'], time() + (3600*24), null, null, false, true);
                                    $email = $_GET['email'];

                                    $administrateur1C=new AdministrateurC();
                                    $listeAdmins=$administrateur1C->afficherAdmins();

                                    foreach($listeAdmins as $row){

                                        if($row['email'] == $email)
                                        {
                                            $nom=$row['nom'];
                                            $email=$row['email'];
                                            $pass=$row['motdepasse'];
                                            $tel=$row['telephone'];
                                            if(!isset($row['photop']))
                                            {
                                                $pp="me.png";
                                            }
                                            else
                                            {
                                                $pp=$row['photop'];
                                            }
                                        }
                                    }
                                    setcookie('nom', $nom, time() + 3600, null, null, false, true);
                                    setcookie('pass', $email, time() + 3600, null, null, false, true);
                                    setcookie('tel', $pass, time() + 3600, null, null, false, true);
                                    setcookie('pp', $pp, time() + 3600, null, null, false, true);
                                    //header("location: index.php");
                                }

?>