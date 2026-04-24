const Modal = () => {
    const formBtnArray = [...document.querySelectorAll(".hero__form-btn")];
    const formModal = document.querySelector(".form-modal__wrapper");
    const body = document.body;

    if (formBtnArray.length > 0) {
        document.addEventListener('wpcf7mailsent', (event) => {
            event.preventDefault();
            body.classList.add("modal-opened");
            formModal.querySelector('.form-modal__text').textContent = event.detail.apiResponse.message;
            formModal.querySelector('.form-modal__title').textContent = 'Thank you!';
        });

        document.addEventListener('wpcf7invalid', (event) => {
            event.preventDefault();
            body.classList.add("modal-opened");
            formModal.querySelector('.form-modal__text').textContent = event.detail.apiResponse.message;
            formModal.querySelector('.form-modal__title').textContent = 'Error!';

        });
    }

    if (formModal) {
        const formCloseBtn = formModal.querySelector(".form-modal__close-btn");
        const formSendBtn = formModal.querySelector(".form-modal__send-btn");

        if (formCloseBtn) {
            formCloseBtn.addEventListener("click", function () {
                body.classList.remove("modal-opened");
            })
        }

        if (formSendBtn) {
            formSendBtn.addEventListener("click", function () {
                body.classList.remove("modal-opened");
            })
        }
    }
}


export default Modal;