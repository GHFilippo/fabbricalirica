<?php
require_once __DIR__ . '/../includes/helpers.php';

$voiceCorsi = [
    [
        'id' => 'doppiaggio', 'icon' => '🎙️', 'title' => 'Doppiaggio & Voice Over', 'subtitle' => 'Fabbrica della Voce',
        'tag' => 'Corso Professionale',
        'image' => 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618?auto=format&fit=crop&w=800&q=70',
        'description' => "Diventa un professionista del doppiaggio e dello speakeraggio. Con docenti come Roberto Ceccato (voce RAI Kilimanjaro) e Marta Comerio (IKEA, Toyota, Aperol), imparerai le tecniche del doppiaggio cinematografico e televisivo.",
        'features' => [
            'Tecnica di lettura al leggìo e al microfono',
            'Sincronismo labiale per cinema e animazione',
            'Voice Over per spot, documentari, e-learning',
            'Accesso a studi di registrazione professionali',
            'Portfolio personale al termine del corso',
        ],
        'accent' => '#C9A84C',
    ],
    [
        'id' => 'podcast', 'icon' => '🎧', 'title' => 'Podcast & Radio', 'subtitle' => 'Fabbrica della Voce',
        'tag' => 'New Media',
        'image' => 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?auto=format&fit=crop&w=800&q=70',
        'description' => "Il podcasting è il nuovo radio. Impara a ideare, produrre e distribuire il tuo podcast. Dalle tecniche di conduzione alle strategie di crescita dell'audience, un percorso completo per fare della tua voce un media.",
        'features' => [
            'Ideazione e formato del podcast',
            'Tecnica di conduzione e intervista',
            'Produzione e montaggio audio',
            'Distribuzione su Spotify, Apple Podcasts',
            'Strategie di crescita e monetizzazione',
        ],
        'accent' => '#E040FB',
    ],
    [
        'id' => 'audiolibri', 'icon' => '📖', 'title' => 'Narratore di Audiolibri', 'subtitle' => 'Fabbrica della Voce',
        'tag' => 'Narrazione',
        'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=800&q=70',
        'description' => "L'audiolibro è un genere in fortissima crescita. Impara l'arte della narrazione: come interpretare i personaggi, gestire il ritmo e creare un'esperienza di ascolto coinvolgente che trasporta l'ascoltatore dentro la storia.",
        'features' => [
            'Analisi del testo narrativo',
            'Tecnica interpretativa dei personaggi',
            'Ritmo, pausa e dinamica del racconto',
            'Registrazione e post-produzione',
            'Collaborazione con case editrici',
        ],
        'accent' => '#4CAF50',
    ],
    [
        'id' => 'publicspeaking', 'icon' => '🎤', 'title' => 'Public Speaking', 'subtitle' => 'Fabbrica della Voce',
        'tag' => 'Comunicazione',
        'image' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?auto=format&fit=crop&w=800&q=70',
        'description' => "Nicoletta Maragno, actor & vocal coach formatasi al Piccolo Teatro di Milano con G. Strehler, trasferisce le tecniche attoriali al mondo del business. Impara a catturare qualsiasi sala e a comunicare con autorevolezza e carisma.",
        'features' => [
            'Postura, respiro e proiezione della voce',
            'Storytelling e struttura del discorso',
            "Gestione dell'ansia e del palcoscenico",
            'Presenza scenica e body language',
            'Presentazioni in azienda e TED-style',
        ],
        'accent' => '#FF7043',
    ],
];
?>
<section id="voce" class="hub" style="padding-top:8rem;">
  <div class="section-container">
    <div class="reveal" data-dir="up">
      <div class="hub__header" style="text-align:left; margin-bottom:5rem;">
        <div class="chisiamo__eyebrow">
          <span class="decorative-line"></span>
          <span class="chisiamo__eyebrow-text">Fabbrica della Voce</span>
        </div>
        <h2 class="hub__title" style="text-align:left;">Doppiaggio. Podcast.<br><em>Audiolibri. Public Speaking.</em></h2>
        <p class="hub__lead" style="margin:0; max-width:600px;">La voce è il tuo strumento più potente. Che tu voglia entrare nel mondo del doppiaggio, creare il tuo podcast o parlare in pubblico con autorevolezza, la Fabbrica della Voce ha il percorso per te.</p>
      </div>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(min(100%, 280px), 1fr)); gap:1.5rem;">
      <?php foreach ($voiceCorsi as $i => $corso): ?>
        <div class="reveal" data-dir="up" id="<?= htmlspecialchars($corso['id']) ?>" style="transition-delay: <?= $i * 80 ?>ms">
          <?php render_course_card($corso); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
