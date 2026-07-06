<?php require_once __DIR__ . '/config.php'; ?>
<footer class="footer">
  <div class="section-container">
    <div class="footer-grid">
      <div>
        <div style="margin-bottom:1.25rem;">
          <span class="footer__brand-name">Fabbrica Lirica</span>
          <span class="footer__brand-sub">Un progetto di Nicoletta Maragno</span>
        </div>
        <p class="footer__desc">Polo trasversale di creatività. Dove la voce diventa arte e l'arte diventa professione.</p>
        <div class="footer__social">
          <a href="https://www.instagram.com/fabbricalirica/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
          <a href="https://www.facebook.com/fabbricalirica/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
          </a>
        </div>
      </div>

      <div>
        <h4>Corsi</h4>
        <ul class="footer__links">
          <li><a href="voce.php#doppiaggio">Doppiaggio & Voice Over</a></li>
          <li><a href="voce.php#podcast">Podcast & Radio</a></li>
          <li><a href="voce.php#audiolibri">Audiolibri</a></li>
          <li><a href="voce.php#publicspeaking">Public Speaking</a></li>
          <li><a href="musical.php#corsomusical">Corso di Musical</a></li>
          <li><a href="teatro.php#actingcoaching">Acting Coaching</a></li>
        </ul>
      </div>

      <div>
        <h4>Info</h4>
        <ul class="footer__links">
          <li><a href="<?= $isHome ?? false ? '#chisiamo' : 'index.php#chisiamo' ?>">Chi Siamo</a></li>
          <li><a href="teatro.php#compagnia">Compagnia Teatrale</a></li>
          <li><a href="<?= $isHome ?? false ? '#contatti' : 'index.php#contatti' ?>">Contatti</a></li>
          <li><a href="<?= $isHome ?? false ? '#contatti' : 'index.php#contatti' ?>">Newsletter</a></li>
        </ul>
        <p class="footer__address">
          Via D.S. Ferronato 28<br>
          30030 Pianiga (VE)<br>
          P.IVA: 01432980280
        </p>
      </div>
    </div>

    <div class="footer__bottom">
      <p>&copy; <?= CURRENT_YEAR ?> Fabbrica Lirica &middot; Nicoletta Maragno</p>
      <p>Pianiga, Venezia — Italy</p>
    </div>
  </div>
</footer>
