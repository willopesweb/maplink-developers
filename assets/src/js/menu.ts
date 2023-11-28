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
