<?php require 'debut_html.inc.php'; ?>

<?php require 'menu_html.inc.php'; ?>

<div id="contenu">
    <h1>Découvrez les jeux MMiple</h1>
    <?php


    $co = connexionBD();

    afficherJeux($co);

    deconnexionBD($co);


    ?>
</div>

<?php require 'fin_html.inc.php'; ?>