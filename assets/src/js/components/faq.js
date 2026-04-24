const Faq = () => {
  const faqList = [...document.querySelectorAll(".faq__item")];

  if (faqList.length !== 0 ) {
    faqList.forEach((faqItem) => {
      const faqQuestion = faqItem.querySelector(".faq__item-question");

      faqQuestion.addEventListener("click", () => {
        const existedOpenedItem = faqList.filter(item => item.classList.contains('opened'))[0];
        if (existedOpenedItem !== faqItem) {
          existedOpenedItem?.classList.remove('opened');
        }

        faqItem.classList.toggle("opened");
      });
    })
  }
}


export default Faq;