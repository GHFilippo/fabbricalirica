<?php
$corsiOptions = [
    "Doppiaggio & Voice Over", "Podcast & Radio", "Narratore di Audiolibri", "Public Speaking",
    "Compagnia Teatro Senza Età", "Corso di Musical", "Acting Coaching", "Informazioni generali",
];

$contattiSubmitted = false;
$contattiErrors = [];
$form = ['nome' => '', 'email' => '', 'corso' => '', 'messaggio' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['form_id'] ?? '') === 'contatti') {
    $form['nome'] = trim($_POST['nome'] ?? '');
    $form['email'] = trim($_POST['email'] ?? '');
    $form['corso'] = trim($_POST['corso'] ?? '');
    $form['messaggio'] = trim($_POST['messaggio'] ?? '');

    if ($form['nome'] === '') {
        $contattiErrors[] = 'Il nome è obbligatorio.';
    }
    if (!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
        $contattiErrors[] = "Inserisci un indirizzo email valido.";
    }

    if (empty($contattiErrors)) {
        $contattiSubmitted = true;

        $subject = 'Nuova richiesta informazioni - Fabbrica Lirica';
        $body = "Nome: {$form['nome']}\n"
              . "Email: {$form['email']}\n"
              . "Corso di interesse: {$form['corso']}\n\n"
              . "Messaggio:\n{$form['messaggio']}\n";
        $headers = "From: Fabbrica Lirica <no-reply@fabbricalirica.it>\r\n"
                 . "Reply-To: {$form['email']}\r\n";
        @mail(CONTACT_EMAIL, $subject, $body, $headers);
    }
}
?>
<section id="contatti" class="contatti">
  <div class="section-container">
    <div class="contact-grid">
      <div class="reveal" data-dir="left">
        <div>
          <div class="contatti__eyebrow">
            <span class="decorative-line"></span>
            <span class="contatti__eyebrow-text">Contatti</span>
          </div>

          <h2 class="contatti__title">Inizia il tuo<br><em>percorso.</em></h2>

          <p class="contatti__lead">Scrivici per informazioni sui corsi, le date di inizio e le modalità di iscrizione. Il nostro team ti risponderà entro 24 ore.</p>

          <div class="contatti__details">
            <div class="contatti__detail">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <div>
                <p class="contatti__detail-label">Sede</p>
                <p class="contatti__detail-value">Via D. Sante Ferronato 28<br>30030 Pianiga (Venezia)</p>
              </div>
            </div>
            <div class="contatti__detail">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z" style="display:none"/><path d="M22 6l-10 7L2 6"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
              <div>
                <p class="contatti__detail-label">Email</p>
                <p class="contatti__detail-value"><a href="mailto:info@fabbricalirica.it">info@fabbricalirica.it</a></p>
              </div>
            </div>
          </div>

          <div class="contatti__social">
            <a href="https://www.instagram.com/fabbricalirica/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </a>
            <a href="https://www.facebook.com/fabbricalirica/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
          </div>
        </div>
      </div>

      <div class="reveal" data-dir="right" style="transition-delay: 100ms">
        <?php if ($contattiSubmitted): ?>
          <div class="form-success">
            <div class="form-success__icon">🎭</div>
            <h3>Messaggio inviato!</h3>
            <p>Grazie <?= htmlspecialchars($form['nome']) ?>. Ti contatteremo presto<br>all'indirizzo <strong><?= htmlspecialchars($form['email']) ?></strong>.</p>
          </div>
        <?php else: ?>
          <form class="contatti__form" method="post" action="#contatti">
            <h3>Richiedi informazioni</h3>

            <?php if (!empty($contattiErrors)): ?>
              <div class="form-error">
                <?php foreach ($contattiErrors as $err): ?>
                  <div><?= htmlspecialchars($err) ?></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <input type="hidden" name="form_id" value="contatti">

            <div class="form-fields">
              <div class="form-row">
                <div>
                  <label class="form-label">Nome *</label>
                  <input class="form-input" type="text" name="nome" placeholder="Mario Rossi" required value="<?= htmlspecialchars($form['nome']) ?>">
                </div>
                <div>
                  <label class="form-label">Email *</label>
                  <input class="form-input" type="email" name="email" placeholder="mario@email.it" required value="<?= htmlspecialchars($form['email']) ?>">
                </div>
              </div>

              <div>
                <label class="form-label">Corso di interesse</label>
                <select class="form-select" name="corso">
                  <option value="">Seleziona un corso...</option>
                  <?php foreach ($corsiOptions as $c): ?>
                    <option value="<?= htmlspecialchars($c) ?>" <?= $form['corso'] === $c ? 'selected' : '' ?>><?= htmlspecialchars($c) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div>
                <label class="form-label">Messaggio</label>
                <textarea class="form-textarea" name="messaggio" rows="4" placeholder="Raccontaci di te e del tuo interesse..."><?= htmlspecialchars($form['messaggio']) ?></textarea>
              </div>

              <button type="submit" class="btn-primary" style="width:100%; font-size:0.85rem;">Invia Richiesta</button>
            </div>

            <p class="form-note">P.IVA: 01432980280 — Ti rispondiamo entro 24h</p>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
