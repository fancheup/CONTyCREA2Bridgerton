<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripción | Bridgerton</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/suscripcion.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
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
            <a href="../php/index.php" class="login-logo">
                <i class="fas fa-user"></i>
            </a>
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

    <main class="suscripcion-container">
        <section class="formulario-suscripcion">
            <div class="wax-seal">
                <i class="fas fa-crown"></i>
            </div>
            
            <h2>Únete a la Sociedad Bridgerton</h2>
            
     <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <div class="success-message">
                    <p>¡Gracias por suscribirte! <?php echo htmlspecialchars($_POST["nombre"]); ?><br>Tu invitación a la alta sociedad está en camino. </p>
                </div>
            <?php endif; ?>
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="nombre" name="nombre" required placeholder="Ej: Daphne">
                </div>
                
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <i class="fas fa-scroll input-icon"></i>
                    <input type="text" id="apellido" name="apellido" required placeholder="Ej: Bridgerton">
                </div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" required placeholder="Ej: daphne@ton.com">
                </div>
                
                <button type="submit" class="btn-suscripcion bridgerton-btn">Enviar Invitación</button>
            </form>
        </section>

<section class="galeria-suscripcion">
            <h2>Galería Exclusiva</h2>
            <div class="imagen-galeria">
                <img src="../imagenes/galeria1.jpg.png" alt="Imagen 1" class="galeria-img active">
                <img src="../imagenes/galeria2.jpg.png" alt="Imagen 2" class="galeria-img">
                <img src="../imagenes/galeria3.jpg.png" alt="Imagen 3" class="galeria-img">
                <div class="galeria-controles">
                    <button class="galeria-btn anterior">◀</button>
                    <span class="contador">1/5</span>
                    <button class="galeria-btn siguiente">▶</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <a href="../php/index.php" class="home-link">Volver al Inicio</a>
            <p>Fanpage no oficial de Bridgerton. No afiliada a Netflix ni Shondaland.</p>
            <p>Todos los derechos pertenecen a sus respectivos dueños.</p>
        </div>
    </footer>

    <script src="../js/suscripcion.js"></script>
</body>
</html>