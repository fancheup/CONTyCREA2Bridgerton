<?php
session_start();
$error = '';

// Configuración de la base de datos
$host = 'localhost';
$dbname = 'bridgerton_fans';
$user = 'root';
$pass = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $stmt = $db->prepare("SELECT id, email, password FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            header("Location: ../index.php");
            exit();
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    }
} catch (PDOException $e) {
    $error = "Error de conexión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión | Bridgerton</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="../php/index.php" class="home-logo">
                <i class="fas fa-home"></i>
            </a>
            <h1>Bienvenido de vuelta</h1>
        </div>
    </header>

    <main>
        <section class="subscription-section" style="max-width: 500px; margin: 2rem auto; padding: 2rem;">
            <?php if ($error): ?>
                <p class="error-message" style="color: #c2185b; text-align: center;"><?php echo $error; ?></p>
            <?php endif; ?>
            
            <form method="POST" action="login.php">
                <input type="email" name="email" placeholder="Tu correo registrado" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Ingresar</button>
            </form>
            
            <p style="text-align: center; margin-top: 1rem;">
                ¿No tienes cuenta? <a href="registro.php" style="color: #8d678b;">Regístrate aquí</a>
            </p>
        </section>
    </main>

    <footer>
        <p>Fanpage no oficial de Bridgerton. No afiliada a Netflix ni Shondaland.</p>
    </footer>
</body>
</html>