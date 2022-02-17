export default function horario() {
  const status = document.querySelector('.status');
  const circle = document.querySelector('.circle');

  const hora = Date.now();

  if(hora >= 8 && hora < 19) {
    circle.classList.toggle('aberto')
  } else {
    status.innerText = 'Fechado '
    circle.classList.toggle('fechado')
  }
}