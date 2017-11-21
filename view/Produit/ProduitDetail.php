<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Details Produit</title>
    </head>
    <body>
        <?php
        echo  "<img src=\"" . $p->getLienImage() . "\" alt=\"\" />\n ";
        echo "<ul>";
	echo "<li> nom: " . $p->getNom() . "\n </li>";
	echo "<li> prix: " . $p->getPrix() . "\n </li>";
	echo "<li> stock: " . $p->getStock() . "\n </li>";
        echo "<li> description: " . $p->getDescription() . "\n </li>";
        echo "</ul>";
        echo '<a href="http://webinfo.iutmontp.univ-montp2.fr/~colasv/PhpProject2/controller/Routeur.php?table=ControllerProduit&action=deleted&id=' . $p->getId() . '">delete</a>' ;
       
	echo "<br>";
        ?>
    </body>
</html>

<img src="images/licorne.png" alt="" />