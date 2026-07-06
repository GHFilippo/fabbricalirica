<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$isHome = ($currentPage === 'index.php' || $currentPage === '');
$homePrefix = $isHome ? '' : 'index.php';

$navLinks = [
    ['label' => 'Home', 'href' => $isHome ? '#hero' : 'index.php'],
    [
        'label' => 'Fabbrica della Voce', 'href' => 'voce.php', 'color' => '#C41E3A',
        'children' => [
            ['label' => 'Doppiaggio & Voice Over', 'href' => 'voce.php#doppiaggio'],
            ['label' => 'Podcast & Radio', 'href' => 'voce.php#podcast'],
            ['label' => 'Audiolibri', 'href' => 'voce.php#audiolibri'],
            ['label' => 'Public Speaking', 'href' => 'voce.php#publicspeaking'],
        ],
    ],
    [
        'label' => 'Fabbrica Teatro', 'href' => 'teatro.php', 'color' => '#8B2FC9',
        'children' => [
            ['label' => 'Compagnia Teatro Senza Età', 'href' => 'teatro.php#compagnia'],
            ['label' => 'Acting Coaching', 'href' => 'teatro.php#actingcoaching'],
            ['label' => 'Spettacoli & Eventi', 'href' => 'teatro.php#spettacoli'],
        ],
    ],
    [
        'label' => 'Fabbrica Musical', 'href' => 'musical.php', 'color' => '#C9A84C',
        'children' => [
            ['label' => 'Corso di Musical', 'href' => 'musical.php#corsomusical'],
        ],
    ],
    ['label' => 'Chi Siamo', 'href' => $homePrefix . '#chisiamo'],
    ['label' => 'Contatti', 'href' => $homePrefix . '#contatti'],
];
?>
<nav class="navbar" id="site-navbar">
  <div class="section-container">
    <div class="navbar__inner">
      <a class="navbar__logo" href="<?= $isHome ? '#hero' : 'index.php' ?>" aria-label="Torna in cima">
        <span class="navbar__logo-top">Fabbrica</span>
        <span class="navbar__logo-bottom">Lirica</span>
      </a>

      <div class="navbar__desktop">
        <?php foreach ($navLinks as $link): ?>
          <?php if (!empty($link['children'])): ?>
            <div class="navbar__item">
              <a class="navbar__link" href="<?= htmlspecialchars($link['href']) ?>" style="--link-accent: <?= htmlspecialchars($link['color']) ?>">
                <?= htmlspecialchars($link['label']) ?>
                <svg class="navbar__chevron" width="10" height="6" viewBox="0 0 10 6" fill="none">
                  <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
              </a>
              <div class="navbar__dropdown" style="--link-accent: <?= htmlspecialchars($link['color']) ?>">
                <?php foreach ($link['children'] as $child): ?>
                  <a class="navbar__dropdown-item" href="<?= htmlspecialchars($child['href']) ?>"><?= htmlspecialchars($child['label']) ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php else: ?>
            <a class="navbar__link" href="<?= htmlspecialchars($link['href']) ?>"><?= htmlspecialchars($link['label']) ?></a>
          <?php endif; ?>
        <?php endforeach; ?>

        <a class="btn-primary navbar__cta" href="<?= $homePrefix ?>#contatti">Iscriviti</a>
      </div>

      <button class="navbar__mobile-btn" id="mobile-menu-btn" aria-label="Menu">
        <svg id="icon-menu" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="18" x2="20" y2="18"/></svg>
        <svg id="icon-close" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
  </div>
</nav>

<div class="navbar__mobile-menu" id="mobile-menu">
  <div class="navbar__mobile-inner">
    <?php foreach ($navLinks as $link): ?>
      <div class="navbar__mobile-item">
        <a class="navbar__mobile-link" href="<?= htmlspecialchars($link['href']) ?>"><?= htmlspecialchars($link['label']) ?></a>
        <?php if (!empty($link['children'])): ?>
          <div class="navbar__mobile-children">
            <?php foreach ($link['children'] as $child): ?>
              <a class="navbar__mobile-child" href="<?= htmlspecialchars($child['href']) ?>">→ <?= htmlspecialchars($child['label']) ?></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
    <a class="btn-primary" href="<?= $homePrefix ?>#contatti" style="width:100%; margin-top:1rem;">Iscriviti ora</a>
  </div>
</div>
