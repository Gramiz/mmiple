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
        echo '<img src="images/' . $unjeux['jeu_photo1'] . '" alt="image du jeu" width="200" height="200"><br>';
        echo '<p>Editeur : ' . $unjeux['jeu_editeur'] . '</p><br>';
        echo '<p>Durée de la partie : ' . $unjeux['jeu_duree_partie'] . ' minutes</p><br>';
        echo '<div><a href="ajout_panier.php?jeu_id=' . $unjeux['jeu_code'] . '">Ajouter au panier</a></div>';
        echo '</article>';
    }

}


// fonction qui récupère les informations sur un jeu
// et les retourne ou bien retourne null si le jeu n'existe pas
function recuperer_jeu($co, $id) {

    $req="SELECT * FROM mmiple_jeux WHERE jeu_code=".$id; // créer la requête //echo '<p>'.$req.'</p>'."\n";
    
    try {
    
    $resultat=$co->query($req); // exécuter la requête
    
    } catch (PDOException $e) {
    
    print "Erreur : ".$e->getMessage().'<br />'; die();
    
    }
    
    // compter le nombre de résultats
    
    $lignes_resultat=$resultat->rowCount();
    
    if ($lignes_resultat>0) { // y a-t-il des résultats ?
    
    // oui : pour chaque résultat : afficher
    
    return $resultat->fetch(PDO::FETCH_ASSOC);
    
    } else {
    
    // non, on renvoie la valeur "null"
    
    return null;
    
    }
    
    }

    function panier_total_jeux() {
        if (!empty($_SESSION['panier'])) {
            $total=0;
            foreach ($_SESSION['panier'] as $id => $jeu) {
              $total += $jeu['quantite'];
            }
            if ($total>9) {
              $total='9+';
            }
            return $total;
        } else { 
            return 0;
      }
    }

?>