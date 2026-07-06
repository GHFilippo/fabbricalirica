<?php
$newsletterSubmitted = false;
$newsletterEmail = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['form_id'] ?? '') === 'newsletter') {
    $newsletterEmail = trim($_POST['email'] ?? '');
    if (filter_var($newsletterEmail, FILTER_VALIDATE_EMAIL)) {
        $newsletterSubmitted = true;

        $subject = 'Nuova iscrizione Newsletter - Fabbrica Lirica';
        $body = "Nuova iscrizione alla newsletter.\n\nEmail: {$newsletterEmail}\n";
        $headers = "From: Fabbrica Lirica <no-reply@fabbricalirica.it>\r\n";
        @mail(CONTACT_EMAIL, $subject, $body, $headers);
    }
}
?>
<section class="newsletter" id="newsletter">
  <div class="newsletter__arc newsletter__arc--1"></div>
  <div class="newsletter__arc newsletter__arc--2"></div>

  <div class="section-container newsletter__inner-wrap">
    <div class="reveal" data-dir="up">
      <div class="newsletter__inner">
        <div class="newsletter__eyebrow">
          <span class="newsletter__eyebrow-line"></span>
          <span class="newsletter__eyebrow-text">Newsletter</span>
          <span class="newsletter__eyebrow-line"></span>
        </div>

        <h2 class="newsletter__title">Resta in scena.<br><em>Non perdere nulla.</em></h2>

        <p class="newsletter__lead">Iscriviti per ricevere aggiornamenti sui corsi in partenza, nuovi spettacoli e offerte riservate agli iscritti.</p>

        <?php if ($newsletterSubmitted): ?>
          <div class="newsletter__success">Benvenuto nel nostro palcoscenico. ✨</div>
        <?php else: ?>
          <form class="newsletter__form" method="post" action="#newsletter">
            <input type="hidden" name="form_id" value="newsletter">
            <input type="email" name="email" class="newsletter__input" placeholder="La tua email" required value="<?= htmlspecialchars($newsletterEmail) ?>">
            <button type="submit" class="btn-primary newsletter__btn">Iscriviti</button>
          </form>
        <?php endif; ?>

        <p class="newsletter__note">Nessuno spam. Disdici quando vuoi.</p>
      </div>
    </div>
  </div>
</section>
