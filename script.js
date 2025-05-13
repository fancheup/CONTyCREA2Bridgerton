document.addEventListener('DOMContentLoaded', function() {
    // Manejar el formulario de suscripción
    const subscriptionForm = document.getElementById('subscription-form');
    
    if (subscriptionForm) {
        subscriptionForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = this.querySelector('input[type="email"]');
            const email = emailInput.value.trim();
            
            if (email) {
                // Aquí puedes agregar código para enviar el email a tu backend
                // o servicio de mailing como Mailchimp
                alert(`¡Gracias por suscribirte con el email: ${email}! Te mantendremos informado sobre todas las novedades de Bridgerton.`);
                emailInput.value = '';
            }
        });
    }
    
    // Efecto de hover 
    const navLinks = document.querySelectorAll('nav a');
    
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.color = '#d7ccc8';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.color = '#fff';
        });
    });
});