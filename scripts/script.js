document.querySelectorAll('a.nav-link').forEach(link => {
    link.addEventListener('click', function(e){
        const href = this.getAttribute('href');

        if (href && href.startsWith('#')) {
            e.preventDefault();
            const el = document.querySelector(href);

            if (el) {
                const navHeight = document.querySelector('.navbar-custom').offsetHeight;
                const top = el.offsetTop - (navHeight + 10);

                window.scrollTo({
                    top: top,
                    behavior: 'smooth'
                });
            }

            const dd = document.getElementById('loginDropdown');
            if(dd) dd.style.display = 'none';
        }
    });
});

const fadeElements = document.querySelectorAll(
    '.card, .service-card, .p-4, .hero h1, .hero p, #cardapio .p-4, .local-box'
);

function fadeInOnScroll(){
    const windowH = window.innerHeight;
    fadeElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if(rect.top < windowH - 60){
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

document.querySelectorAll('.card, .service-card, #cardapio .p-4').forEach(card=>{
    card.addEventListener('mouseenter', ()=> {
        card.style.boxShadow = '0 16px 32px rgba(0,0,0,0.10)';
        card.style.transform = 'translateY(-8px)';
    });
    card.addEventListener('mouseleave', ()=> {
        card.style.boxShadow = '';
        card.style.transform = '';
    });
});

(function(){
    const loginBtn = document.getElementById('loginBtn');
    const loginDropdown = document.getElementById('loginDropdown');

    if(!loginBtn || !loginDropdown) return;

    loginBtn.addEventListener('click', function(e){
        e.stopPropagation();
        const isOpen = loginDropdown.style.display === 'block';
        loginDropdown.style.display = isOpen ? 'none' : 'block';
    });

    document.addEventListener('click', () => {
        loginDropdown.style.display = 'none';
    });

    loginDropdown.addEventListener('click', e => e.stopPropagation());
})();

(function(){
    try {
        const carouselEl = document.querySelector('#carouselLojas');
        if(carouselEl && bootstrap && bootstrap.Carousel){
            new bootstrap.Carousel(carouselEl, {
                interval: 2500,
                ride: 'carousel',
                pause: false,
                touch: true
            });
        }
    } catch(err) {
        console.warn('Carousel init skipped:', err);
    }
})();
