const mobileBtn = document.querySelector<HTMLElement>(".js-mobile-btn");
const mobileMenu = document.querySelector(".js-mobile-menu");

if (mobileBtn && mobileMenu) {
  mobileBtn.addEventListener("click", () => {
    const isOpen = mobileMenu.classList.toggle("is-open");
    document.body.classList.toggle("body-locked");
    mobileBtn.setAttribute("aria-expanded", String(isOpen));
  });

  mobileMenu.querySelectorAll(".js-link-scroll").forEach((link) => {
    link.addEventListener("click", () => {
      mobileMenu.classList.remove("is-open");
      document.body.classList.remove("body-locked");
      mobileBtn.setAttribute("aria-expanded", "false");
    });
  });
}

const searchButtons = document.querySelectorAll<HTMLElement>(".js-search-button");
const searchBar = document.getElementById("searchMobile");

if (searchButtons.length && searchBar) {
  searchButtons.forEach((button) =>
    button.addEventListener("click", (e: Event) => {
      e.preventDefault();
      const isVisible = searchBar.classList.toggle("is-visible");
      searchBar.setAttribute("aria-hidden", String(!isVisible));
      button.setAttribute("aria-expanded", String(isVisible));
      if (isVisible) {
        searchBar.querySelector<HTMLElement>("input")?.focus();
      }
    })
  );
}

const subMenusMobile = document.querySelectorAll<HTMLElement>(".js-submenu-item");

if (subMenusMobile) {
  subMenusMobile.forEach((menu) => {
    const menuLink = menu.querySelector<HTMLElement>(".js-submenu-link");
    const subMenu = menu.querySelector(".js-submenu");
    if (menuLink && subMenu) {
      const toggle = () => {
        const isOpen = menuLink.classList.toggle("is-submenu-open");
        menuLink.classList.toggle("is-active");
        subMenu.classList.toggle("is-submenu-open");
        menuLink.setAttribute("aria-expanded", String(isOpen));
      };

      menuLink.addEventListener("click", toggle);
      menuLink.addEventListener("keydown", (e: KeyboardEvent) => {
        if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          toggle();
        }
      });
    }
  });
}
