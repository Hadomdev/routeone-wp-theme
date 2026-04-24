const Services = () => {
    const servicesItems = [...document.querySelectorAll(".services__item")];
    servicesItems.forEach(( serviceItem) => {
        serviceItem.addEventListener("click", function () {
            servicesItems.forEach(item => {
                if (item !== serviceItem) {
                    item.classList.remove("fliped");
                }
            });

            serviceItem.classList.toggle("fliped");

        })
    })
}
export default Services;