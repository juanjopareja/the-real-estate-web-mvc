<main class="container section">
    <h1>Administrador de The Real Estate</h1>

    <?php
        if($result) {
            $message = showMessages(intval($result));
            
            if($message) { ?>
                <p class="alert success"><?php echo sanitizer($message) ?></p>
    <?php }} ?>
        
    <a href="/properties/create" class="button green-button">Nueva Propiedad</a>
    <a href="../admin/sellers/create.php" class="button yellow-button">Nuevo/a Vendedor/a</a>

    <h2>Propiedades</h2>

    <table class="properties">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Show results -->
            <?php foreach($properties as $property) { ?>
            <tr>
                <td><?php echo $property->id; ?></td>
                <td><?php echo $property->title; ?></td>
                <td><img src="../images/<?php echo $property->image;?>" class="table-image" alt="hola"></td>
                <td><?php echo $property->price; ?> €</td>
                <td>
                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $property->id?>">    
                        <input type="hidden" name="type" value="property">    

                        <input type="submit" class="red-button-block" value="Eliminar">
                    </form>

                    <a href="../admin/properties/update.php?id=<?php echo $property->id; ?>" class="yellow-button-block">Actualizar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</main>