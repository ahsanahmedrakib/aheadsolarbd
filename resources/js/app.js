// ================================================================
// AHEAD SOLAR — Frontend interactivity
// ================================================================
import Swiper from "swiper/bundle";
import "swiper/css/bundle";

document.addEventListener("DOMContentLoaded", () => {
  initNavbar();
  initReveal();
  initRevealImages();
  initFadeSliders();
  initImageSliders();
  initSwiper();
  initCounters();
  initChatWidget();
  initFaqAccordions();
  initMobileSubmenus();
  initToasts();
  initVideoModals();
});

// ----------------------------------------------------------------
// Navbar — scrolled state + mobile menu
// ----------------------------------------------------------------
function initNavbar() {
  const header = document.querySelector("[data-navbar]");
  const inner = document.querySelector("[data-navbar-inner]");
  const menuBtn = document.querySelector("[data-mobile-menu-btn]");
  const mobileMenu = document.querySelector("[data-mobile-menu]");
  const closeIcon = document.querySelector("[data-menu-close-icon]");
  const openIcon = document.querySelector("[data-menu-open-icon]");

  const onScroll = () => {
    if (!header) return;
    const scrolled = window.scrollY > 10;
    header.classList.toggle("nav-scrolled", scrolled);
    if (inner) {
      inner.classList.toggle(
        "scrolled",
        scrolled
      );
    }
  };
  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  if (menuBtn && mobileMenu) {
    menuBtn.addEventListener("click", () => {
      const open = mobileMenu.classList.toggle("open");
      mobileMenu.classList.toggle("hidden", !open);
      if (closeIcon) closeIcon.classList.toggle("hidden", !open);
      if (openIcon) openIcon.classList.toggle("hidden", open);
    });
  }

  // Close mobile menu when a link is clicked
  mobileMenu?.querySelectorAll("a").forEach((a) =>
    a.addEventListener("click", () => {
      mobileMenu.classList.add("hidden");
      mobileMenu.classList.remove("open");
      if (closeIcon) closeIcon.classList.add("hidden");
      if (openIcon) openIcon.classList.remove("hidden");
    })
  );
}

function initMobileSubmenus() {
  document.querySelectorAll("[data-submenu-toggle]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const panel = btn.nextElementSibling;
      const chevron = btn.querySelector("[data-submenu-chevron]");
      if (!panel) return;
      const open = panel.classList.toggle("open");
      panel.classList.toggle("grid-rows-[1fr]", open);
      panel.classList.toggle("grid-rows-[0fr]", !open);
      panel.classList.toggle("opacity-100", open);
      panel.classList.toggle("opacity-0", !open);
      chevron?.classList.toggle("rotate-180", open);
    });
  });
}

// ----------------------------------------------------------------
// Scroll reveal
// ----------------------------------------------------------------
function initReveal() {
  const items = document.querySelectorAll(".reveal:not(.reveal-revealed)");
  if (!items.length) return;
  if (!("IntersectionObserver" in window)) {
    items.forEach((el) => el.classList.add("reveal-revealed"));
    return;
  }
  const intersecting = new WeakMap();
  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const el = entry.target;
        if (entry.isIntersecting) {
          intersecting.set(el, true);
          const delay = el.dataset.delay ? Number(el.dataset.delay) : 0;
          setTimeout(() => {
            if (intersecting.get(el)) el.classList.add("reveal-revealed");
          }, delay);
        } else {
          intersecting.set(el, false);
          el.classList.remove("reveal-revealed");
        }
      });
    },
    { threshold: 0.12 }
  );
  items.forEach((el) => io.observe(el));
}

function initRevealImages() {
  const items = document.querySelectorAll(".reveal-image:not(.reveal-revealed)");
  if (!items.length) return;
  if (!("IntersectionObserver" in window)) {
    items.forEach((el) => el.classList.add("reveal-revealed"));
    return;
  }
  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("reveal-revealed");
        } else {
          entry.target.classList.remove("reveal-revealed");
        }
      });
    },
    { threshold: 0.15 }
  );
  items.forEach((el) => io.observe(el));
}

