<?php
require_once __DIR__ . '/config.php';

// Valori di default (sovrascrivibili impostando le variabili prima di questo include)
if (!isset($pageTitle)) {
    $pageTitle = "Fabbrica Lirica | Polo Trasversale di Creatività";
}
if (!isset($pageDescription)) {
    $pageDescription = "Fabbrica Lirica — scuola d'arte per la voce, il teatro e la comunicazione. Corsi di doppiaggio, podcast, audiolibri, public speaking, musical e teatro.";
}
if (!isset($bodyClass)) {
    $bodyClass = '';
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
<meta name="keywords" content="doppiaggio, voice over, podcast, audiolibri, public speaking, musical, teatro, recitazione, Nicoletta Maragno, Fabbrica Lirica, Venezia">

<meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
<meta property="og:type" content="website">
<meta property="og:locale" content="it_IT">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body class="<?= htmlspecialchars($bodyClass) ?>">
