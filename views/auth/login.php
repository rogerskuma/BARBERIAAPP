<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina"> Inicia sesión con tus datos</p>

<form class="formulario" method="POST" action="/">

    <div class="campo">

        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            placeholder="tu email"
            name="email"
        />
    </div>
<div class="campo">

        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            placeholder="tu password"
            name="password"
        />       
    </div>
    <input type="submit" class="boton"  value="Iniciar Sesión"/>
</form>


<div class="acciones">
    <a href="/crear-cta">Crea Tu Cuenta</a>
    <a href="/olvide">Recuperación de Password</a>
</div> 