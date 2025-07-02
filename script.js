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