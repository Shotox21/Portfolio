<link rel="stylesheet" href="css/style.css">
<div id="contact_pge">
    <h1 class="card-title center">CONTACT</h1>
    <form method="POST" action="contact.php">
        <input type="text" name='username' placeholder="nom prenom" id="username">
        <input placeholder="email" type="email" name='email' id="email">
        <textarea id="subject" class="materialize-textarea" name="message" placeholder="message"></textarea>
        <input class="btn brown" type="submit" id="submit" name="action" value="envoyer">
    </form>
</div>
