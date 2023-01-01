<h1 class="nombre-página">Crear nueva Cita</h1>
<p class="descripcion-pagina">Elige tus servicios y coloca tus datos</p>

<div id="app">
    <div id="paso-1"  class="seccion">
        <h2>Servicios</h2>
        <p>Elige tus servicios a continuación</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>
    <div id="paso-2"  class="seccion">
        <h2>Tus Datos y Cita</h2>
        <p>Coloca tus datos y fecha de tu cita</p>
    <form class="formulario">
        <div class="campo">
                <label for="nombre">Nombre:</label>
                <input  
                    id="nombre"
                    type="text"
                    placeholder="Tu Nombre"
                    value="<?php echo $nombre; ?>"
                    disabled
                    />
        </div>
        <div class="campo">
                <label for="Fecha">Fecha:</label>
                <input  
                    id="fecha"
                    type="date"
                    />
        </div>
        <div class="campo">
                <label for="hora">Hora:</label>
                <input  
                    id="hora"
                    type="time"
                    />
        </div>

    </form>


        <div id="datosycita" class="listado-servicios"></div>
    </div>
    <div id="paso-3"  class="seccion">
        <h2>Resumen</h2>
        <p>Verifica que la información sea correcta</p>
        <div id="resumen" class="listado-servicios"></div>
    </div>
</div>