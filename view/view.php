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
	<a href="../index.html"><img src="../images/banniere.png" class="banniere"></a>
    <div class="burger">
        <img src="../images/burger.png" alt="burger" width="50px">
        <div id="menu2">
            <div><a href="./produit.html">Produit</a></div>
            <div><a href="./contact.html">Contact</a></div>
            <div><a href="./equipe.html">Equipe</a></div>
            <div><a href="./presse.html">Presse</a></div>
            <div><a href="./nousrejoindre.html">Nous rejoindre</a></div>
            <div><a href="./faq.html">FAQ</a></div>
        </div>
    </div>
    
    
    <nav class="nav">
            <div><span class="puce">→</span><a href="../controller/Routeur.php?table=ControllerProduit&action=readAll">Produit</a></div>
            <div><span class="puce">→</span><a href="./contact.html">Contact</a></div>
            <div><span class="puce">→</span><a href="./equipe.html">Equipe</a></div>
            <div><span class="puce">→</span><a href="./presse.html">Presse</a></div>
            <div><span class="puce">→</span><a href="./nousrejoindre.html">Panier</a></div>
            <?php
                if(isset($_SESSION['login'])){
                    $u = ModelUtilisateur::getUtilisateurByLogin($_SESSION['login']);
                    echo "<div><span class=\"puce\">→</span><a href=\"../controller/Routeur.php?table=ControllerUtilisateur&action=read&id=". $u->getId() ."\">" . $_SESSION['login'] . "</a></div>";
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

