<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste du contenu des commandes</title>
    </head>
    <body>
        
        <?php
        foreach ($tab_c as $c)
            echo "<p> Contenu des commandes :  Commande : " . $c->getIdCommande() . " Produit :  " . $c->getIdProduit() . " Quantite :  " . $c->getQuantite() . "</p>";
        ?>
    </body>
</html>
