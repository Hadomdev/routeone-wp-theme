const PageNav = () => {
    const nav = document.querySelector(".page-nav");

    if(nav) {
        const headerHeight = document.querySelector(".header").offsetHeight;
        const navHeight = nav.offsetHeight;
        nav.querySelector(".page-nav__list").style.top = headerHeight + "px";
        nav.style.height = navHeight + "px";

        window.addEventListener("scroll", () => {
            const scrollY = window.scrollY;
            const navOffsetTop = nav.offsetTop;
            scrollY + navHeight >= navOffsetTop - 1 ? nav.classList.add("sticky") : nav.classList.remove("sticky");
        })
    }
}

export default PageNav;
