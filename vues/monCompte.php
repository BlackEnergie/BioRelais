<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <div class="mon_compte">
            <h1>Mes informations</h1>
            <?php
                echo afficherInformationsAdherent($_SESSION['user']);
            ?>
            <input type="submit" onclick='confirmationDeconnexion();' value="Déconnexion" class="deconnexion"/>
            <br>
            <a href="index.php?bioRelaisMP=modifierAdherent" class="lien"><input type="submit" value="Modifier mes informations"></a>
        </div>

        <div class="bas">
            <?php  include 'bas.php' ;?>
        </div>

    </div>
</div>
</div>