<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Formulaire </title>
    </head>
   
    <body>
		<form method="post" action="../controller/Routeur.php?table=ControllerContenuCommande&action=created">
			<fieldset>
				<legend>Mon formulaire :</legend>
				<p>
                                         <label for="id_commande">id_commande</label> :
					<input type="text" placeholder="Ex : 2" name="idCommande" id="idCommande_id" required/>
					<label for="id_produit">id_produit</label> :
					<input type="text" placeholder="Ex : 2" name="idProduit" id="idProduit_id" required/>
                                        <label for="quantite">quantite</label> :
					<input type="number" placeholder="Ex : qt" name="quantite" id="quantite_id" required/>
				</p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
    </body>
</html> 


