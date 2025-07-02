document.addEventListener('DOMContentLoaded', function () {
    // Adicionar indicadores visuais para navegação por teclado
    const links = document.querySelectorAll('a, button');
    links.forEach(link => {
        link.addEventListener('focus', function () {
            this.style.outline = '2px solid #FA7426';
            this.style.outlineOffset = '2px';
        });

        link.addEventListener('blur', function () {
            this.style.outline = '';
            this.style.outlineOffset = '';
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Animação suave para elementos que entram na viewport
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Aplicar animação aos cards
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // Contador animado para estatísticas
    const counters = document.querySelectorAll('.display-6');
    counters.forEach(counter => {
        const target = parseInt(counter.textContent.replace(/\D/g, ''));
        const isDecimal = counter.textContent.includes('.');
        let current = 0;
        const increment = target / 100;

        const updateCounter = () => {
            if (current < target) {
                current += increment;
                if (isDecimal) {
                    counter.textContent = (current / 10).toFixed(1);
                } else {
                    counter.textContent = Math.ceil(current) + '+';
                }
                requestAnimationFrame(updateCounter);
            } else {
                if (isDecimal) {
                    counter.textContent = '4.8';
                } else {
                    counter.textContent = target + '+';
                }
            }
        };

        // Iniciar animação quando o elemento estiver visível
        observer.observe(counter.closest('.card'));
        setTimeout(() => {
            if (counter.closest('.card').style.opacity === '1') {
                updateCounter();
            }
        }, 500);
    });
});
