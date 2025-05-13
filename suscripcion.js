document.addEventListener('DOMContentLoaded', function() {
    // Galería de imágenes
    const imagenes = document.querySelectorAll('.galeria-img');
    const contador = document.querySelector('.contador');
    const btnAnterior = document.querySelector('.anterior');
    const btnSiguiente = document.querySelector('.siguiente');
    let indiceActual = 0;

    // Mostrar primera imagen al cargar
    actualizarGaleria();

    // Funciones
    function actualizarGaleria() {
        imagenes.forEach((img, index) => {
            img.classList.toggle('active', index === indiceActual);
        });
        contador.textContent = `${indiceActual + 1}/${imagenes.length}`;
    }

    // Event listeners
    btnAnterior.addEventListener('click', () => {
        indiceActual = (indiceActual - 1 + imagenes.length) % imagenes.length;
        actualizarGaleria();
    });

    btnSiguiente.addEventListener('click', () => {
        indiceActual = (indiceActual + 1) % imagenes.length;
        actualizarGaleria();
    });

    // Navegación con teclado
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') btnAnterior.click();
        if (e.key === 'ArrowRight') btnSiguiente.click();
    });

    // Formulario
    const formulario = document.getElementById('form-suscripcion');
    formulario.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('¡Gracias por suscribirte! Te mantendremos informado.');
        this.reset();
    });
});