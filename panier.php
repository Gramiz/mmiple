<?php


?>

<!DOCTYPE html>

<html lang="fr">

<?php

require 'debut_html.inc.php';

require 'menu_html.inc.php';

?>

<div id="contenu">

<h1>Votre panier</h1>

<p>Voici les jeux sélectionnés :</p>

<?php var_dump($_SESSION); ?>

<p>


<?php
 $co=connexionBD();
 if (isset($_GET['action'])){
    if ($_GET['action']=='plus'){ 
        $_SESSION['panier'][$_GET['jeu_id']]['quantite']++;
    }
    elseif ($_GET['action']=='moins'){ 
        $_SESSION['panier'][$_GET['jeu_id']]['quantite']--;
    }
}
 echo afficherPanier($co);
 deconnexionBD($co);
 echo '<div id="commande"><span class="fondRouge"><a href="commande.php">Commander</a></span></div>';

?>


</p>

</div>

<?php require 'fin_html.inc.php'; ?>