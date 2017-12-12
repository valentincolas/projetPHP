<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <title>Liste des adresses</title>
    </head>
    <body>
        <?php
        foreach ($tab_a as $a) {
            echo '<p> Adresse  <a href="../controller/Routeur.php?table=ControllerAddresse&action=read&id=' . $a->getId() . '">' . $a->getId() . '</a></p>';
        }
        ?>
    </body>
