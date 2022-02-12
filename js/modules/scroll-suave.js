export default function scrollSuave() {
  const links = document.querySelectorAll('[data-menu="suave"] a[href^="#"]');

  function scrollToSection(event) {
    event.preventDefault();
    const href = event.target.getAttribute('href');
    const section = document.querySelector(href);

    section.scrollIntoView({
      behavior: 'smooth',
      block: 'center'
    });
  }

  links.forEach((link) => {
    link.addEventListener('click', scrollToSection);
  });
}

