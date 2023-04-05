<?php
require 'lib.inc.php';
$email = $_POST['email'];
$mdp = $_POST['mdp'];
$db = connexionBD();
$req = 'SELECT * FROM mmiple_clients WHERE client_email LIKE "' . $email . '"';
//echo '<p>'.$req.'</p>';
// on lance la requête
$resultat = $db->query($req);
// on calcule le nombre de lignes renvoyées
$lignes_resultat = $resultat->rowCount();
if ($lignes_resultat > 0) { // y a-t-il des résultats ?
    // oui : pour chaque résultat : afficher
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    if (password_verify($mdp, $ligne['client_mdp'])) {
        $_SESSION['prenom_client'] = $ligne['client_prenom'];
        $_SESSION['numero_client'] = $ligne['client_code'];
        header('Location:jeux.php');
    } else {
        $_SESSION['erreur'] = '<h1 class="erreur">Le mot de passe saisi est incorrect.</h1>';
        header('Location:connexion.php');
    }
}else{
    $_SESSION['erreur'] = '<h1 class="erreur">Désolé, le login saisi n\'existe pas !</h1>';
    header('Location:connexion.php');
}
deconnexionBD($db);
