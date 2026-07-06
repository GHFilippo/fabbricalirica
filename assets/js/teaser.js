/**
 * Fabbrica Lirica — teaser animato dell'hero.
 * Porting vanilla-JS del componente React FabbricaLiricaTeaser.
 * Timeline di 21s con 6 scene, riprodotta in loop via requestAnimationFrame.
 */
(function () {
  "use strict";

  var root = document.getElementById("teaser-root");
  if (!root) return;

  /* ---------------------------- Easing ---------------------------- */
  var Easing = {
    linear: function (t) { return t; },
    easeOutQuad: function (t) { return t * (2 - t); },
    easeInOutCubic: function (t) { return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1; },
    easeOutCubic: function (t) { t = t - 1; return t * t * t + 1; },
    easeOutExpo: function (t) { return t === 1 ? 1 : 1 - Math.pow(2, -10 * t); },
    easeOutBack: function (t) {
      var c1 = 1.70158, c3 = c1 + 1;
      return 1 + c3 * Math.pow(t - 1, 3) + c1 * Math.pow(t - 1, 2);
    },
  };

  function clamp(v, min, max) { return Math.max(min, Math.min(max, v)); }

  function animateVal(opts) {
    var from = opts.from || 0, to = opts.to != null ? opts.to : 1;
    var start = opts.start || 0, end = opts.end != null ? opts.end : 1;
    var ease = opts.ease || Easing.easeInOutCubic;
    return function (t) {
      if (t <= start) return from;
      if (t >= end) return to;
      return from + (to - from) * ease((t - start) / (end - start));
    };
  }

  function fade(localTime, duration, ein, eout, easeIn, easeOut) {
    ein = ein == null ? 0.4 : ein;
    eout = eout == null ? 0.4 : eout;
    easeIn = easeIn || Easing.easeOutCubic;
    easeOut = easeOut || Easing.easeOutCubic; // easeInCubic non serve: simmetria visiva sufficiente
    var outStart = Math.max(0, duration - eout);
    if (localTime < ein) return easeIn(clamp(localTime / ein, 0, 1));
    if (isFinite(duration) && localTime > outStart) return 1 - easeOut(clamp((localTime - outStart) / eout, 0, 1));
    return 1;
  }

  /* ---------------------------- Palette / type ---------------------------- */
  var BG = "#100C0A";
  var INK = "#F3ECE3";
  var DIM = "rgba(243,236,227,0.52)";
  var CORAL = "oklch(0.70 0.17 33)";
  var GOLD = "oklch(0.81 0.13 81)";
  var CREAM = "#EFE7DB";
  var SERIF = "'Cormorant Garamond', Georgia, serif";
  var SANS = "'Space Grotesk', system-ui, sans-serif";
  var MONO = "'JetBrains Mono', ui-monospace, monospace";

  function el(tag, style) {
    var e = document.createElement(tag);
    if (style) e.style.cssText = style;
    return e;
  }

  /* ---------------------------- Waveform ---------------------------- */
  function createWaveform(opts) {
    opts = opts || {};
    var count = opts.count || 64;
    var width = opts.width || 1920;
    var height = opts.height || 160;
    var x = opts.x || 0;
    var y = opts.y || 0;
    var gap = 6;
    var barW = opts.thickness != null ? opts.thickness : Math.max(3, (width - gap * (count - 1)) / count);

    var wrapper = el("div", "position:absolute; left:" + x + "px; top:" + y + "px; width:" + width + "px; height:" + height + "px; display:flex; align-items:center; justify-content:center; gap:" + gap + "px; will-change:opacity;");
    var bars = [];
    for (var i = 0; i < count; i++) {
      var bar = el("div", "border-radius:999px; width:" + barW + "px;");
      wrapper.appendChild(bar);
      bars.push(bar);
    }

    function update(t, params) {
      params = params || {};
      var speed = params.speed != null ? params.speed : 2.4;
      var accentEvery = params.accentEvery != null ? params.accentEvery : 7;
      var calm = !!params.calm;
      var opacity = params.opacity != null ? params.opacity : 1;
      wrapper.style.opacity = opacity;
      if (opacity <= 0.001) return; // risparmia calcoli quando invisibile
      for (var i = 0; i < count; i++) {
        var p = i / count;
        var v;
        if (calm) {
          v = 0.10 + 0.06 * (0.5 + 0.5 * Math.sin(t * 1.6 + i * 0.6)) + 0.04 * Math.sin(t * 0.7 + i);
        } else {
          var env = 0.35 + 0.65 * Math.sin(Math.PI * p);
          v = (0.12 + 0.88 * Math.pow(0.5 + 0.5 * Math.sin(t * speed + i * 0.55), 1.4)) * env;
          v *= 0.55 + 0.45 * (0.5 + 0.5 * Math.sin(t * 1.27 + i * 0.9));
        }
        v = clamp(v, 0.04, 1);
        var isAccent = accentEvery > 0 && i % accentEvery === 0;
        var bar = bars[i];
        bar.style.height = Math.max(2, v * height) + "px";
        bar.style.background = isAccent ? CORAL : INK;
        bar.style.opacity = isAccent ? 0.85 : 0.34;
      }
    }

    return { el: wrapper, update: update };
  }

  /* ---------------------------- Scene helpers ---------------------------- */
  function makeSceneRoot() {
    return el("div", "position:absolute; inset:0; opacity:0; display:none;");
  }

  function showScene(sceneEl, opacity) {
    sceneEl.style.display = "block";
    sceneEl.style.opacity = opacity;
  }
  function hideScene(sceneEl) {
    sceneEl.style.display = "none";
  }

  /* ============================================================
     SCENE 1 — Cold open (0 – 3.4s)
     ============================================================ */
  function SceneOpen() {
    var start = 0, end = 3.4;
    var root = makeSceneRoot();

    var preTitle = el("div", "position:absolute; top:372px; left:0; right:0; text-align:center; font-family:" + MONO + "; font-size:19px; letter-spacing:0.42em; text-transform:uppercase; color:" + DIM + "; padding-left:0.42em;");
    preTitle.textContent = "Polo Trasversale di Creatività";
    root.appendChild(preTitle);

    var line = el("div", "position:absolute; top:540px; left:50%; height:2px; background:" + INK + ";");
    root.appendChild(line);

    var wave = createWaveform({ count: 60, width: 900, height: 150, x: (1920 - 900) / 2, y: 540 - 75 });
    wave.el.style.display = "none";
    root.appendChild(wave.el);

    var title = el("div", "position:absolute; top:560px; left:0; right:0; text-align:center; font-family:" + SERIF + "; font-weight:600; font-style:italic; font-size:164px; color:" + INK + "; line-height:1; white-space:nowrap;");
    title.textContent = "La voce.";
    root.appendChild(title);

    function render(time) {
      var localTime = time - start;
      var duration = end - start;
      var op = fade(localTime, duration, 0.01, 0.45);
      showScene(root, op);

      var lineW = animateVal({ from: 0, to: 760, start: 0.15, end: 0.95, ease: Easing.easeInOutCubic })(localTime);
      var waveReveal = clamp((localTime - 0.9) / 0.5, 0, 1);

      preTitle.style.opacity = clamp((localTime - 0.25) / 0.5, 0, 1);

      line.style.width = lineW + "px";
      line.style.transform = "translateX(-50%)";
      line.style.opacity = 0.7 * (1 - waveReveal);

      if (waveReveal > 0) {
        wave.el.style.display = "flex";
        wave.update(time, { opacity: waveReveal, speed: 2.6 });
      } else {
        wave.el.style.display = "none";
      }

      var titleP = Easing.easeOutCubic(clamp((localTime - 1.0) / 0.6, 0, 1));
      title.style.opacity = titleP;
      title.style.transform = "translateY(" + ((1 - titleP) * 30) + "px)";
    }

    return { start: start, end: end, root: root, render: render };
  }

  /* ============================================================
     SCENE 2 — Discipline marquee (3.3 – 7.0s)
     ============================================================ */
  function SceneMarquee() {
    var start = 3.3, end = 7.0;
    var disciplines = ["Doppiaggio", "Voice Over", "Podcast", "Audiolibri", "Public Speaking", "Musical", "Teatro", "Acting Coaching", "Formazione Vocale", "Presenza Scenica"];
    var root = makeSceneRoot();
    root.style.display = "none";

    var stage = el("div", "position:relative; height:1080px; display:flex; flex-direction:column; justify-content:center;");
    root.appendChild(stage);

    function buildRow(items, dir, yTop, accentIdx) {
      var reps = [];
      for (var r = 0; r < 4; r++) reps = reps.concat(items);
      var rowWrap = el("div", "position:absolute; top:" + yTop + "px; left:0; right:0; overflow:hidden; height:220px;");
      var inner = el("div", "display:flex; gap:0; white-space:nowrap; align-items:center; height:100%;");
      reps.forEach(function (d, i) {
        var span = el("span", "display:inline-flex; align-items:center; font-family:" + SANS + "; font-weight:600; font-size:116px; letter-spacing:-0.02em; color:" + ((i % 5 === accentIdx) ? CORAL : INK) + ";");
        span.textContent = d;
        var dot = el("span", "color:" + GOLD + "; margin:0 44px; font-size:64px; transform:translateY(-8px); opacity:0.9;");
        dot.textContent = "·";
        span.appendChild(dot);
        inner.appendChild(span);
      });
      rowWrap.appendChild(inner);
      return { wrap: rowWrap, inner: inner };
    }

    var row1 = buildRow(disciplines, 1, 250, 1);
    var row2 = buildRow(disciplines.slice().reverse(), -1, 610, 3);
    var wave = createWaveform({ count: 90, width: 1920, height: 120, x: 0, y: 480 });

    stage.appendChild(row1.wrap);
    stage.appendChild(wave.el);
    stage.appendChild(row2.wrap);

    function render(time) {
      var localTime = time - start;
      var duration = end - start;
      var op = fade(localTime, duration, 0.3, 0.4);
      showScene(root, op);

      var off1 = time * 150 * 1;
      row1.inner.style.transform = "translateX(" + (-(off1 % 3000)) + "px)";
      var off2 = time * 150 * -1;
      row2.inner.style.transform = "translateX(" + ((off2 % 3000) - 3000) + "px)";

      wave.update(time, { opacity: 0.9, speed: 3.2, accentEvery: 6 });
    }

    return { start: start, end: end, root: root, render: render };
  }

  /* ============================================================
     SCENE 3 — Manifesto (6.9 – 11.8s)
     ============================================================ */
  function SceneManifesto() {
    var start = 6.9, end = 11.8;
    var root = makeSceneRoot();

    var stage = el("div", "position:relative; width:100%; height:100%; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;");
    root.appendChild(stage);

    var wave = createWaveform({ count: 120, width: 1920, height: 1080, x: 0, y: 0, accentEvery: 0 });
    stage.appendChild(wave.el);

    var textWrap = el("div", "position:relative; width:1920px; text-align:center; font-family:" + SERIF + "; font-size:104px; line-height:1.14; font-weight:500; color:" + INK + ";");
    var line1 = el("div", "white-space:nowrap;");
    var line2 = el("div", "white-space:nowrap; margin-top:4px;");
    textWrap.appendChild(line1);
    textWrap.appendChild(line2);
    stage.appendChild(textWrap);

    function emphSpan(txt, color) {
      var s = el("span", "display:inline-block; color:" + color + "; font-style:italic; font-weight:600; transform-origin:center bottom;");
      s.textContent = txt;
      return s;
    }

    function render(time) {
      var localTime = time - start;
      var duration = end - start;
      var op = fade(localTime, duration, 0.4, 0.5);
      showScene(root, op);

      wave.update(time, { opacity: 0.10, speed: 1.6, accentEvery: 0 });

      var l1 = Easing.easeOutCubic(clamp(localTime / 0.7, 0, 1));
      var l2 = Easing.easeOutCubic(clamp((localTime - 0.5) / 0.85, 0, 1));
      var pop1 = Easing.easeOutBack(clamp((localTime - 0.35) / 0.6, 0, 1));
      var pop2 = Easing.easeOutBack(clamp((localTime - 1.0) / 0.6, 0, 1));

      line1.innerHTML = "";
      line1.appendChild(document.createTextNode("Dove la voce diventa "));
      var em1 = emphSpan("arte", CORAL);
      em1.style.transform = "scale(" + (0.75 + 0.25 * clamp(pop1, 0, 1)) + ")";
      line1.appendChild(em1);
      line1.style.opacity = l1;
      line1.style.transform = "translateY(" + ((1 - l1) * 38) + "px)";

      line2.innerHTML = "";
      line2.appendChild(document.createTextNode("e l'arte diventa "));
      var em2 = emphSpan("professione.", GOLD);
      em2.style.transform = "scale(" + (0.75 + 0.25 * clamp(pop2, 0, 1)) + ")";
      line2.appendChild(em2);
      line2.style.opacity = l2;
      line2.style.transform = "translateY(" + ((1 - l2) * 38) + "px)";
    }

    return { start: start, end: end, root: root, render: render };
  }

  /* ============================================================
     SCENE 4 — Numbers (11.7 – 15.2s)
     ============================================================ */
  function SceneNumbers() {
    var start = 11.7, end = 15.2;
    var root = makeSceneRoot();

    var panelBg = el("div", "position:absolute; inset:0; background:" + CREAM + ";");
    root.appendChild(panelBg);

    var content = el("div", "position:absolute; inset:0;");
    root.appendChild(content);

    var heading = el("div", "position:absolute; top:150px; left:0; right:0; text-align:center; font-family:" + MONO + "; font-size:21px; letter-spacing:0.4em; text-transform:uppercase; color:" + CORAL + "; padding-left:0.4em;");
    heading.textContent = "Vent'anni sul palco";
    content.appendChild(heading);

    var statsRow = el("div", "position:absolute; top:360px; left:120px; right:120px; display:flex; gap:40px;");
    content.appendChild(statsRow);

    function buildStat(value, suffix, label, accent) {
      var wrap = el("div", "display:flex; flex-direction:column; align-items:center; flex:1;");
      var big = el("div", "font-family:" + SANS + "; font-weight:700; font-size:184px; line-height:0.9; color:#1a1411; letter-spacing:-0.03em;");
      var num = document.createTextNode("0");
      var suf = el("span", "color:" + accent + ";");
      suf.textContent = suffix;
      big.appendChild(num);
      big.appendChild(suf);
      var divider = el("div", "width:64px; height:4px; background:" + accent + "; margin:28px 0 20px; border-radius:4px;");
      var label_ = el("div", "font-family:" + MONO + "; font-size:22px; letter-spacing:0.32em; text-transform:uppercase; color:rgba(26,20,17,0.62); padding-left:0.32em;");
      label_.textContent = label;
      wrap.appendChild(big);
      wrap.appendChild(divider);
      wrap.appendChild(label_);
      return { wrap: wrap, numNode: num, divider: divider, value: value };
    }

    var stat1 = buildStat(500, "+", "Allievi formati", CORAL);
    var stat2 = buildStat(20, "+", "Anni d'esperienza", "#1a1411");
    var stat3 = buildStat(8, "", "Percorsi attivi", GOLD);
    statsRow.appendChild(stat1.wrap);
    statsRow.appendChild(stat2.wrap);
    statsRow.appendChild(stat3.wrap);

    function renderStat(stat, base, localTime) {
      var wl = clamp((localTime - base) / 0.7, 0, 1);
      var e = Easing.easeOutExpo(wl);
      stat.numNode.nodeValue = String(Math.round(stat.value * e));
      var pop = Easing.easeOutBack(clamp((localTime - base) / 0.5, 0, 1));
      stat.wrap.style.opacity = clamp(wl * 1.6, 0, 1);
      stat.wrap.style.transform = "translateY(" + ((1 - pop) * 24) + "px)";
      stat.divider.style.transform = "scaleX(" + e + ")";
    }

    function render(time) {
      var localTime = time - start;
      var duration = end - start;
      var panel = fade(localTime, duration, 0.32, 0.4, Easing.easeOutExpo, Easing.easeOutExpo);
      showScene(root, 1);

      panelBg.style.opacity = panel;
      panelBg.style.clipPath = "inset(0 " + (100 - panel * 100) + "% 0 0)";

      var contentOp = clamp((localTime - 0.25) / 0.3, 0, 1) * (localTime > duration - 0.4 ? panel : 1);
      content.style.opacity = contentOp;

      renderStat(stat1, 0.45, localTime);
      renderStat(stat2, 0.75, localTime);
      renderStat(stat3, 1.05, localTime);
    }

    return { start: start, end: end, root: root, render: render };
  }

  /* ============================================================
     SCENE 5 — Logo lockup (15.1 – 18.1s)
     ============================================================ */
  function SceneLogo() {
    var start = 15.1, end = 18.1;
    var root = makeSceneRoot();

    var stage = el("div", "position:absolute; inset:0; display:flex; flex-direction:column; justify-content:center; align-items:center;");
    root.appendChild(stage);

    var lockup = el("div", "display:flex; align-items:baseline; gap:30px;");
    var fabbrica = el("span", "font-family:" + SANS + "; font-weight:500; font-size:152px; letter-spacing:-0.01em; color:" + INK + ";");
    fabbrica.textContent = "FABBRICA";
    var lirica = el("span", "font-family:" + SERIF + "; font-style:italic; font-weight:600; font-size:168px; color:" + CORAL + ";");
    lirica.textContent = "Lirica";
    lockup.appendChild(fabbrica);
    lockup.appendChild(lirica);
    stage.appendChild(lockup);

    var waveWrap = el("div", "margin-top:30px;");
    stage.appendChild(waveWrap);
    var wave = createWaveform({ count: 56, width: 760, height: 70, x: (1920 - 760) / 2, y: 0, thickness: 4 });
    wave.el.style.position = "static";
    waveWrap.appendChild(wave.el);

    var tagline = el("div", "margin-top:96px; font-family:" + SERIF + "; font-style:italic; font-size:46px; color:" + DIM + "; text-align:center;");
    tagline.textContent = "Dove la voce diventa arte e l'arte diventa professione.";
    stage.appendChild(tagline);

    function render(time) {
      var localTime = time - start;
      var duration = end - start;
      var op = fade(localTime, duration, 0.4, 0.45);
      showScene(root, op);

      var fl = Easing.easeOutCubic(clamp(localTime / 0.7, 0, 1));
      var ll = Easing.easeOutCubic(clamp((localTime - 0.35) / 0.8, 0, 1));
      var tag = clamp((localTime - 1.1) / 0.6, 0, 1);

      fabbrica.style.opacity = fl;
      fabbrica.style.transform = "translateX(" + ((1 - fl) * -40) + "px)";
      lirica.style.opacity = ll;
      lirica.style.transform = "translateX(" + ((1 - ll) * 40) + "px)";

      waveWrap.style.opacity = tag;
      wave.update(time, { opacity: tag, speed: 2.2 });
      tagline.style.opacity = tag;
    }

    return { start: start, end: end, root: root, render: render };
  }

  /* ============================================================
     SCENE 6 — CTA (18.0 – 21.0s)
     ============================================================ */
  function SceneCTA() {
    var start = 18.0, end = 21.0;
    var root = makeSceneRoot();

    var stage = el("div", "position:absolute; inset:0; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;");
    root.appendChild(stage);

    var wave = createWaveform({ count: 80, width: 1920, height: 1080, x: 0, y: 0, accentEvery: 0 });
    stage.appendChild(wave.el);

    var kicker = el("div", "position:relative; font-family:" + MONO + "; font-size:21px; letter-spacing:0.4em; text-transform:uppercase; color:" + GOLD + "; padding-left:0.4em; margin-bottom:24px;");
    kicker.textContent = "Corsi in partenza · Posti limitati";
    stage.appendChild(kicker);

    var big = el("div", "position:relative; font-family:" + SERIF + "; font-style:italic; font-weight:600; font-size:250px; line-height:0.95; color:" + CORAL + ";");
    big.textContent = "Iscriviti.";
    stage.appendChild(big);

    var sub = el("div", "position:relative; margin-top:40px; font-family:" + SANS + "; font-weight:500; font-size:40px; color:" + INK + ";");
    sub.textContent = "Fabbrica della Voce · FabbricaTeatro";
    stage.appendChild(sub);

    var urls = el("div", "position:relative; margin-top:60px; display:flex; gap:56px; font-family:" + MONO + "; font-size:26px; letter-spacing:0.12em; color:" + INK + "; transform-origin:center;");
    var u1 = el("span", "");
    u1.textContent = "fabbricalirica.it";
    var u2 = el("span", "color:" + DIM + ";");
    u2.textContent = "@fabbricalirica";
    urls.appendChild(u1);
    urls.appendChild(u2);
    stage.appendChild(urls);

    function render(time) {
      var localTime = time - start;
      var duration = end - start;
      var op = fade(localTime, duration, 0.4, 0.01);
      showScene(root, op);

      wave.update(time, { opacity: 0.08, speed: 2.0, accentEvery: 0 });

      var k = clamp((localTime - 0.15) / 0.5, 0, 1);
      var bigP = Easing.easeOutBack(clamp((localTime - 0.25) / 0.6, 0, 1));
      var subP = clamp((localTime - 0.7) / 0.5, 0, 1);
      var urlP = clamp((localTime - 1.0) / 0.5, 0, 1);
      var pulse = 1 + 0.025 * Math.sin(time * 5);

      kicker.style.opacity = k;
      big.style.opacity = clamp(bigP, 0, 1);
      big.style.transform = "scale(" + (0.8 + 0.2 * clamp(bigP, 0, 1)) + ")";
      sub.style.opacity = subP;
      urls.style.opacity = urlP;
      urls.style.transform = "scale(" + pulse + ")";
    }

    return { start: start, end: end, root: root, render: render };
  }

  /* ---------------------------- Stage assembly ---------------------------- */
  var WIDTH = 1920, HEIGHT = 1080, DURATION = 21;
  var PERSIST_KEY = "fabbricalirica:t";

  var frame = el("div", "position:absolute; top:50%; left:50%; width:" + WIDTH + "px; height:" + HEIGHT + "px; background:" + BG + "; transform-origin:center; flex-shrink:0; overflow:hidden;");
  root.appendChild(frame);

  var scenes = [SceneOpen(), SceneMarquee(), SceneManifesto(), SceneNumbers(), SceneLogo(), SceneCTA()];
  scenes.forEach(function (s) { frame.appendChild(s.root); });

  var overlay = el("div", "position:absolute; inset:0; pointer-events:none; mix-blend-mode:multiply; background: radial-gradient(120% 120% at 50% 42%, transparent 55%, rgba(0,0,0,0.45) 100%);");
  frame.appendChild(overlay);

  /* ---------------------------- Scale to fit container ---------------------------- */
  function measure() {
    var w = root.clientWidth, h = root.clientHeight;
    if (!w || !h) return;
    var scale = Math.max(0.05, Math.min(w / WIDTH, h / HEIGHT));
    frame.style.transform = "translate(-50%, -50%) scale(" + scale + ")";
  }
  measure();
  if ("ResizeObserver" in window) {
    new ResizeObserver(measure).observe(root);
  } else {
    window.addEventListener("resize", measure);
  }

  /* ---------------------------- Playback loop ---------------------------- */
  var time = 0;
  try {
    var saved = parseFloat(localStorage.getItem(PERSIST_KEY) || "0");
    if (isFinite(saved)) time = clamp(saved, 0, DURATION);
  } catch (e) { /* localStorage non disponibile */ }

  var reduceMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var playing = !reduceMotion;
  var lastTs = null;

  function renderAll() {
    scenes.forEach(function (s) {
      if (time >= s.start && time <= s.end) {
        s.render(time);
      } else {
        hideScene(s.root);
      }
    });
  }

  function step(ts) {
    if (lastTs == null) lastTs = ts;
    var dt = (ts - lastTs) / 1000;
    lastTs = ts;
    time += dt;
    if (time >= DURATION) time = time % DURATION;
    renderAll();
    try { localStorage.setItem(PERSIST_KEY, String(time)); } catch (e) { /* noop */ }
    if (playing) requestAnimationFrame(step);
  }

  renderAll();
  if (playing) requestAnimationFrame(step);
})();
