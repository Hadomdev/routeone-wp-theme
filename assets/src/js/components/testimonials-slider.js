const Testimonials = () => {
    jQuery(document).ready(function ($) {

    let next_slider = $('#testimonials__next'),
    next_review = $('.testimonials .ti-next'),
        prev_slider = $('#testimonials__prev'),
        prev_review = $('.testimonials .ti-prev');

        next_slider.click(function (){
            next_review.click();
            console.log('next');
        });

        prev_slider.click(function (){
            prev_review.click();
            console.log('prev');
        });

    });
}

export default Testimonials;