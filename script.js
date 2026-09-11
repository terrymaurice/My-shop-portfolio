document.addEventListener("DOMContentLoaded", function () {

    let menu = document.querySelector(".bx-menu");
    let navbar = document.querySelector(".navbar");

    menu.addEventListener("click", function () {
        menu.classList.toggle("bx-x");
        navbar.classList.toggle("active");
    });

    window.addEventListener("scroll", function () {
        menu.classList.remove("bx-x");
        navbar.classList.remove("active");
    });

});
const typed = new Typed('.multiple-text', {
    strings: ['Software Engineering Student', 'Game Developer', 'Network Engineer', 'Web Designer', 'Mobile App Developer'],
    typeSpeed: 80,
    backSpeed: 80,
    backDelay: 1200,
    loop: true,
});
const modal = document.getElementById('about-modal');
const readMoreBtn = document.querySelector('.about-content .btn');
const closeBtn = document.getElementById('close-modal');

if (readMoreBtn && modal) {
    readMoreBtn.onclick = (e) => {
        e.preventDefault();
        modal.style.display = 'flex';
    };
}

if (closeBtn) {
    closeBtn.onclick = () => {
        modal.style.display = 'none';
    };
}

window.onclick = (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};