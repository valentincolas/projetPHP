<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="utf-8">
    <title><?php echo $pagetitle; ?></title>
</head>

<body>

    <header>
	<a href="index.html"><img src="../images/banniere.png" class="banniere"></a>
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
            <div><span class="puce">→</span><a href="./produit.html">Produit</a></div>
            <div><span class="puce">→</span><a href="./contact.html">Contact</a></div>
            <div><span class="puce">→</span><a href="./equipe.html">Equipe</a></div>
            <div><span class="puce">→</span><a href="./presse.html">Presse</a></div>
            <div><span class="puce">→</span><a href="./nousrejoindre.html">Nous rejoindre</a>
                <div  class="submenu">
                    <div><span class="puce">→</span><a href="./physicien.html">Physicien</a></div>
                    <div><span class="puce">→</span><a href="./mathematicien.html">Mathématicien</a></div>
                    <div><span class="puce">→</span><a href="./designer.html">Designer</a></div>
                </div>
            </div>
            <div><span class="puce">→</span><a href="./controller/Routeur.php?table=ControllerUtilisateur&action=create">Connexion/S'inscrire</a></div>
 
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

