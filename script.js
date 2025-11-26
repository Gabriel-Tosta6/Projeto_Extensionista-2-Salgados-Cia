const navLinks = document.querySelectorAll('a.nav-link');
navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');
        if (targetId.startsWith('#')) {
            e.preventDefault();
            document.querySelector(targetId).scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

const fadeElements = document.querySelectorAll('.card, .accordion, form, .hero h1, .hero p');

function fadeInOnScroll() {
    fadeElements.forEach(el => {
        const elementTop = el.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (elementTop < windowHeight - 50) {
            el.style.opacity = 1;
            el.style.transform = "translateY(0)";
        }
    });
}

window.addEventListener('scroll', fadeInOnScroll);
window.addEventListener('load', () => {
    fadeElements.forEach(el => {
        el.style.opacity = 0;
        el.style.transform = "translateY(40px)";
        el.style.transition = "all 0.8s ease";
    });
    fadeInOnScroll();
});

const cards = document.querySelectorAll('.card');
cards.forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.boxShadow = "0 0 20px rgba(0, 0, 0, 0.2)";
    });
    card.addEventListener('mouseleave', () => {
        card.style.boxShadow = "";
    });
});
