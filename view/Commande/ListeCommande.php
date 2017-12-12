<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des commandes</title>
    </head>
    <body>
        
        <?php
        foreach ($tab_c as $c)
            echo '<p> Commande <a href="../controller/Routeur.php?table=ControllerCommande&action=read&id= ' . $c->getId() . ' "> ' . $c->getId() . ' </a></p>';
        ?>
    </body>
</html>
