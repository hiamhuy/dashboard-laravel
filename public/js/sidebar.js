const toggle = document.querySelector(".toggle-nav");
const nav = document.getElementById("sidebar");

toggle.addEventListener("click", () => {
    nav.classList.toggle("mini-sidebar");
});

window.onload = () => {
    if (window.innerWidth < 768) {
        nav.classList.add("mini-sidebar");
    } else {
        nav.classList.remove("mini-sidebar");
    }
};
window.onresize = () => {
    if (window.innerWidth < 768) {
        nav.classList.add("mini-sidebar");
    } else {
        nav.classList.remove("mini-sidebar");
    }
};

//Header
const action = ".action";
const classAction = document.querySelector(action);
const boxProfile = document.querySelector(".profile");
boxProfile.addEventListener("click", () => {
    setTimeout(() => {
        if (!classAction.classList.contains("active")) {
            classAction.classList.add("active");
        }
    }, 0);
});
document.addEventListener("click", (e) => {
    const isClosest = e.target.closest(action);
    if (!isClosest && classAction.classList.contains("active")) {
        classAction.classList.remove("active");
    }
});
