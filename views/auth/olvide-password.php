<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina"> Restablece password escribieno tu mail</p>

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