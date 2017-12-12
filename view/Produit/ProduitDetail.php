<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Details Produit</title>
    </head>
    <body>
        <?php
        echo  "<img src=\"" . htmlspecialchars($p->getLienImage()) . "\" alt=\"\" />\n ";
        echo "<ul>";
	echo "<li> nom: " . htmlspecialchars($p->getNom()) . "\n </li>";
	echo "<li> prix: " . htmlspecialchars($p->getPrix()) . "\n </li>";
	echo "<li> stock: " . htmlspecialchars($p->getStock()) . "\n </li>";
        echo "<li> description: " . htmlspecialchars($p->getDescription()) . "\n </li>";
        echo "</ul>";
        echo '<a href="../controller/Routeur.php?table=ControllerProduit&action=deleted&id=' . $p->getId() . '">delete</a>' ;
       
	echo "<br>";
        ?>
    </body>
</html>

