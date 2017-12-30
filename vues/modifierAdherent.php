<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <div class="contentModifier">
            <div class="modifier">
                <h1>Modifier mes informations</h1>
                <?php
                    $formulaireModifierCompte->afficherFormulaire();
                ?>
                <a href="index.php?bioRelaisMP=monCompte" class="lien"><input type="submit" value="Annuler"></a>
            </div>
        </div>
        <div class="bas">
            <?php  include 'bas.php' ;?>
        </div>

    </div>
</div>
</div>