<div id ='nav'>

    <div class='bandeau'>
        <div class="logo">
            <a href="index.php?bioRelaisMP=accueil">
                <img src="images/trefle2.png" class="biorelais" />
            </a>
        </div>
        <div class="bienvenue">
            <?php
            if(isset($_SESSION['connecte']) && $_SESSION['connecte'] = true){
                echo "<a href='index.php?bioRelaisMP=panier'><p>Mon Panier</p><p>" . "</p></a>";
            }
            ?>
        </div>
    </div>

        <nav class="menuPrincipal">
            <?php
                echo $menuPrincipal;
	        ?>
        </nav>

</div>
