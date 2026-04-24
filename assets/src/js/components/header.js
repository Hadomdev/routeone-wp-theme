const Header = () => {
  const header = document.querySelector('header');
  const nav = document.querySelector(".page-nav");
  
  if (header) {
    window.addEventListener('scroll', () => {
      const classList = header.classList;
      window.scrollY > 0 ? classList.add('with-shadow') : classList.remove('with-shadow');
    });

    const burgerMenu = header.querySelector('.header__nav ul');
    const burgerButton = header.querySelector('.header__nav-opener');

    if (burgerButton && burgerMenu) {
      burgerButton.addEventListener('click', () => {
        burgerMenu.classList.toggle('d-flex');
        burgerButton.classList.toggle('open');

        if (nav) {
          nav.classList.toggle('static');
        }
      });
    }
  }

  const imageArray = [...document.querySelectorAll(".ti-profile-img img")];

  if (imageArray) {

    imageArray.forEach(( imageArray) => {
      imageArray.setAttribute('width', '40');
      imageArray.setAttribute('height', '40');
    })
  }
}

export default Header;