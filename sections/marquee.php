<?php
$marqueeItems = [
    "Doppiaggio", "Voice Over", "Podcast", "Audiolibri", "Public Speaking",
    "Musical", "Teatro", "Acting Coaching", "Formazione Vocale", "Presenza Scenica",
];
$marqueeAll = array_merge($marqueeItems, $marqueeItems);
?>
<div class="marquee-bar">
  <div class="marquee-bar__fade marquee-bar__fade--left"></div>
  <div class="marquee-bar__fade marquee-bar__fade--right"></div>
  <div class="marquee-bar__track">
    <?php foreach ($marqueeAll as $item): ?>
      <span class="marquee-bar__item"><span class="marquee-bar__dot"></span><?= htmlspecialchars($item) ?></span>
    <?php endforeach; ?>
  </div>
</div>
