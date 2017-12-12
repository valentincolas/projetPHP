<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Details Adresse</title>
    </head>
    <body>
        <?php
        echo '<ul>';
	echo '<li> rue : ' . htmlspecialchars($a->getRue()) . "\n </li>";
	echo '<li> ville : ' . htmlspecialchars($a->getVille()) . "\n </li>";
	echo '<li> code postal : ' . htmlspecialchars($a->getCodePostal()) . "\n </li>";
        echo '<li> pays : ' . htmlspecialchars($a->getPays()) . "\n </li>";
        echo '</ul>';   
        echo '<a href="../controller/Routeur.php?table=ControllerAddresse&action=deleted&id=' . $a->getId() . '">delete</a>' ;
       
	echo '<br>';
        ?>
    </body>
</html>

