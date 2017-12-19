<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detail utilisateur</title>
    </head>
    <body>
        <?php
        echo "<ul>";
	echo "<li> login: " . htmlspecialchars($u->getLogin()) . "\n </li>";
	echo "<li> nom: " . htmlspecialchars($u->getNom()) . "\n </li>";
	echo "<li> prenom: " . htmlspecialchars($u->getPrenom()) . "\n </li>";
        if($u->getAdmin() == 1){
            echo "<li> Admininistrateur \n </li>";
        }
        echo "</ul>";
        
        if($_SESSION['login'] == $u->getLogin()){
            echo "<br>";
            echo "<a href=\"../controller/Routeur.php?table=ControllerUtilisateur&action=deconnect\"> <button type=\"button\">Deconnexion</button></a>";
            echo "<a href=\"../controller/Routeur.php?table=ControllerUtilisateur&action=update\"> <button type=\"button\">Modifier</button></a>";
            if ($_SESSION['admin'] == 1){
                echo "<br>";
                echo "<br>";
                echo "Commande admin:";
                echo "<br>";
                echo "<a href=\"../controller/Routeur.php?table=ControllerCommande&action=readAll\"> <button type=\"button\">Liste commande</button></a>";
                echo "<a href=\"../controller/Routeur.php?table=ControllerUtilisateur&action=readAll\"> <button type=\"button\">Liste utilisateur</button></a>";
                echo "<a href=\"../controller/Routeur.php?table=ControllerProduit&action=create\"> <button type=\"button\">Ajouter produit</button></a>";
            }  
        } else {
            if ($_SESSION['admin'] == 1){
                echo "<br>";
                echo "<br>";
                echo "Commande admin:";
                echo "<br>";
                echo "<a href=\"../controller/Routeur.php?table=ControllerUtilisateur&action=delete&id=". $u->getId() . "\"> <button type=\"button\">Supprimer</button></a>";
                echo "<a href=\"../controller/Routeur.php?table=ControllerUtilisateur&action=admin&id=". $u->getId() . "\"> <button type=\"button\">Passer administrateur</button></a>";
            }
        }

        ?>
        
        
    </body>
</html>

