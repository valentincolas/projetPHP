<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des produits</title>
    </head>
    <body>
        <?php
        foreach ($tab_u as $u)
            echo '<p> Login: <a href="../controller/Routeur.php?table=ControllerUtilisateur&action=read&id=' . htmlspecialchars($u->getId()) . '">' . htmlspecialchars($u->getLogin()) . '</a></p>';
        ?>
    </body>
</html>

