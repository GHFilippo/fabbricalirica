(function () {
  "use strict";

  /* ============================================
     NAVBAR — scroll state
     ============================================ */
  var navbar = document.getElementById("site-navbar");
  function updateScrolled() {
    if (!navbar) return;
    if (window.scrollY > 40) navbar.classList.add("scrolled");
    else navbar.classList.remove("scrolled");
  }
  window.addEventListener("scroll", updateScrolled, { passive: true });
  updateScrolled();

  /* ============================================
     NAVBAR — mobile menu
     ============================================ */
  var mobileBtn = document.getElementById("mobile-menu-btn");
  var mobileMenu = document.getElementById("mobile-menu");
  var iconMenu = document.getElementById("icon-menu");
  var iconClose = document.getElementById("icon-close");

  function closeMobileMenu() {
    if (!mobileMenu) return;
    mobileMenu.classList.remove("open");
    if (iconMenu) iconMenu.style.display = "";
    if (iconClose) iconClose.style.display = "none";
  }

  if (mobileBtn && mobileMenu) {
    mobileBtn.addEventListener("click", function () {
      var isOpen = mobileMenu.classList.toggle("open");
      if (iconMenu) iconMenu.style.display = isOpen ? "none" : "";
      if (iconClose) iconClose.style.display = isOpen ? "" : "none";
    });
    mobileMenu.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", closeMobileMenu);
    });
  }

  /* ============================================
     NAVBAR — dropdown (click toggle, for touch/keyboard)
     ============================================ */
  var navItems = document.querySelectorAll(".navbar__item");
  navItems.forEach(function (item) {
    var link = item.querySelector(":scope > .navbar__link");
    if (!link) return;
    link.addEventListener("click", function (e) {
      // Su touch, il primo tap apre il dropdown invece di navigare subito
      if (window.matchMedia("(hover: none)").matches) {
        if (!item.classList.contains("open")) {
          e.preventDefault();
          navItems.forEach(function (i) { i.classList.remove("open"); });
          item.classList.add("open");
        }
      }
    });
  });
  document.addEventListener("click", function (e) {
    navItems.forEach(function (item) {
      if (!item.contains(e.target)) item.classList.remove("open");
    });
  });

  /* ============================================
     REVEAL ON SCROLL
     ============================================ */
  var revealEls = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window && revealEls.length) {
    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1, rootMargin: "-40px 0px" }
    );
    revealEls.forEach(function (el) { observer.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add("is-visible"); });
  }

  /* ============================================
     HERO / AREA HERO — mount transition
     ============================================ */
  setTimeout(function () {
    document.querySelectorAll(".hero, .area-hero").forEach(function (el) {
      el.classList.add("is-mounted");
    });
  }, 80);

  /* ============================================
     HERO — rotating word
     ============================================ */
  var heroWord = document.getElementById("hero-word");
  if (heroWord) {
    var words = ["Voce.", "Teatro.", "Musical.", "Talento.", "Emozione."];
    var idx = 0;
    setInterval(function () {
      heroWord.classList.add("fade-out");
      setTimeout(function () {
        idx = (idx + 1) % words.length;
        heroWord.textContent = words[idx];
        heroWord.classList.remove("fade-out");
      }, 300);
    }, 2500);
  }

  /* ============================================
     FABBRICA TEATRO — spettacoli tabs
     ============================================ */
  var tabs = document.querySelectorAll(".spettacoli-tab");
  var panel = document.querySelector(".spettacoli-panel");
  if (tabs.length && panel) {
    var spettacoliData = window.SPETTACOLI_DATA || [];
    tabs.forEach(function (tab, i) {
      tab.addEventListener("click", function () {
        tabs.forEach(function (t) { t.classList.remove("active"); });
        tab.classList.add("active");
        var data = spettacoliData[i];
        if (!data) return;
        panel.querySelector(".spettacoli-panel__type").textContent = data.tipo;
        panel.querySelector(".spettacoli-panel__title").textContent = data.title;
        panel.querySelector(".spettacoli-panel__desc").textContent = data.descrizione;
        panel.style.animation = "none";
        // Forza il reflow per far ripartire l'animazione
        void panel.offsetWidth;
        panel.style.animation = "";
      });
    });
  }
})();
