<?php
$fabbriche = [
    [
        'id' => 'voce', 'numero' => '01', 'nome' => 'Fabbrica della Voce',
        'tag' => 'DOPPIAGGIO · PODCAST · AUDIOLIBRI · PUBLIC SPEAKING',
        'descrizione' => "La voce è il tuo strumento più potente. Corsi professionali con maestri del doppiaggio RAI, speaker pubblicitari e vocal coach formatisi al Piccolo Teatro di Milano.",
        'sezioni' => ['Doppiaggio & Voice Over', 'Podcast & Radio', 'Audiolibri', 'Public Speaking'],
        'accent' => '#C41E3A', 'accentBg' => 'rgba(196,30,58,0.06)', 'href' => 'voce.php', 'symbol' => '◉',
    ],
    [
        'id' => 'teatro', 'numero' => '02', 'nome' => 'Fabbrica Teatro',
        'tag' => 'COMPAGNIA · SPETTACOLI · ACTING COACHING',
        'descrizione' => "Il teatro è il luogo dove la verità si svela. La Compagnia Teatro Senza Età porta in scena spettacoli originali. Coaching professionale con Nicoletta Maragno, actor-coach su set nazionali e alla Mostra del Cinema di Venezia.",
        'sezioni' => ['Compagnia Teatro Senza Età', 'Spettacoli & Eventi', 'Acting Coaching'],
        'accent' => '#8B2FC9', 'accentBg' => 'rgba(139,47,201,0.06)', 'href' => 'teatro.php', 'symbol' => '◈',
    ],
    [
        'id' => 'musical', 'numero' => '03', 'nome' => 'Fabbrica Musical',
        'tag' => 'CANTO · DANZA · RECITAZIONE',
        'descrizione' => "Il musical unisce le tre grandi arti performative in un unico percorso. Un'area in evoluzione: la nuova frontiera di Fabbrica Lirica, presto disponibile.",
        'sezioni' => ['Canto & Tecnica Vocale', 'Danza & Teatro Fisico', 'Recitazione Musical'],
        'accent' => '#C9A84C', 'accentBg' => 'rgba(201,168,76,0.06)', 'href' => 'musical.php', 'symbol' => '◇',
        'comingSoon' => true,
    ],
];
?>
<section id="fabbriche" class="hub">
  <div class="hub__grid-bg"></div>
  <div class="section-container">
    <div class="reveal" data-dir="up">
      <div class="hub__header">
        <div class="hub__eyebrow">
          <span class="hub__eyebrow-line"></span>
          <span class="hub__eyebrow-text">Polo Trasversale di Creatività</span>
          <span class="hub__eyebrow-line"></span>
        </div>
        <h2 class="hub__title">Tre Fabbriche,<br><em>Un Solo Palcoscenico.</em></h2>
        <p class="hub__lead">Fabbrica Lirica è un ecosistema artistico. Scegli la tua area di formazione e trasforma la tua espressività in professione.</p>
      </div>
    </div>

    <div class="hub__grid">
      <?php foreach ($fabbriche as $i => $fab): ?>
        <div class="reveal" data-dir="up" style="transition-delay: <?= $i * 100 ?>ms">
          <a class="hub__card" href="<?= htmlspecialchars($fab['href']) ?>" style="--accent: <?= $fab['accent'] ?>; --accent-bg: <?= $fab['accentBg'] ?>">
            <div class="hub__card-number"><?= $fab['numero'] ?></div>
            <div class="hub__card-top">
              <span class="hub__card-symbol"><?= $fab['symbol'] ?></span>
              <span class="hub__card-num"><?= $fab['numero'] ?></span>
              <?php if (!empty($fab['comingSoon'])): ?>
                <span class="hub__card-badge">In arrivo</span>
              <?php endif; ?>
            </div>
            <div>
              <h3 class="hub__card-name"><?= htmlspecialchars($fab['nome']) ?></h3>
              <p class="hub__card-tag"><?= htmlspecialchars($fab['tag']) ?></p>
            </div>
            <div class="hub__card-divider"></div>
            <p class="hub__card-desc"><?= htmlspecialchars($fab['descrizione']) ?></p>
            <ul class="hub__card-list">
              <?php foreach ($fab['sezioni'] as $s): ?>
                <li><span class="hub__card-dot"></span><?= htmlspecialchars($s) ?></li>
              <?php endforeach; ?>
            </ul>
            <?php if (empty($fab['comingSoon'])): ?>
              <div class="hub__card-cta">Scopri i corsi <span>→</span></div>
            <?php endif; ?>
            <div class="hub__card-bottom"></div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
