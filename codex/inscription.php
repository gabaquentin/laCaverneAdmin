                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12 text-center">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon text-center"></i>
                            <h2 class="tm-block-title mt-3">Inscription</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form action="views/ajoutAdmin.php" method="post" class="tm-login-form" id="inscription">
                                <div class="form-group">
                                    <label for="nom">Nom (complet)</label>
                                    <input id="nom" name="nom" type="text" class="form-control validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="email" class="form-control validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Mot de passe</label>
                                    <input id="pass" name="pass" type="password" class="form-control validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="pass2">Re-entrer le mot de passe</label>
                                    <input id="pass2" name="pass2" type="password" class="form-control validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="tel">Telephone</label>
                                    <input id="tel" name="tel" type="tel" class="form-control validate" required>
                                </div>
                                <div class="input-group mt-3">
                                    <button type="submit" class="btn btn-primary d-inline-block mx-auto">Confirmer</button>
                                </div>
                                <div class="input-group mt-3">
                                    <p><em><p><em>Deja un compte ? <a href="login.php">se connecter</a></em></p></em></p>
									</div>
									<div class="input-group mt-3">
									</br>
									</br>
									<p class="txt1 p-b-11" id="erreur" style="color:red;"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				