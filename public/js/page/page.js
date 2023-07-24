const toggleBtn = document.querySelector(".btn-toggle");
const closeBtn = document.querySelector(".btn-close");

const menuMobile = document.querySelector("aside");
const overlay = document.querySelector(".overlay");

toggleBtn.addEventListener("click", () => {
    overlay.classList.toggle("active-overlay");
    menuMobile.classList.toggle("active");
});
closeBtn.addEventListener("click", () => {
    overlay.classList.remove("active-overlay");
    menuMobile.classList.remove("active");
});

//menu tabs
const tabs = document.querySelectorAll(".tab");
if (tabs != null && tabs != undefined) {
    tabs.forEach((tab) => {
        tab.addEventListener("click", activeTabs);
    });
}

function activeTabs(e) {
    e.preventDefault();
    tabs.forEach((item) => {
        item != this ? item.closest(".tab").classList.remove("active") : null;
    });
    if (this.closest(".tab").classList != "active");
    this.closest(".tab").classList.add("active");
}

//slider
const swiper = new Swiper(".swiper", {
    loop: true,
    autoplay: {
        delay: 3000,
    },
});