// ----------------------------------------------------------------
// Fade sliders (hero)
// ----------------------------------------------------------------
function initFadeSliders() {
  document.querySelectorAll("[data-fade-slider]").forEach((slider) => {
    const slides = slider.querySelectorAll(".slide");
    const dotsWrap = slider.querySelector("[data-slider-dots]");
    const bullets = slider.querySelectorAll("[data-bullet]");
    if (!slides.length) return;

    let current = 0;
    const count = slides.length;

    const show = (index) => {
      current = (index + count) % count;
      slides.forEach((s, i) => s.classList.toggle("active", i === current));
      bullets.forEach((b, i) =>
        b.classList.toggle("hero-swiper-bullet-active", i === current)
      );
    };

    bullets.forEach((b, i) => b.addEventListener("click", () => show(i)));

    const autoplay = slider.dataset.autoplay === "false" ? false : true;
    if (autoplay && count > 1) {
      setInterval(() => show(current + 1), 7000);
    }
  });
}

// ----------------------------------------------------------------
// Image gallery sliders (single project / service / blog)
// ----------------------------------------------------------------
function initImageSliders() {
  document.querySelectorAll("[data-image-slider]").forEach((slider) => {
    const slides = slider.querySelectorAll(".slide");
    const prev = slider.querySelector("[data-slider-prev]");
    const next = slider.querySelector("[data-slider-next]");
    const dots = slider.querySelector("[data-slider-pagination]");
    if (!slides.length) return;
    let current = 0;

    const render = () => {
      slides.forEach((s, i) => s.classList.toggle("active", i === current));
      if (dots) {
        dots.innerHTML = "";
        slides.forEach((_, i) => {
          const dot = document.createElement("button");
          dot.type = "button";
          dot.className = "swiper-dot" + (i === current ? " active" : "");
          dot.addEventListener("click", () => {
            current = i;
            render();
          });
          dots.appendChild(dot);
        });
      }
      if (prev) prev.style.visibility = current === 0 ? "hidden" : "visible";
      if (next) next.style.visibility = current === slides.length - 1 ? "hidden" : "visible";
    };

    prev?.addEventListener("click", () => {
      if (current > 0) { current -= 1; render(); }
    });
    next?.addEventListener("click", () => {
      if (current < slides.length - 1) { current += 1; render(); }
    });
    render();
  });
}

// ----------------------------------------------------------------
// Swiper.js carousels — driven by data attributes:
//   [data-swiper]                → container
//   data-delay="3000"            → autoplay delay (ms), omit to disable
//   data-loop="true"             → loop (default true)
//   data-slides="1"              → slidesPerView (default 1)
//   data-breakpoints='{"640":2,"1024":3}' → responsive slidesPerView
//   data-navigation="true"       → prev/next arrows (.swiper-button-prev/next)
//   data-pagination="false"      → disable dots
// ----------------------------------------------------------------
function initSwiper() {
  document.querySelectorAll("[data-swiper]").forEach((el) => {
    const breakpoints = {};
    try {
      for (const [w, v] of Object.entries(JSON.parse(el.dataset.breakpoints || "{}"))) {
        breakpoints[parseInt(w, 10)] = { slidesPerView: parseFloat(v) };
      }
    } catch (e) {}

    new Swiper(el, {
      loop: el.dataset.loop !== "false",
      autoplay: el.dataset.delay
        ? { delay: parseInt(el.dataset.delay, 10), disableOnInteraction: false }
        : false,
      spaceBetween: parseInt(el.dataset.space || "24", 10),
      slidesPerView: parseFloat(el.dataset.slides || "1"),
      pagination:
        el.dataset.pagination === "false"
          ? false
          : { el: el.querySelector(".swiper-pagination") || undefined, clickable: true },
      navigation:
        el.dataset.navigation === "true"
          ? {
              nextEl: el.querySelector(".swiper-button-next"),
              prevEl: el.querySelector(".swiper-button-prev"),
            }
          : false,
      breakpoints,
    });
  });
}

