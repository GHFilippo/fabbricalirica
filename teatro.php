<?php
$pageTitle = "Fabbrica Teatro | Compagnia Teatro Senza Età, Acting Coaching";
$pageDescription = "La Compagnia Teatro Senza Età porta in scena spettacoli originali. Acting coaching professionale con Nicoletta Maragno, actor-coach alla Mostra del Cinema di Venezia.";

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/helpers.php';
require __DIR__ . '/includes/navbar.php';
?>
<main>
  <?php
  render_area_hero([
      'numero' => '02',
      'area' => 'Fabbrica Teatro',
      'titolo' => 'Il teatro è il luogo dove la verità si svela.',
      'sottotitolo' => 'Compagnia · Spettacoli · Acting Coaching',
      'descrizione' => 'La Compagnia Teatro Senza Età porta in scena spettacoli di forte impatto emotivo. Coaching professionale con Nicoletta Maragno, formatasi al Piccolo Teatro di Milano con G. Strehler.',
      'accent' => '#8B2FC9',
      'backHref' => 'index.php',
      'stats' => [
          ['numero' => '2', 'label' => 'Spettacoli in repertorio'],
          ['numero' => '∞', 'label' => 'Nessun limite di età'],
          ['numero' => '20+', 'label' => 'Anni di esperienza'],
      ],
  ]);
  ?>
  <?php require __DIR__ . '/sections/fabbrica-teatro.php'; ?>
  <?php require __DIR__ . '/sections/contatti.php'; ?>
</main>
<?php
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/scripts.php';
