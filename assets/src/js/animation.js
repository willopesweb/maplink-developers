const debounce = function (func, wait, immediate) {
  let timeout;
  return function (...args) {
    const context = this;
    const later = function () {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    const callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

const target = document.querySelectorAll(".animate");

function animeScroll() {
  const windowTop = window.pageYOffset + 600; //window.pageYOffset + (window.innerHeight * 3) / 4;
  target.forEach(function (element) {
    let animationClass = element.getAttribute("data-animation");
    if (animationClass && windowTop > element.offsetTop) {
      element.classList.add(animationClass);
    }
  });
}

animeScroll();

if (target.length) {
  window.addEventListener(
    "scroll",
    debounce(function () {
      animeScroll();
    }, 200)
  );
}
