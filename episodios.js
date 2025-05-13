document.addEventListener('DOMContentLoaded', function() {
    // Mostrar/ocultar temporadas (toggle)
    const temporadaBtns = document.querySelectorAll('.temporada-btn');
    
    temporadaBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const temporadaId = this.getAttribute('data-temporada');
            const episodiosList = document.getElementById(`temporada-${temporadaId}`);
            
            // Alternar visibilidad de esta temporada
            episodiosList.classList.toggle('active');
            this.classList.toggle('active');
            
            // Cambiar el ícono (▼/▲)
            if (episodiosList.classList.contains('active')) {
                this.innerHTML = this.innerHTML.replace('▼', '▲');
            } else {
                this.innerHTML = this.innerHTML.replace('▲', '▼');
            }
        });
    });
    
    // Abrir primera temporada por defecto
    const primeraTemporada = document.querySelector('.temporada-btn');
    if (primeraTemporada) {
        primeraTemporada.click();
    }
    
    // Efecto hover para episodios
    const episodios = document.querySelectorAll('.episodio');
    episodios.forEach(ep => {
        ep.addEventListener('mouseenter', function() {
            const desc = this.getAttribute('data-descripcion');
            this.querySelector('.descripcion').textContent = desc;
        });
    });
});