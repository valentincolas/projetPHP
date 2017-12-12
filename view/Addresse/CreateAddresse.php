<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Formulaire </title>
    </head>
   
    <body>
		<form method="post" action="../controller/Routeur.php?table=ControllerAddresse&action=created">
			<fieldset>
				<legend>Ajouter Produit :</legend>
				<p>
					<label for="addresse_rue">Rue</label> :
					<input type="text" placeholder="Ex : 41 rue du Perchoir" name="rue" id="addresse_rue" required/>
                                        <label for="addresse_ville">Ville</label> :
					<input type="text" placeholder="Ex : Paris" name="ville" id="addresse_ville" required/>
                                        <label for="addresse_codepostal">Code postal</label> :
					<input type="number" placeholder="Ex : 34000" name="codepostal" id="addresse_codepostal" required/>
                                        <label for="addresse_pays">Pays</label> :
                                        <input type="text" placeholder="Ex : France" name="pays" id="addresse_pays" required/>
                                   
                                </p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
    </body>
</html> 