
export const errorPageHandler = () => {
  const item = document.querySelector('.error-page__content-item--animate');
  const imgBox = document.querySelector('.error-page__img-box');

  if (item && imgBox) {
    item.classList.add('item-animate');
    imgBox.classList.add('img-animate');
  }
}
