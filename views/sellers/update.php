<main class="container section">
    <h1>Actualizar Vendedores</h1>

    <a href="/admin" class="button green-button">Volver</a>

    <?php foreach($errors as $error) { ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form class="form" method="POST">
        <?php include 'form.php'; ?>

        <input type="submit" value="Guardar Cambios" class="button green-button">
    </form>
</main>