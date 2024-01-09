import "../scss/style.scss";
import "./menu";
import debounce from "./debounce";
import { handleScroll } from "./scroll";


window.addEventListener("scroll", debounce(handleScroll, 50));
