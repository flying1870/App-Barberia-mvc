<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Iniciar Sesión</p>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email" 
            name="email"
            placeholder="Tu Email" 
            id="email"
            autocomplete="username"
            required
        /> 
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password" 
            name="password"
            placeholder="Tu Password" 
            id="password"
            autocomplete="current-password"
            required
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesión">
</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
    <a href="/olvide">¿Olvidaste tu Password?</a>
</div>
