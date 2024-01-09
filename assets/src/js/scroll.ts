const backToTop: HTMLElement | null = document.getElementById("js-back-to-top");
let lastScrollTop = 0;

if (backToTop) {
  backToTop.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
}

export function handleScroll(this: Window): void {
  const header: HTMLElement | null = document.getElementById("header");
  if (!header) return;
  const scrollTop = document.documentElement.scrollTop;

  if (scrollTop > lastScrollTop) {
    if (scrollTop > 100) {
      header.classList.add("is-fixed");
      document.body.classList.add("is-header-fixed");
    }
    header.classList.remove("is-visible");
    if (backToTop) backToTop.classList.remove("is-visible");
  } else {
    if (scrollTop < 200) {
      header.classList.remove("is-fixed");
      header.classList.remove("is-visible");
      document.body.classList.remove("is-header-fixed");

      if (backToTop) backToTop.classList.remove("is-visible");
    } else {
      header.classList.add("is-visible");
      document.body.classList.add("is-header-fixed");
      if (backToTop) backToTop.classList.add("is-visible");
    }
  }

  lastScrollTop = scrollTop;
}

export function activateMenuItem() {
  const sections = document.querySelectorAll(".js-menu-section");
  const menuLinks = document.querySelectorAll(".js-link-scroll a");

  if (!sections || !menuLinks) return;

  for (const section of sections) {
    const rect = section.getBoundingClientRect();
    const isOnScreen =
      rect.top <= window.innerHeight / 2 &&
      rect.bottom >= window.innerHeight / 2;

    if (isOnScreen) {
      menuLinks.forEach((link) => {
        link.classList.remove("is-active");
        if (link.getAttribute("href") === "#" + section.getAttribute("id")) {
          link.classList.add("is-active");
        }
      });
      break;
    }
  }
}
