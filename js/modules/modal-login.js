export default class Modal {
  constructor(btnOpen, btnClose, containerModal ) {
    this.btnOpen = document.querySelector(btnOpen);
    this.btnClose = document.querySelector(btnClose);
    this.containerModal = document.querySelector(containerModal);

    // bind this para fazer referencia ao objeto
    this.eventToggleModal = this.eventToggleModal.bind(this);
    this.closeModalWhenClickOutside = this.closeModalWhenClickOutside.bind(this);
  }

  toggleModal() {
    this.containerModal.classList.toggle('ativo');
  }

  eventToggleModal(event) {
    event.preventDefault();
    this.toggleModal();
  }

  closeModalWhenClickOutside(event) {
    if (event.target === this.containerModal) { 
      this.toggleModal();
    }
  }

  addModalEvents() {
    this.btnOpen.addEventListener('click', this.eventToggleModal);
    this.btnClose.addEventListener('click', this.eventToggleModal);
    this.containerModal.addEventListener('click', this.closeModalWhenClickOutside);
  }

  init() {
    if (this.btnOpen && this.btnClose && this.containerModal) {
      this.addModalEvents();
    }
    return this;
  }
}