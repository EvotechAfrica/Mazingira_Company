<?php
// email_config.php

// Configuration du serveur SMTP
define('SMTP_HOST', 'smtp.tonserveur.com'); // Par exemple : smtp.gmail.com ou mail.tondomaine.com
define('SMTP_USER', 'ton-adresse-email@g.com');
define('SMTP_PASS', 'ton-mot-de-passe');
define('SMTP_PORT', 587); // Généralement 587 pour TLS ou 465 pour SSL

// URL de ton site pour les liens dans l'e-mail
define('URL_SITE', 'https://www.tonsite.com'); // Change ceci par l'URL de ton site
?>