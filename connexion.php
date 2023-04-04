<?php require 'debut_html.inc.php'; ?>

<?php require 'menu_html.inc.php'; ?>

<div id="contenu">
    <h1>Bienvenue chez MMiple</h1>
    <p>MMiple prononcez [èm-èm-i-peul]* est un site de vente de jeux de société. Vous trouverez sur ce site de nombreux jeux pour passer des soirées sympas en famille ou entre ami.e.s.</p>
    <p class="centre"><img src="img/meeples2.png" alt="Deux meeples." /></p>
    <div class="remarque">* Un "meeple" (prononcez [mii-peul]) est un petit personnage en bois peint utilisé dans de nombreux jeux de société.</div>
</div>


<!DOCTYPE html>
<html lang="fr">
<?php
//require 'head.inc.php';
?>

<body>
    <?php // require 'header.inc.php'; ?>
    <div id="contenu">
        <h1>Connexion</h1>
        <form action="connexion_verif.php" method="post">
            Adresse e-mail : <input type="text" name="email" /><br /> Mot de passe : <input type="password" name="mdp" /><br /> <input type="submit" value="Envoyer">
        </form>
        <?php
if (!empty($_SESSION['erreur'])) {
echo $_SESSION['erreur'];
unset ($_SESSION['erreur']);
}
//var_dump($_SESSION);
?>
    </div>
</body>

</html>


<?php require 'fin_html.inc.php'; ?>