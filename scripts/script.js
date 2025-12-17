document.querySelectorAll('a.nav-link').forEach(link => {
    link.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href && href.startsWith('#')) {
            e.preventDefault();
            const el = document.querySelector(href);
            if (el) {
                const nav = document.querySelector('.navbar-custom');
                const navHeight = nav ? nav.offsetHeight : 90;
                const top = el.getBoundingClientRect().top + window.pageYOffset - (navHeight + 10);
                window.scrollTo({ top, behavior: 'smooth' });
            }
            const dd = document.getElementById('loginDropdown');
            if (dd) dd.classList.remove('show');
        }
    });
});

const fadeElements = document.querySelectorAll('.card, .service-card, .p-4, .hero h1, .hero p, #cardapio .p-4, .local-box');

function fadeInOnScroll() {
    const windowH = window.innerHeight;
    fadeElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < windowH - 60) {
            el.style.opacity = 1;
            el.style.transform = 'translateY(0)';
            el.style.transition = 'all .7s ease';
        }
    });
}

window.addEventListener('load', () => {
    fadeElements.forEach(el => {
        el.style.opacity = 0;
        el.style.transform = 'translateY(20px)';
    });
    fadeInOnScroll();
});

window.addEventListener('scroll', fadeInOnScroll);

document.querySelectorAll('.card, .service-card, #cardapio .p-4').forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.boxShadow = '0 16px 32px rgba(0,0,0,0.10)';
        card.style.transform = 'translateY(-8px)';
    });
    card.addEventListener('mouseleave', () => {
        card.style.boxShadow = '';
        card.style.transform = '';
    });
});

(function () {
    try {
        const carouselEl = document.querySelector('#carouselLojas');
        if (carouselEl && window.bootstrap && bootstrap.Carousel) {
            new bootstrap.Carousel(carouselEl, {
                interval: 2500,
                ride: 'carousel',
                pause: false,
                touch: true
            });
        }
    } catch (err) {}
})();

(function () {
    document.addEventListener('DOMContentLoaded', () => {
        const userIcon = document.getElementById('userIcon');
        const loginDropdown = document.getElementById('loginDropdown');

        if (!userIcon || !loginDropdown) return;

        userIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            loginDropdown.classList.toggle('show');
        });

        document.addEventListener('click', (ev) => {
            if (!loginDropdown.contains(ev.target) && !userIcon.contains(ev.target)) {
                if (loginDropdown.classList.contains('show')) {
                    loginDropdown.classList.remove('show');
                }
            }
        });

        loginDropdown.addEventListener('click', (ev) => {
            ev.stopPropagation();
        });

        const loginButton = loginDropdown.querySelector('button');
        if (loginButton) {
            loginButton.addEventListener('click', (ev) => {
                ev.preventDefault();
                const email = loginDropdown.querySelector('input[type="email"]').value.trim();
                const pass = loginDropdown.querySelector('input[type="password"]').value.trim();

                if (!email || !pass) {
                    alert('Por favor preencha e-mail e senha.');
                    return;
                }
                alert('Tentando logar com: ' + email);
            });
        }
    });
})();