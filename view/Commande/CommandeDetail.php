<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detail Commande</title>
    </head>
    <body>
        <?php
        echo "<ul>";
		echo "<li> id_utilisateur: " . $u->getLogin() . "\n </li>";
		echo "<li> id_adresse: " . $u->getNom() . "\n </li>";
        echo "</ul>";
		echo "<br>";
        ?>
    </body>
</html>

