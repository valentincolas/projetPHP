<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Formulaire </title>
    </head>
   
    <body>
		<form method="post" action="../controller/Routeur.php?table=ControllerUtilisateur&action=logined">
			<fieldset>
				<legend>Mon formulaire :</legend>
				<p>
					<label for="login_id">Login</label> :
					<input type="text" placeholder="Ex : xX_KikooRoxorDu39_Xx" name="login" id="login_id" required/>
                                        <label for="mdp_id">Mot de passe</label> :
                                        <input type="password" placeholder="Ex : 123456" name="mdp" id="mdp_id" required/>
				</p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
    </body>
</html> 
