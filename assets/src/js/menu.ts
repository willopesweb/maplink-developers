const mobileBtn = document.querySelector(".js-mobile-btn");
const mobileMenu = document.querySelector(".js-mobile-menu");

if (mobileBtn && mobileMenu) {
  mobileBtn.addEventListener("click", () => {
    mobileMenu.classList.toggle("is-open");
  });

  const links = mobileMenu.querySelectorAll(".js-link-scroll");

  links.forEach((link) => {
    link.addEventListener("click", () => {
      mobileMenu.classList.toggle("is-open");
    });
  });
}

const searchButton: NodeListOf<HTMLElement> | null =
  document.querySelectorAll(".js-search-button");
const searchBar: HTMLElement | null = document.getElementById("searchMobile");

if (searchButton && searchBar) {
  searchButton.forEach((button) =>
    button.addEventListener("click", (e: Event) => {
      e.preventDefault();
      searchBar.classList.toggle("is-visible");
    })
  );
}

const subMenusMobile: NodeListOf<HTMLElement> | null =
  document.querySelectorAll(".js-submenu-item");



if (subMenusMobile) {
  subMenusMobile.forEach((menu) => {
    const menuLink = menu.querySelector(".js-submenu-link");
    const subMenu = menu.querySelector(".js-submenu");
    if(menuLink && subMenu){
      menuLink.addEventListener("click", () => {
        menuLink.classList.toggle("is-submenu-open");
        menuLink.classList.toggle("is-active");
        subMenu.classList.toggle("is-submenu-open");
      });
    }
  });
}

