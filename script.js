/**
 * TRUSTWORK - SCRIPTS PRINCIPAIS
 * 
 * Este arquivo combina:
 * 1. Sistema de busca e filtragem de serviços
 * 2. Melhorias de acessibilidade e UX
 * 3. Animações e efeitos visuais
 * 
 * Organizado em módulos lógicos para fácil manutenção
 */

document.addEventListener('DOMContentLoaded', function() {
    // =============================================
    // MÓDULO DE ACESSIBILIDADE
    // =============================================
    function initAccessibility() {
        // Adicionar indicadores visuais para navegação por teclado
        const interactiveElements = document.querySelectorAll('a, button, [tabindex]');
        
        interactiveElements.forEach(element => {
            element.addEventListener('focus', function() {
                this.style.outline = '2px solid #FA7426';
                this.style.outlineOffset = '2px';
            });

            element.addEventListener('blur', function() {
                this.style.outline = '';
                this.style.outlineOffset = '';
            });
        });

        console.log('Acessibilidade: Indicadores de foco ativados');
    }

    // =============================================
    // MÓDULO DE ANIMAÇÕES
    // =============================================
    function initAnimations() {
        // Configurações das animações
        const animationConfig = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px',
            transition: 'opacity 0.6s ease, transform 0.6s ease'
        };

        // Observador de interseção para animações
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    
                    // Verifica se é um contador para animar
                    if (entry.target.querySelector('.display-6')) {
                        animateCounter(entry.target.querySelector('.display-6'));
                    }
                }
            });
        }, animationConfig);

        // Aplicar animação aos cards
        const animatedElements = document.querySelectorAll('.card, .result-card');
        animatedElements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = animationConfig.transition;
            observer.observe(element);
        });

        console.log('Animações: Efeitos de entrada ativados');
    }

    // Função para animar contadores
    function animateCounter(counter) {
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
                counter.textContent = isDecimal ? target / 10 + '.0' : target + '+';
            }
        };

        setTimeout(updateCounter, 300);
    }

    // =============================================
    // MÓDULO DE BUSCA
    // =============================================
    function initSearch() {
        // Elementos da DOM
        const searchForm = document.getElementById('search-form');
        const searchInput = document.getElementById('search-input');
        const resultsContainer = document.getElementById('results-container');
        const loadingState = document.getElementById('loading-state');
        const emptyState = document.getElementById('empty-state');
        const resultsCount = document.getElementById('results-count');
        const suggestionBtns = document.querySelectorAll('.suggestion-btn');

        // Inicializa os event listeners
        function setupEventListeners() {
            // Sugestões rápidas
            suggestionBtns.forEach(btn => {
                btn.addEventListener('click', handleSuggestionClick);
            });
            
            // Pesquisa no formulário
            if (searchForm) {
                searchForm.addEventListener('submit', handleSearchSubmit);
            }
            
            // Pesquisa em tempo real
            if (searchInput) {
                searchInput.addEventListener('input', handleSearchInput);
            }
            
            // Filtros
            const filters = document.querySelectorAll('#advanced-filters select');
            filters.forEach(filter => {
                filter.addEventListener('change', performSearch);
            });
        }

        // Handlers de eventos
        function handleSuggestionClick(e) {
            const searchTerm = e.currentTarget.dataset.search;
            searchInput.value = searchTerm;
            performSearch();
        }

        function handleSearchSubmit(e) {
            e.preventDefault();
            performSearch();
        }

        function handleSearchInput() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                if (this.value.length >= 2) {
                    performSearch();
                }
            }, 500);
        }

        // Lógica principal de busca
        function performSearch() {
            const searchTerm = searchInput.value.toLowerCase();
            const priceRange = document.getElementById('price-range')?.value;
            const ratingFilter = document.getElementById('rating-filter')?.value;
            const sortBy = document.getElementById('sort-by')?.value;
            
            showLoading();
            
            setTimeout(() => {
                const results = filterResults(searchTerm, priceRange, ratingFilter);
                const sortedResults = sortResults(results, sortBy);
                displayResults(sortedResults);
            }, 800);
        }

        // Funções auxiliares
        function showLoading() {
            if (resultsContainer) resultsContainer.style.display = 'none';
            if (emptyState) emptyState.style.display = 'none';
            if (loadingState) loadingState.style.display = 'block';
        }

        function filterResults(searchTerm, priceRange, ratingFilter) {
            const allResults = document.querySelectorAll('.result-card');
            const filteredResults = [];
            
            allResults.forEach(result => {
                const category = result.dataset.category;
                const price = parseInt(result.dataset.price);
                const rating = parseFloat(result.dataset.rating);
                
                const matchesSearch = !searchTerm || category.includes(searchTerm);
                const matchesPrice = !priceRange || checkPriceRange(price, priceRange);
                const matchesRating = !ratingFilter || rating >= parseFloat(ratingFilter);
                
                if (matchesSearch && matchesPrice && matchesRating) {
                    filteredResults.push(result);
                }
            });
            
            return filteredResults;
        }

        function checkPriceRange(price, range) {
            switch(range) {
                case '0-50': return price <= 50;
                case '50-100': return price > 50 && price <= 100;
                case '100-200': return price > 100 && price <= 200;
                case '200+': return price > 200;
                default: return true;
            }
        }

        function sortResults(results, sortBy) {
            return [...results].sort((a, b) => {
                switch(sortBy) {
                    case 'price-low': return parseInt(a.dataset.price) - parseInt(b.dataset.price);
                    case 'price-high': return parseInt(b.dataset.price) - parseInt(a.dataset.price);
                    case 'rating': return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
                    default: return 0;
                }
            });
        }

        function displayResults(results) {
            if (loadingState) loadingState.style.display = 'none';
            
            if (!resultsContainer || !emptyState || !resultsCount) return;
            
            if (results.length === 0) {
                resultsContainer.style.display = 'none';
                emptyState.style.display = 'block';
                resultsCount.textContent = '0 resultados encontrados';
            } else {
                emptyState.style.display = 'none';
                resultsContainer.style.display = 'block';
                resultsCount.textContent = `${results.length} resultado${results.length > 1 ? 's' : ''} encontrado${results.length > 1 ? 's' : ''}`;
                
                resultsContainer.innerHTML = '';
                results.forEach(result => {
                    const clone = result.cloneNode(true);
                    // Reativar event listeners nos botões de contato
                    const contactBtn = clone.querySelector('.contact-btn');
                    if (contactBtn) {
                        contactBtn.addEventListener('click', () => {
                            alert('Funcionalidade de contato será implementada em breve!');
                        });
                    }
                    resultsContainer.appendChild(clone);
                });
            }
        }

        // Inicialização
        setupEventListeners();
        console.log('Busca: Sistema de pesquisa inicializado');
    }

    // =============================================
    // INICIALIZAÇÃO DOS MÓDULOS
    // =============================================
    initAccessibility();
    initAnimations();
    
    // Só inicializa o módulo de busca se existirem os elementos necessários
    if (document.getElementById('search-form')) {
        initSearch();
    } else {
        console.log('Busca: Elementos não encontrados - módulo não carregado');
    }
});