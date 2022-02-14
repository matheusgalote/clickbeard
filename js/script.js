import scrollSuave from "./modules/scroll-suave.js";
import ScrollAnima from "./modules/anima-scroll.js";
import Modal from "./modules/modal-login.js";

scrollSuave();

const scrollAnima = new ScrollAnima('[data-anime="scroll"]')
scrollAnima.init();

const modalLogin = new Modal('[data-modal="abrir-login"]', '[data-modal="fechar-login"]', '[data-modal="login"]')
modalLogin.init();

const modalSignup = new Modal('[data-modal="abrir-signup"]', '[data-modal="fechar-signup"]', '[data-modal="signup"]');
modalSignup.init();

