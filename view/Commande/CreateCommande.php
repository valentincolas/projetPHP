<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Formulaire </title>
    </head>
   
    <body>
		<form method="post" action="../controller/Routeur.php?table=ControllerCommande&action=created">
			<fieldset>
				<legend>Mon formulaire :</legend>
				<p>
					<label for="login_id">id_utilisateur</label> :
					<input type="text" placeholder="Ex :2" name="util" id="id_utilisateur_id" required/>
                    <label for="mdp_id">id_adresse</label> :
					<input type="text" placeholder="Ex : adr" name="adr" id="adr_id" required/>
				</p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
    </body>
</html> 
