<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Formulaire </title>
    </head>
   
    <body>
		<form method="post" action="../controller/Routeur.php?table=ControllerUtilisateur&action=created">
			<fieldset>
				<legend>Mon formulaire :</legend>
				<p>
					<label for="login_id">Login</label> :
					<input type="text" placeholder="Ex : xX_KikooRoxorDu39_Xx" name="login" id="login_id" required/>
                                        <label for="mdp_id">Mot de passe</label> :
                                        <input type="password" placeholder="Ex : 123456" name="mdp" id="mdp_id" required/>
                                        <label for="mail_id">E-mail</label> :
                                        <input type="email" placeholder="Ex : JeanBob@youpi.fr" name="email" id="mail_id" required/>
					<label for="nom_id">Nom</label> :
					<input type="text" placeholder="Ex : Bob" name="nom" id="nom_id" required/>
					<label for="prenom_id">Prenom</label> :
					<input type="text" placeholder="Ex : Jean" name="prenom" id="prenom_id" required/>
				</p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
    </body>
</html> 
