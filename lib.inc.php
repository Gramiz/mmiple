<?php
require 'secretxyz123.php';

session_start();

function connexionBD() {
$db = null;
try {
    $db = new PDO('mysql:host=localhost;dbname=mmiple;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE); 
    $db->query('SET NAMES utf8;');
} catch (PDOException $e) {

echo '<p>Erreur : ' . $e->getMessage() . '</p>';

die();
}
return $db;
}


function deconnexionBD(&$db) {
    $db = null;


}

function afficherJeux($db) {

    $requete = "SELECT * FROM mmiple_jeux;";
    $jeux = $db->query($requete);

    foreach ($jeux as $unjeux) {
        echo '<article class="jeux">';
        echo '<h3>' .$unjeux['jeu_nom'] . '</h3>' . '<br>';
        echo '<p>Nombre de joueurs : mini ' . $unjeux['jeu_nb_joueurs_mini'] . ' / maxi ' . $unjeux['jeu_nb_joueurs_maxi'] . '</p><br>';
        echo '<p>Editeur : ' . $unjeux['jeu_editeur'] . '</p><br>';
        echo '<p>Durée de la partie : ' . $unjeux['jeu_duree_partie'] . ' minutes</p><br>';
        echo '</article>';
    }

}




?>