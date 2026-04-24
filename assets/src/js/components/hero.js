import Swiper from 'swiper/bundle';

const Hero = () => {
    const container = document.querySelector(".hero");

    if (container) {
        const carousel = new Swiper(".heroCarousel", {
            slidesPerView: 5,
            initialSlide: 0,
            breakpoints: {
                768: {
                    slidesPerView: 5,
                },
                1140: {
                    slidesPerView: 5,
                }
            },
        });

        if (!carousel.slides || carousel.slides.length === 0) {
            return;
        }

        const listWithDescriptions = [...container.querySelectorAll(".hero__description-item")];

        const getActiveImgId = ({index}) => {
            return carousel.slides[index || 0]?.querySelector(".hero__carousel-item")?.dataset.id;
        }
        const setActiveDescriptionItem = ({index}) => {
            const id = getActiveImgId({
                index: index
            })
            const currentActive = listWithDescriptions.filter(el => el.classList.contains("active"))[0];
            if(currentActive) {
                currentActive.classList.remove("active");
            }
            const newActive = listWithDescriptions.filter(el => el.dataset.target === id)[0];
            if(newActive) {
                newActive.classList.add("active");
            }
        }

        setActiveDescriptionItem({index: 0});

        const setActiveByHand = ({nextElIndex}) => {
            carousel.slides.filter(slide => slide.classList.contains("swiper-slide-active"))[0]?.classList.remove("swiper-slide-active");
            carousel.slides[nextElIndex]?.classList.add("swiper-slide-active");
        }
        const onButtonClick = ({inc}) => {
            const slidesPerView = carousel?.params.slidesPerView;
            const current = carousel.activeIndex;
            const total = carousel.slides.length;


            const limit = total - slidesPerView;
            const isEnd = total - current <= slidesPerView;

            const nextElIndex = carousel.activeIndex + inc;

            switch(true) {
                case nextElIndex === 0:
                case isEnd && current === total - 1 && nextElIndex === total: {
                    carousel.slideTo( 0);
                    setActiveDescriptionItem({index: 0});
                    break;
                }
                case isEnd && nextElIndex < total && nextElIndex > 0: {
                    setActiveByHand({nextElIndex});
                    carousel.activeIndex = carousel.activeIndex + inc;
                    setActiveDescriptionItem({index: nextElIndex});
                    break;
                }
                case current === 0 && nextElIndex < 0: {
                    carousel.slideTo(limit);
                    setActiveByHand({nextElIndex: total - 1});
                    carousel.activeIndex = total - 1;
                    setActiveDescriptionItem({index: total - 1});
                    break;
                }
                default: {
                    carousel.slideTo(nextElIndex);
                    setActiveDescriptionItem({index: nextElIndex});
                }
            }
        }
        const next = container.querySelector(".hero__nav-btn--next");
        const prev = container.querySelector(".hero__nav-btn--prev");

        next?.addEventListener("click", () => {
            onButtonClick({inc: 1})
        });
        prev?.addEventListener("click", () => {
            onButtonClick({inc: -1})
        });
    }
}

export default Hero;
