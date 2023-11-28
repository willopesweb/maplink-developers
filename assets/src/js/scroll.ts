export function handleScroll(this: Window) {
  const header: HTMLElement | null = document.getElementById("header");
  if (!header) return;

  const scrollTop = document.documentElement.scrollTop;
  if (scrollTop > 60) {
    header.classList.add("is-fixed");
    document.body.classList.add("is-header-fixed");
  } else {
    header.classList.remove("is-fixed");
    document.body.classList.remove("is-header-fixed");
  }
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
