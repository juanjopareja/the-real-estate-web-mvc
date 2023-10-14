<main class="container section">
    <h1>Actualizar Propiedad</h1>

    <?php foreach($errors as $error) { ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <a href="/admin" class="button green-button">Volver</a>

    <form class="form" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/form.php'; ?>

        <input type="submit" value="Actualizar Propiedad" class="button green-button">
    </form>
</main>