<?php
$pillars = [
    ['icon' => '🎤', 'title' => 'Canto & Tecnica Vocale', 'description' => "Impostazione della voce, estensione, interpretazione. Tecnica del musical theatre da Broadway alle produzioni europee."],
    ['icon' => '💃', 'title' => 'Danza & Teatro Fisico', 'description' => "Jazz, contemporaneo, danza di scena. Il corpo come strumento narrativo nei grandi musical."],
    ['icon' => '🎭', 'title' => 'Recitazione per Musical', 'description' => "Il personaggio nel musical: emozione, testo e musica in perfetta sintonia. Metodo applicato al repertorio musical theatre."],
];
?>
<section id="musical" class="hub musical">
  <div class="musical__stripe"></div>
  <div class="musical__bigtext">Musical</div>

  <div class="section-container">
    <div class="reveal" data-dir="up">
      <div class="hub__header" style="text-align:left; margin-bottom:5rem;">
        <div class="chisiamo__eyebrow">
          <span style="width:60px; height:2px; background:linear-gradient(90deg, #C9A84C, #E8C86A); display:block;"></span>
          <span class="chisiamo__eyebrow-text" style="color:#C9A84C;">Fabbrica Musical</span>
        </div>
        <h2 class="hub__title" style="text-align:left;">Canto. Danza.<br><em style="background:linear-gradient(135deg, #C9A84C 0%, #E8C86A 50%, #A07830 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;">Recitazione.</em></h2>
        <p class="hub__lead" style="margin:0; max-width:600px;">Il musical è la forma d'arte più completa: unisce voce, corpo e interpretazione in un unico racconto. Fabbrica Musical è la nuova frontiera di Fabbrica Lirica, presto disponibile.</p>
      </div>
    </div>

    <div class="musical-grid" id="corsomusical">
      <div class="reveal" data-dir="up">
        <div class="musical__panel">
          <div class="musical__panel-corner musical__panel-corner--tl"></div>
          <div class="musical__panel-corner musical__panel-corner--br"></div>

          <div class="musical__badge">
            <span class="musical__badge-dot"></span>
            <span class="musical__badge-text">In Arrivo</span>
          </div>

          <h3 class="musical__panel-title">Il palcoscenico del musical sta per alzarsi.</h3>
          <p class="musical__panel-desc">Stiamo costruendo qualcosa di straordinario. Fabbrica Musical sarà un percorso formativo completo dedicato al musical theatre: canto, danza, recitazione e performance in un'unica esperienza trasformativa.</p>

          <a href="#contatti" class="btn-outline" style="--btn-outline-color:#C9A84C; font-size:0.75rem;">Avvisami al lancio →</a>
        </div>
      </div>

      <div class="musical__pillars">
        <?php foreach ($pillars as $i => $p): ?>
          <div class="reveal" data-dir="up" style="transition-delay: <?= $i * 100 ?>ms">
            <div class="musical__pillar">
              <span class="musical__pillar-icon"><?= $p['icon'] ?></span>
              <div>
                <h4 class="musical__pillar-title"><?= htmlspecialchars($p['title']) ?></h4>
                <p class="musical__pillar-desc"><?= htmlspecialchars($p['description']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
