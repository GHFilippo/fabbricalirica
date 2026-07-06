<?php
$pageTitle = "Fabbrica Musical | Canto, Danza, Recitazione";
$pageDescription = "Fabbrica Musical: il percorso formativo completo dedicato al musical theatre. Canto, danza e recitazione in un'unica esperienza trasformativa. Prossimamente.";

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/helpers.php';
require __DIR__ . '/includes/navbar.php';
?>
<main>
  <?php
  render_area_hero([
      'numero' => '03',
      'area' => 'Fabbrica Musical',
      'titolo' => 'Il palcoscenico del musical sta per alzarsi.',
      'sottotitolo' => 'Canto · Danza · Recitazione',
      'descrizione' => "Il musical è la forma d'arte più completa: unisce voce, corpo e interpretazione in un unico racconto. Una nuova frontiera di Fabbrica Lirica, presto disponibile.",
      'accent' => '#C9A84C',
      'backHref' => 'index.php',
      'comingSoon' => true,
      'stats' => [
          ['numero' => '3', 'label' => 'Discipline'],
          ['numero' => '2025', 'label' => 'Prossimo lancio'],
          ['numero' => '∞', 'label' => 'Possibilità'],
      ],
  ]);
  ?>
  <?php require __DIR__ . '/sections/fabbrica-musical.php'; ?>
  <?php require __DIR__ . '/sections/contatti.php'; ?>
</main>
<?php
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/scripts.php';