// ----------------------------------------------------------------
// Counters (animated numbers)
// ----------------------------------------------------------------
function initCounters() {
  const counters = document.querySelectorAll("[data-counter]");
  if (!counters.length) return;
  const animate = (el) => {
    const target = Number(el.dataset.counter || "0");
    const suffix = el.dataset.suffix || "";
    const duration = 1800;
    const start = performance.now();
    const step = (now) => {
      const p = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - p, 3);
      el.textContent = Math.floor(eased * target).toLocaleString() + suffix;
      if (p < 1) requestAnimationFrame(step);
      else el.textContent = target.toLocaleString() + suffix;
    };
    requestAnimationFrame(step);
  };
  if (!("IntersectionObserver" in window)) {
    counters.forEach(animate);
    return;
  }
  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animate(entry.target);
          io.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.5 }
  );
  counters.forEach((el) => io.observe(el));
}

// ----------------------------------------------------------------
// Floating chat widget
// ----------------------------------------------------------------
function initChatWidget() {
  const fab = document.querySelector("[data-chat-fab]");
  const panel = document.querySelector("[data-chat-panel]");
  if (!fab || !panel) return;

  fab.addEventListener("click", () => {
    const hidden = panel.classList.toggle("hidden");
    fab.classList.toggle("active", !hidden);
  });
}

// ----------------------------------------------------------------
// FAQ accordions
// ----------------------------------------------------------------
function initFaqAccordions() {
  document.querySelectorAll("[data-faq-item]").forEach((item) => {
    const btn = item.querySelector("[data-faq-toggle]");
    const body = item.querySelector("[data-faq-body]");
    const badge = btn?.querySelector("div");
    if (!btn || !body || !badge) return;
    btn.addEventListener("click", () => {
      const open = item.classList.toggle("faq-open");
      body.classList.toggle("grid-rows-[1fr]", open);
      body.classList.toggle("grid-rows-[0fr]", !open);
      body.classList.toggle("opacity-100", open);
      body.classList.toggle("opacity-0", !open);
      body.classList.toggle("mt-3", open);
      badge.classList.toggle("bg-accent-500", open);
      badge.classList.toggle("text-white", open);
      badge.classList.toggle("rotate-0", open);
      badge.classList.toggle("bg-secondary", !open);
      badge.classList.toggle("text-accent-500", !open);
      badge.classList.toggle("rotate-180", !open);
    });
  });
}

// ----------------------------------------------------------------
// Toasts (flash messages)
// ----------------------------------------------------------------
function initToasts() {
  document.querySelectorAll("[data-toast]").forEach((toast) => {
    setTimeout(() => {
      toast.style.transition = "opacity 0.5s ease, transform 0.5s ease";
      toast.style.opacity = "0";
      toast.style.transform = "translateY(-10px)";
      setTimeout(() => toast.remove(), 500);
    }, 4500);
    const close = toast.querySelector("[data-toast-close]");
    close?.addEventListener("click", () => toast.remove());
  });
}

// ----------------------------------------------------------------
// Video modals (YouTube / Drive embed)
// ----------------------------------------------------------------
function initVideoModals() {
  document.querySelectorAll("[data-video-open]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const src = btn.dataset.videoOpen;
      const modal = document.querySelector("[data-video-modal]");
      const frame = modal?.querySelector("iframe");
      if (!modal || !frame) return;
      frame.src = src;
      modal.classList.remove("hidden");
      modal.classList.add("flex");
      document.body.style.overflow = "hidden";
    });
  });
  const modal = document.querySelector("[data-video-modal]");
  modal?.addEventListener("click", (e) => {
    if (e.target === modal || e.target.closest("[data-video-close]")) {
      const frame = modal.querySelector("iframe");
      if (frame) frame.src = "";
      modal.classList.add("hidden");
      modal.classList.remove("flex");
      document.body.style.overflow = "";
    }
  });
}