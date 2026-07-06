<?php
$team = [
    [
        'nome' => 'Nicoletta Maragno',
        'ruolo' => 'Founder & CEO · Actress & Director · Artistic & Business Coach',
        'specialita' => 'Recitazione · Voce · Coaching',
        'bio' => "Attrice di cinema e teatro, cantante, regista e vocal coach. Formatasi al Piccolo Teatro di Milano con G. Strehler. Ha recitato con Silvio Soldini, Carlo Mazzacurati, Alessandro Rossetto. Presente alla 70ª e 76ª Mostra del Cinema di Venezia.",
        'iniziale' => 'N', 'accent' => '#C9A84C',
        'photo' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=400&q=70',
    ],
    [
        'nome' => 'Roberto Ceccato', 'ruolo' => 'Documentarista & Speaker',
        'specialita' => 'Documentario · RAI · Sky',
        'bio' => "Attore, regista, speaker dal 1985. Voce ufficiale di 'Alle falde del Kilimangiaro' e 'Geo and Geo' per RAI. La sua voce ha narrato documentari per RAI, Mediaset, Sky e Premium.",
        'iniziale' => 'R', 'accent' => '#4CAF50',
        'photo' => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?auto=format&fit=crop&w=400&q=70',
    ],
    [
        'nome' => 'Marta Comerio', 'ruolo' => 'Spot & Speakeraggio',
        'specialita' => 'IKEA · Toyota · Tim · Vodafone · Aperol',
        'bio' => "Attrice del Piccolo Teatro di Milano. Speaker pubblicitaria dei migliori brand italiani. Premio Voce Femminile Radiofestival 2001, 2005, 2008. Voce dell'Anno al Festival Nazionale Voci nell'ombra 2015.",
        'iniziale' => 'M', 'accent' => '#E040FB',
        'photo' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=400&q=70',
    ],
    [
        'nome' => 'Gabriele Calindri', 'ruolo' => 'Film di Animazione & Doppiaggio',
        'specialita' => 'Dragon Ball · Superman · Scooby Doo',
        'bio' => "Figlio di Ernesto Calindri. Doppiatore e direttore di doppiaggio di Kiss me Licia, Dragon Ball, Superman, Scooby Doo, Ken il Guerriero, Power Rangers. Attore e regista teatrale milanese.",
        'iniziale' => 'G', 'accent' => '#FF7043',
        'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=70',
    ],
    [
        'nome' => 'Marisa Della Pasqua', 'ruolo' => 'Cinema & Fiction',
        'specialita' => 'Doppiatrice · Dialoghista',
        'bio' => "Attrice e doppiatrice italiana dal 1991. Direttrice di doppiaggio e dialoghista. Ha lavorato su L'Ispettore Barnaby, Spin City, Wynona Earp e numerosi film per il cinema.",
        'iniziale' => 'M', 'accent' => '#AB47BC',
        'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=400&q=70',
    ],
];
?>
<section id="chisiamo" class="chisiamo">
  <div class="section-container">
    <div class="reveal" data-dir="up">
      <div class="two-col-grid">
        <div>
          <div class="chisiamo__eyebrow">
            <span class="decorative-line"></span>
            <span class="chisiamo__eyebrow-text">Chi Siamo</span>
          </div>
          <h2 class="chisiamo__title">Dove l'arte<br><em>incontra l'impresa</em></h2>
        </div>
        <div class="chisiamo__text">
          <p><strong>Fabbrica Lirica</strong> nasce dall'idea di unire l'arte con l'impresa. <em>"Fabbrica"</em> è il luogo del fare, del progetto, dell'approccio razionale.</p>
          <p>Ad essa si intreccia la componente poetica, emotiva, espressiva: la parte <em>"Lirica"</em> che può fare la differenza, sia nella vita che nel lavoro.</p>
          <p>Fabbrica Lirica propone percorsi, workshop ed esperienze per liberare talenti espressivi, creativi e comunicativi, trasformandoli in Brand personale e professionale.</p>
        </div>
      </div>
    </div>

    <div class="reveal" data-dir="up">
      <div class="chisiamo__eyebrow" style="margin-bottom: 3rem;">
        <span class="decorative-line"></span>
        <span class="chisiamo__eyebrow-text">Founder &amp; Partner</span>
      </div>
    </div>

    <div class="team-grid">
      <?php foreach ($team as $i => $membro): ?>
        <div class="reveal" data-dir="up" style="transition-delay: <?= $i * 70 ?>ms">
          <div class="team-card" style="--accent: <?= $membro['accent'] ?>">
            <div class="team-card__initial"><?= htmlspecialchars($membro['iniziale']) ?></div>
            <div class="team-card__avatar">
              <img src="<?= htmlspecialchars($membro['photo']) ?>" alt="<?= htmlspecialchars($membro['nome']) ?>" loading="lazy">
            </div>
            <h3 class="team-card__name"><?= htmlspecialchars($membro['nome']) ?></h3>
            <p class="team-card__spec"><?= htmlspecialchars($membro['specialita']) ?></p>
            <div class="team-card__divider"></div>
            <p class="team-card__bio"><?= htmlspecialchars($membro['bio']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
