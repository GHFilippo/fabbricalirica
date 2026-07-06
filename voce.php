<?php
$pageTitle = "Fabbrica della Voce | Doppiaggio, Podcast, Audiolibri, Public Speaking";
$pageDescription = "Corsi professionali di doppiaggio, voice over, podcast, audiolibri e public speaking. Con maestri del doppiaggio RAI e vocal coach del Piccolo Teatro di Milano.";

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/helpers.php';
require __DIR__ . '/includes/navbar.php';
?>
<main>
  <?php
  render_area_hero([
      'numero' => '01',
      'area' => 'Fabbrica della Voce',
      'titolo' => 'La voce è il tuo strumento più potente.',
      'sottotitolo' => 'Doppiaggio · Podcast · Audiolibri · Public Speaking',
      'descrizione' => 'Entra nel mondo della voce professionale. Con maestri del doppiaggio RAI, speaker pubblicitari dei migliori brand e vocal coach formatisi al Piccolo Teatro di Milano.',
      'accent' => '#C41E3A',
      'backHref' => 'index.php',
      'stats' => [
          ['numero' => '4', 'label' => 'Percorsi'],
          ['numero' => '15+', 'label' => 'Docenti'],
          ['numero' => '300+', 'label' => 'Alumni'],
      ],
  ]);
  ?>
  <?php require __DIR__ . '/sections/fabbrica-voce.php'; ?>
  <?php require __DIR__ . '/sections/contatti.php'; ?>
</main>
<?php
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/scripts.php';
