<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Introduce un nuevo password</p>

<?php 

    include_once __DIR__ . '/../templates/alertas.php'; 

?>

<form class="formulario" method="POST"> 
    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password" 
            name="password"
            placeholder="Tu Nuevo Password"
            />
    </div>
    <input type="submit" class="boton" value="Guardar Nuevo Password">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Iniciar Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes cuenta? Crea una</a>
</div>