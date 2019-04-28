                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12 text-center">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon text-center"></i>
                            <h2 class="tm-block-title mt-3">Connexion</h2>
                        </div>
						<div class="col-12 text-center">
						<?php if(isset($_GET['connect'])){ if($_GET['connect'] == "reconnexion"){ echo "Email ou mot de passe incorrect !! Reesayez";} } ?>
						</div>
                    </div>
					</br>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form action="views/verifInfoAdmin.php" method="post" class="tm-login-form">
                                <div class="input-group">
                                    <label for="email" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Adresse Email</label>
                                    <input name="email" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" id="email" required>
                                </div>
                                <div class="input-group mt-3">
                                    <label for="pass" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mot de passe</label>
                                    <input name="pass" type="password" class="form-control validate" id="pass" required>
                                </div>
                                <div class="input-group mt-3">
                                    <button type="submit" class="btn btn-primary d-inline-block mx-auto">Confirmer</button>
                                </div>
                                <div class="input-group mt-3">
                                    <p><em>Pas de compte ? <a href="login.php?connect=inscription">s'inscrire</a></em></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>