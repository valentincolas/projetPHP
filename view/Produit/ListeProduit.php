<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des produits</title>
    </head>
    <body>
        <?php
        foreach ($tab_p as $p)
            echo '<a href="../controller/Routeur.php?table=ControllerProduit&action=read&id=' . $p->getId() . '"><img src="'. $p->getLienImage().'" class ="imageproduit" alt="'. $p->getNom() .'" /> </a>';        
        ?>
    </body>
</html>

