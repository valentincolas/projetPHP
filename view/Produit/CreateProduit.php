<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Formulaire </title>
    </head>
   
    <body>
		<form method="post" action="../controller/Routeur.php?table=ControllerProduit&action=created">
			<fieldset>
				<legend>Ajouter Produit :</legend>
				<p>
					<label for="produit_nom">Nom</label> :
					<input type="text" placeholder="Ex : Peluche Pikachu" name="nom" id="produit_nom" required/>
                                        <label for="produit_prix">Prix</label> :
					<input type="number" placeholder="Ex : 55" name="prix" id="produit_prix" required/>
                                        <label for="produit_stock">Stock</label> :
					<input type="number" placeholder="Ex : 25" name="stock" id="produit_stock" required/>
                                        <label for="produit_lien">Lien image</label> :
                                        <input type="text" placeholder="Ex : .../poney.jpg" name="lien" id="produit_lien" required/>
                                        <label for="produit_description">Description</label> :
					<input type="text" placeholder="Ex : Belle peluche douce" name="description" id="produit_description" required/>
                                </p>
				<p>
					<input type="submit" value="Envoyer" />
				</p>
			</fieldset> 
		</form>
    </body>
</html> 


