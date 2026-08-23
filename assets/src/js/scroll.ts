const backToTop: HTMLElement | null = document.getElementById("js-back-to-top");

if (backToTop) {
  backToTop.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
}

export function handleScroll(this: Window): void {
  const header: HTMLElement | null = document.getElementById("header");
  if (!header) return;
  const scrollTop = document.documentElement.scrollTop;

  if (scrollTop > 50) {
    header.classList.add("is-scrolled");
    if (backToTop) backToTop.classList.add("is-visible");
  } else {
    header.classList.remove("is-scrolled");
    if (backToTop) backToTop.classList.remove("is-visible");
  }
}
