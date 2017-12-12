<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detail Contenu Commande</title>
    </head>
    <body>
        <?php
        echo "<ul>";
                echo "<li> id_Commande: " . htmlspecialchars($u->getIdCommande()) . "\n </li>";
		echo "<li> id_Produit: " . htmlspecialchars($u->getIdProduit()) . "\n </li>";
		echo "<li> quantite: " . htmlspecialchars($u->getQuantite()) . "\n </li>";
                echo "</ul>";
		echo "<br>";
        ?>
    </body>
</html>

