<h1 class="nombre-pagina" >Administrador</h1>
<p class="descripcion-pagina">De Servicios</p>

<?php 
    include_once __DIR__ . '/../templates/barra.php';

?>

<ul class="servicios">
        <?php foreach($servicios as $servicio) { ?>
            <li>
                    <p>Nombre: <span><?php echo $servicio->nombre; ?></span> </p>
                    <p>precio: <span>$<?php echo $servicio->precio; ?> mx</span> </p>

                    <div class="acciones">
                            <a class="boton" href="/servicios/actualizar?id=<?php echo $servicio->id; ?>">Actualizar</a>

                            <form action="/servicios/eliminar" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">

                                    <input type="submit" value="Borrar" class="boton-eliminar">
                            </form>
                    </div>

                </li>
            <?php } ?>
</ul>