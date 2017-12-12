<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des produits</title>
    </head>
    <body>
        <?php
        foreach ($tab_p as $p)
            echo '<p> Produit  <a href="../controller/Routeur.php?table=ControllerProduit&action=read&id=' . $p->getId() . '">' . $p->getNom() . '</a></p>';
        ?>
    </body>
</html>

