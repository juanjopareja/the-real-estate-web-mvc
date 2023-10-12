<?php 

    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if(!isset($start)) {
        $start = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Real Estate</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $start ? 'start' : ''; ?>">
        <div class="container header-content">
            <div class="bar">
                <a href="/the-real-estate-web/index.php">
                    <img src="../build/img/logo.svg" alt="imagen logo">
                </a>

                <div class="mobile-menu">
                    <img src="../build/img/bars.svg" alt="icono menú responsive">
                </div>

                <div class="right-side">
                    <img class="dark-mode-button" src="../build/img/dark-mode.svg" alt="dark mode">

                    <nav class="navigation">
                        <a href="about.php">Nosotros</a>
                        <a href="advertisements.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contact.php">Contacto</a>
                        <?php if($auth) { ?>
                            <a href="/the-real-estate-web/close-session.php">Cerrar sesión</a>
                        <?php } ?>
                    </nav>
                </div>

            </div><!-- .bar -->

            <?php if($start) { ?>
                <h1>Venta de Casas y Apartamentos exclusivos de lujo</h1>
            <?php } ?>
        </div>
    </header>

    <?php echo $content; ?>

    <footer class="footer section">
        <div class="container footer-content">
            <nav class="navigation">
                <a href="about.php">Nosotros</a>
                <a href="advertisements.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contact.php">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>
</html>