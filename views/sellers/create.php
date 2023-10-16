<main class="container section">
    <h1>Registrar Vendedores</h1>

    <a href="/admin" class="button green-button">Volver</a>

    <?php foreach($errors as $error) { ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form class="form" method="POST" action="../sellers/create.php">
        <?php include 'form.php'; ?>

        <input type="submit" value="Registrar Vendedor/a" class="button green-button">
    </form>
</main>
