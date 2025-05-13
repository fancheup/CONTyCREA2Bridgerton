<?php
session_start();

// Verificar sesión activa
if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
} else {
    $user_email = null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos al mundo Bridgerton</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="../php/index.php" class="home-logo">
                <i class="fas fa-home"></i>
            </a>
            <h1>Bienvenidos al mundo Bridgerton</h1>
                </a>
            <?php if ($user_email): ?>
                <div class="user-info">
                    <span><?php echo htmlspecialchars($user_email); ?></span>
                    <a href="logout.php" class="logout-btn">(Salir)</a>
                </div>
            <?php else: ?>
                <a href="registro.php" class="login-logo">
                    <i class="fas fa-user"></i>
                </a>
            <?php endif; ?>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="../html/historia.html">Historia</a></li>
            <li><a href="../html/personajes.html">Personajes</a></li>
            <li><a href="../html/episodios.html">Episodios</a></li>
            <li><a href="../html/novedades.html">Novedades</a></li>
            <li><a href="../php/suscripcion.php">Suscripción</a></li>
        </ul>
    </nav>

    <main>
        <section class="welcome-section">
            <p>En esta web vas a encontrar toda la información sobre la serie Bridgerton que estés buscando! Desde la historia original de las novelas de Shonda, la información de los personajes y episodios, y hasta las novedades confirmadas y rumoreadas de las próximas temporadas.</p>
        </section>

        <section class="subscription-section">
            <h2>¡Únete a nuestra familia!</h2>
            <p>En este lugar somos todos parte de la familia Bridgerton, y por eso nos encantaría que te suscribieras, para no perderte ninguna novedad, te esperamos con entusiasmo.</p>
            <form id="subscription-form">
                <input type="email" placeholder="Ingresa tu email" required>
                <button type="submit">Suscribirse</button>
            </form>
        </section>

        <img src="../imagenes/banner.png"> 
    </main>

    <footer>
        <p>Fanpage no oficial de Bridgerton. No afiliada a Netflix ni Shondaland.</p>
        <p>Todos los derechos pertenecen a sus respectivos dueños.</p>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>