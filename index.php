<?php
$pageTitle = "Fabbrica Lirica | Polo Trasversale di Creatività";
$pageDescription = "Fabbrica Lirica — scuola d'arte per la voce, il teatro e la comunicazione. Corsi di doppiaggio, podcast, audiolibri, public speaking, musical e teatro.";
$includeTeaser = true;

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/navbar.php';
?>
<main>
  <?php require __DIR__ . '/sections/hero.php'; ?>
  <?php require __DIR__ . '/sections/marquee.php'; ?>
  <?php require __DIR__ . '/sections/hub.php'; ?>
  <?php require __DIR__ . '/sections/chisiamo.php'; ?>
  <?php require __DIR__ . '/sections/newsletter.php'; ?>
  <?php require __DIR__ . '/sections/contatti.php'; ?>
</main>
<?php
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/scripts.php';
