<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detail utilisateur</title>
    </head>
    <body>
        <?php
        echo "<ul>";
	echo "<li> login: " . $u->getLogin() . "\n </li>";
	echo "<li> nom: " . $u->getNom() . "\n </li>";
	echo "<li> prenom: " . $u->getPrenom() . "\n </li>";
        echo "</ul>";
	echo "<br>";
        ?>
    </body>
</html>

