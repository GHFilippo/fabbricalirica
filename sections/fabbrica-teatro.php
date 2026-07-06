<?php
require_once __DIR__ . '/../includes/helpers.php';

$teatroCorsi = [
    [
        'id' => 'compagnia', 'icon' => '🎭', 'title' => 'Compagnia Teatro Senza Età', 'subtitle' => 'Fabbrica Teatro',
        'tag' => 'Compagnia',
        'image' => 'https://images.unsplash.com/photo-1507924538820-ede94a04019d?auto=format&fit=crop&w=800&q=70',
        'description' => "Una compagnia teatrale aperta a tutti, senza limiti di età. Attualmente in repertorio: 'Dovunque t'ho cercata' e 'Notte Schuman'. Unisciti a una comunità teatrale viva, che porta in scena la vita con coraggio e poesia.",
        'features' => [
            'Produzioni teatrali professionali',
            "Spettacoli: 'Dovunque t'ho cercata'",
            "Spettacoli: 'Notte Schuman'",
            'Tournée e repliche su territorio nazionale',
            'Nessun limite di età — la scena è per tutti',
        ],
        'accent' => '#8B2FC9',
    ],
    [
        'id' => 'actingcoaching', 'icon' => '🌟', 'title' => 'Acting Coaching Professionale', 'subtitle' => 'Fabbrica Teatro',
        'tag' => 'Coaching',
        'image' => 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?auto=format&fit=crop&w=800&q=70',
        'description' => "Coaching individuale e di gruppo per attori, professionisti della comunicazione e chi vuole sviluppare la propria presenza scenica. Nicoletta Maragno, actor-coach su set nazionali, ti segue nel tuo percorso personale.",
        'features' => [
            'Sessioni one-to-one con Nicoletta Maragno',
            'Metodo Stanislavskj e tecniche avanzate',
            'Preparazione a ruoli specifici per il cinema',
            'Actor coaching per fiction e cortometraggi',
            'Sviluppo della presenza scenica personale',
        ],
        'accent' => '#8B2FC9',
    ],
];

$spettacoli = [
    [
        'title' => "Dovunque t'ho cercata", 'tipo' => 'Spettacolo teatrale',
        'descrizione' => "Una storia d'amore, di perdita e di ricerca. La Compagnia Teatro Senza Età porta in scena un testo di forte impatto emotivo che attraversa generazioni.",
    ],
    [
        'title' => 'Notte Schuman', 'tipo' => 'Spettacolo musicale',
        'descrizione' => "Un omaggio al grande compositore Robert Schumann, tra musica, poesia e teatro. Un viaggio nella mente creativa di un genio tormentato.",
    ],
];
?>
<section id="teatro" class="hub" style="padding-top:8rem; background: var(--bg-secondary);">
  <div class="teatro__stage-glow"></div>
  <div class="section-container">
    <div class="reveal" data-dir="up">
      <div class="hub__header" style="text-align:left; margin-bottom:5rem;">
        <div class="chisiamo__eyebrow">
          <span class="decorative-line"></span>
          <span class="chisiamo__eyebrow-text">Fabbrica Teatro</span>
        </div>
        <h2 class="hub__title" style="text-align:left;">Compagnia. Spettacoli.<br><em style="background:linear-gradient(135deg, #8B2FC9, #B06AE8); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Acting Coaching.</em></h2>
        <p class="hub__lead" style="margin:0; max-width:600px;">Il teatro è il luogo dove la verità si svela. La Compagnia Teatro Senza Età porta in scena spettacoli originali di forte impatto emotivo. Coaching professionale per chi vuole fare del palcoscenico il proprio spazio di libertà.</p>
      </div>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(min(100%, 300px), 1fr)); gap:1.5rem; margin-bottom:6rem;">
      <?php foreach ($teatroCorsi as $i => $corso): ?>
        <div class="reveal" data-dir="up" id="<?= htmlspecialchars($corso['id']) ?>" style="transition-delay: <?= $i * 80 ?>ms">
          <?php render_course_card($corso); ?>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="reveal" data-dir="up">
      <div id="spettacoli" style="border-top:1px solid var(--border-subtle); padding-top:4rem;">
        <div class="chisiamo__eyebrow" style="margin-bottom:2.5rem;">
          <span class="decorative-line"></span>
          <span class="chisiamo__eyebrow-text">In Repertorio</span>
        </div>
        <h3 style="font-family:var(--font-cormorant); font-size:clamp(1.8rem, 4vw, 3rem); font-weight:300; color:var(--text-primary); margin-bottom:2.5rem;">Spettacoli della Compagnia</h3>

        <div class="spettacoli-tabs">
          <?php foreach ($spettacoli as $i => $s): ?>
            <button type="button" class="spettacoli-tab <?= $i === 0 ? 'active' : '' ?>"><?= htmlspecialchars($s['title']) ?></button>
          <?php endforeach; ?>
        </div>

        <div class="spettacoli-panel">
          <p class="spettacoli-panel__type"><?= htmlspecialchars($spettacoli[0]['tipo']) ?></p>
          <h4 class="spettacoli-panel__title"><?= htmlspecialchars($spettacoli[0]['title']) ?></h4>
          <p class="spettacoli-panel__desc"><?= htmlspecialchars($spettacoli[0]['descrizione']) ?></p>
          <a href="#contatti" class="btn-outline" style="font-size:0.75rem; padding:0.625rem 1.5rem;">Info e Date →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  window.SPETTACOLI_DATA = <?= json_encode($spettacoli, JSON_UNESCAPED_UNICODE) ?>;
</script>
