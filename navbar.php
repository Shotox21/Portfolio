<a href="#" class="brand-logo-bar teko shutdown-easter-egg" id="left_header_txt" rel="nofollow"><img src="img/favicon/favicon.png" alt=""></a>
<div>
    <a href="index.php" class="btn white black-text z-depth-2" rel="nofollow">Accueil</a>
    <a href="#prj_cards" class="btn white black-text btn-header dropdown-trigger" rel="nofollow" data-target="dropdown1">Projets</a>
    <a href="game.php" class="btn white black-text z-depth-2" rel="nofollow">Jeux</a>
    <a href="index.php#me" class="btn white black-text z-depth-2" rel="nofollow">Moi</a>
    <a href="modal.php#contact-me" id="cnct_btn" rel="nofollow">Contact</a>
    <?php if(!empty($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
        <a href="panel/admin/admin.php" class="btn white black-text z-depth-2" rel="nofollow">Admin</a>
    <?php } ?>
    <?php if(!empty($_SESSION['username'])) { ?>
        <a href="panel/user/logout.php" id="deco" rel="nofollow"></a>
    <?php } else { ?>
        <a href="panel/user/login.php" id="co" rel="nofollow"></a>
    <?php } ?>
</div>

