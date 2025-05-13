document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    let currentIndex = 2; // Empezar con el elemento central
    
    // Centrar el carrusel al cargar
    updateCarousel();
    
    // Event listeners para los botones
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        updateCarousel();
    });
    
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel();
    });
    
    // Función para actualizar el carrusel
    function updateCarousel() {
        // Remover clase center-item de todos
        items.forEach(item => item.classList.remove('center-item'));
        
        // Calcular índices para mostrar
        const visibleIndices = [
            (currentIndex - 2 + items.length) % items.length,
            (currentIndex - 1 + items.length) % items.length,
            currentIndex % items.length,
            (currentIndex + 1) % items.length,
            (currentIndex + 2) % items.length
        ];
        
        // Mostrar solo 5 elementos (2 a la izquierda, centro, 2 a la derecha)
        items.forEach((item, index) => {
            if (visibleIndices.includes(index)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
        
        // Añadir clase center-item al elemento actual
        items[currentIndex].classList.add('center-item');
        
        // Mover el carrusel
        const offset = -currentIndex * 25 + 25; // Ajuste para centrar
        carousel.style.transform = `translateX(${offset}%)`;
    }
    
    // Opcional: navegación con teclado
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevBtn.click();
        } else if (e.key === 'ArrowRight') {
            nextBtn.click();
        }
    });
});