import scrollSuave from "./modules/scroll-suave.js";
import ScrollAnima from "./modules/anima-scroll.js";

scrollSuave();

const scrollAnima = new ScrollAnima('[data-anime="scroll"]')
scrollAnima.init();
