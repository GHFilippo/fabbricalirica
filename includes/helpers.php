<?php
/**
 * render_area_hero — replica del componente React AreaHero.
 *
 * @param array $p {
 *   numero, area, titolo, sottotitolo, descrizione, accent, backHref,
 *   comingSoon (bool), stats (array di ['numero','label'])
 * }
 */
function render_area_hero(array $p): void
{
    $numero = $p['numero'];
    $area = $p['area'];
    $titolo = $p['titolo'];
    $sottotitolo = $p['sottotitolo'];
    $descrizione = $p['descrizione'];
    $accent = $p['accent'];
    $backHref = $p['backHref'];
    $comingSoon = !empty($p['comingSoon']);
    $stats = $p['stats'] ?? [];
    ?>
    <section class="area-hero" style="--accent: <?= htmlspecialchars($accent) ?>">
      <div class="area-hero__number"><?= htmlspecialchars($numero) ?></div>
      <div class="area-hero__grid"></div>
      <div class="area-hero__topline"></div>

      <div class="section-container area-hero__inner">
        <div class="area-hero__back">
          <a href="<?= htmlspecialchars($backHref) ?>">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Fabbrica Lirica
          </a>
        </div>

        <div class="area-hero__label-row">
          <span class="area-hero__label-num"><?= htmlspecialchars($numero) ?></span>
          <span class="area-hero__label-line"></span>
          <span class="area-hero__label-text"><?= htmlspecialchars($area) ?></span>
          <?php if ($comingSoon): ?>
            <span class="area-hero__badge">In arrivo</span>
          <?php endif; ?>
        </div>

        <h1 class="area-hero__title"><?= htmlspecialchars($titolo) ?></h1>
        <p class="area-hero__subtitle"><?= htmlspecialchars($sottotitolo) ?></p>

        <div class="area-hero__bottom <?= empty($stats) ? 'no-stats' : '' ?>">
          <p class="area-hero__desc"><?= htmlspecialchars($descrizione) ?></p>
          <?php if (!empty($stats)): ?>
            <div class="area-hero__stats">
              <?php foreach ($stats as $s): ?>
                <div class="area-hero__stat">
                  <div class="area-hero__stat-num"><?= htmlspecialchars($s['numero']) ?></div>
                  <div class="area-hero__stat-label"><?= htmlspecialchars($s['label']) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="area-hero__bottomline"></div>
    </section>
    <?php
}

/**
 * render_course_card — replica del componente React CourseCard.
 *
 * @param array $c { icon, title, subtitle, description, features[], tag, accent, image, learnMoreHref }
 */
function render_course_card(array $c): void
{
    $accent = $c['accent'] ?? 'var(--accent-primary)';
    $learnMoreHref = $c['learnMoreHref'] ?? '#contatti';
    ?>
    <div class="course-card" style="--accent: <?= htmlspecialchars($accent) ?>">
      <div class="course-card__glow"></div>
      <?php if (!empty($c['image'])): ?>
        <div class="course-card__image">
          <img src="<?= htmlspecialchars($c['image']) ?>" alt="<?= htmlspecialchars($c['title']) ?>" loading="lazy">
        </div>
      <?php endif; ?>
      <div class="course-card__body">
        <?php if (!empty($c['tag'])): ?>
          <div class="course-card__tag"><?= htmlspecialchars($c['tag']) ?></div>
        <?php endif; ?>
        <span class="course-card__icon"><?= $c['icon'] ?></span>
        <h3 class="course-card__title"><?= htmlspecialchars($c['title']) ?></h3>
        <p class="course-card__subtitle"><?= htmlspecialchars($c['subtitle']) ?></p>
        <div class="course-card__divider"></div>
        <p class="course-card__desc"><?= htmlspecialchars($c['description']) ?></p>
        <ul class="course-card__features">
          <?php foreach ($c['features'] as $feat): ?>
            <li><span class="course-card__feature-dot"></span><?= htmlspecialchars($feat) ?></li>
          <?php endforeach; ?>
        </ul>
        <a class="course-card__cta" href="<?= htmlspecialchars($learnMoreHref) ?>">
          Scopri il corso
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>
    </div>
    <?php
}
