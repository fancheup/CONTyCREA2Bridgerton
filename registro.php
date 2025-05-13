<?php
session_start();
$error = '';

// Configuración de la base de datos
$host = 'localhost';  
$dbname = 'bridgeton_fans'; 
$user = 'root';       
$pass = '';           

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Validar email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Correo electrónico no válido.";
        } else {
            // Verificar si el email ya existe
            $stmt = $db->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->fetch()) {
                $error = "Este correo ya está registrado.";
            } else {
                // Hash de la contraseña
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insertar nuevo usuario
                $stmt = $db->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
                $stmt->execute([$email, $hashed_password]);
                
                $_SESSION['user_email'] = $email;
                header("Location: ../php/index.php");
                exit();
            }
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
    <title>Registro | Bridgeton</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="../php/index.php" class="home-logo">
                <i class="fas fa-home"></i>
            </a>
            <h1>Unirse a la alta sociedad</h1>
        </div>
    </header>

    <main>
        <section class="subscription-section" style="max-width: 500px; margin: 2rem auto; padding: 2rem;">
            <?php if ($error): ?>
                <p class="error-message" style="color: #c2185b; text-align: center;"><?php echo $error; ?></p>
            <?php endif; ?>
            
            <form method="POST" action="registro.php">
                <input type="email" name="email" placeholder="Ej: daphne@ton.com" required>
                <input type="password" name="password" placeholder="Contraseña (mínimo 8 caracteres)" minlength="8" required>
                <button type="submit">Registrarse</button>
            </form>
            
            <p style="text-align: center; margin-top: 1rem;">
                ¿Ya tienes cuenta? <a href="login.php" style="color: #8d678b;">Inicia sesión aquí</a>
            </p>
        </section>
    </main>

    <footer>
        <p>Fanpage no oficial de Bridgerton. No afiliada a Netflix ni Shondaland.</p>
    </footer>
</body>
</html>