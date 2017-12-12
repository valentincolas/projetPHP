<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detail Commande</title>
    </head>
    <body>
        <?php
                echo "<ul>";
		echo "<li> id_utilisateur: " .htmlspecialchars( $u->getIdUtilisateur()) . "\n </li>";
		echo "<li> id_adresse: " . htmlspecialchars($u->getIdAdresse()) . "\n </li>";
                echo "</ul>";
		echo "<br>";
        ?>
    </body>
</html>

