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


console.log(searchButton);
console.log(searchBar);

if (searchButton && searchBar) {
  searchButton.forEach((button) =>
    button.addEventListener("click", (e: Event) => {
      e.preventDefault();
      searchBar.classList.toggle("is-visible");
    })
  );
}
