const Tabs = () => {
  const tabs = [...document.querySelectorAll(".tab")];
  const tabContents = [...document.querySelectorAll(".tab__content")];

  if (tabs.length !== 0 && tabContents.length !== 0) {
    tabs.forEach(tab => {
      tab.addEventListener("click", function() {
        const tabIndex = this.getAttribute("data-tab-index");
        const id = tab.dataset.tabIndex;

        tabs.forEach(tab => tab.classList.remove("active"));
        tabContents.forEach(content => content.classList.remove("active"));
        
        tab.classList.add("active");
        tabContents.filter(item => item.dataset.tabIndex === id)[0].classList.add("active");
      });
    });
  }
}

export default Tabs;
