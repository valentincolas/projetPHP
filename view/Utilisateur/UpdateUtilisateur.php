<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Formulaire </title>
    </head>
   
    <body>
		<form method="post" action="../controller/Routeur.php?table=ControllerUtilisateur&action=updated">
			<fieldset>
				<legend>Changer login :</legend>
				<p>
					<label for="login_id">Nouveau login</label> :
					<input type="text" placeholder="Ex : xX_KikooRoxorDu39_Xx" name="login" id="login_id" required/>
                                </p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
                <form method="post" action="../controller/Routeur.php?table=ControllerUtilisateur&action=updated">
			<fieldset>
				<legend>Changer mot de passe :</legend>
				<p>
					<label for="mdpOld_id">Ancien mot de passe</label> :
					<input type="text" placeholder="Ex : 123456" name="mdpOld" id="mdpOld_id" required/>
                                        <label for="mdpNew_id">Nouveau mot de passe</label> :
					<input type="text" placeholder="Ex : 654321" name="mdpNew" id="mdpNew_id" required/>
                                </p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
                <form method="post" action="../controller/Routeur.php?table=ControllerUtilisateur&action=updated">
			<fieldset>
				<legend>Changer nom :</legend>
				<p>
					<label for="nom_id"> Nouveau nom </label> :
					<input type="text" placeholder="Ex : Bob" name="nom" id="nom_id" required/>
                                </p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
                <form method="post" action="../controller/Routeur.php?table=ControllerUtilisateur&action=updated">
			<fieldset>
				<legend>Changer prenom :</legend>
				<p>
					<label for="prenom_id">Nouveau prenom</label> :
					<input type="text" placeholder="Ex : Jean" name="prenom" id="prenom_id" required/>
                                </p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
    </body>
</html> 
