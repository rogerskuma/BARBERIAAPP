<div class="barra">
    <p>Bienvenid@: <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if(isset($_SESSION['admin'] )) { ?>
    <div class="barra-servicios">
    <a class="boton" href="/admin">Citas</a>
    <a class="boton" href="/servicios">Servicios</a>
    <a class="boton" href="/servicios/crear">Nuevo Servicio</a>


    </div>

<?php } ?>