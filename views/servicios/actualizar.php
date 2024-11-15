<h1 class="nombre-pagina">Actualizar Servicio</h1>
<p class="descripcion-pagina">Administración de servicios</p>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
?>

<form method="POST" action="/servicios/actualizar?id=<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>" class="formulario">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
            type="text" 
            id="nombre" 
            name="nombre" 
            placeholder="Nombre Servicio" 
            value="<?php echo htmlspecialchars($servicio->nombre ?? ''); ?>"
        >
    </div>

    <div class="campo">
        <label for="precio">Precio</label>
        <input 
            type="text" 
            id="precio" 
            name="precio" 
            placeholder="Precio Servicio" 
            value="<?php echo htmlspecialchars($servicio->precio ?? ''); ?>"
        >
    </div>

    <input type="submit" class="boton" value="Actualizar">
</form>
