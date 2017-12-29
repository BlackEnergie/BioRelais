<div id="conteneur">

    <div id='header'>
        <?php include 'haut.php' ;?>
    </div>

    <div id="content">
        <div class="contentModifier">
            <div class="modifier">
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