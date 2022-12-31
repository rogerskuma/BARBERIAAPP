<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina"> Restablece password escribiendo tu E-mail</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<form class="formulario" action="/olvide" method="POST" >
    <div class="campo">
            <label for="email">E-mail</label>
            <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Tu E-mail"
            />
    </div>

    <input type="submit" class="boton" value="Enviar Instrucciones">

</form>

<div class="acciones">
    <a href="/">Ya tienes una cuenta, inicia sesión</a>
    <a href="/crear-cta">Crea tu cuenta</a>
</div> 