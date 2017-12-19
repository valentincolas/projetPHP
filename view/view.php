<!DOCTYPE html>
<?php 
if(!isset($_SESSION)){
    session_start();
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="utf-8">
    <title><?php echo $pagetitle; ?></title>
</head>

<body>

    <header>
	<a href="../controller/Routeur.php?"><img src="../images/banniere.png" class="banniere"></a>
    
    
    <nav class="nav">
            <div><span class="puce">→</span><a href="../controller/Routeur.php?table=ControllerProduit&action=readAll">Produit</a></div>
            <div><span class="puce">→</span><a href="../routeur?table=ControllerPanier&action=read">Panier</a></div>
            <?php
                if(isset($_SESSION['login'])){
                    $u_logined = ModelUtilisateur::getUtilisateurByLogin($_SESSION['login']);
                    echo "<div><span class=\"puce\">→</span><a href=\"../controller/Routeur.php?table=ControllerUtilisateur&action=read&id=". $u_logined->getId() ."\">" . $_SESSION['login'] . "</a></div>";
                }else {
                    echo "<div><span class=\"puce\">→</span><a href=\"../controller/Routeur.php?table=ControllerUtilisateur&action=create\">Connexion/S'inscrire</a></div>";
                }
                
            ?>
        </nav>
    </header>
    <main>
        
           <?php
                $filepath = File::build_path(array("view", $controller, "$view.php"));
                require $filepath;
            ?>

    </main>


    <footer>
        <a href="#"> <img  src="../images/hautpage.gif" class="hautpage"></a>
    </footer>
        

</body>
</html>

