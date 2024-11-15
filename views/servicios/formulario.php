<h1 class="nombre-pagina">Servicios</h1>
<p class="descripcion-pagina">Modificar formulario</p>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
?>

<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text"
    id="nombre"
    placeholder="Nombre Servicio"
    name="nombre"
    value="<?php echo $servicio->nombre; ?>"
    />
</div>

<div class="campo">
    <label for="precio">Precio</label>
    <input type="number"
    id="precio"
    placeholder="Precio Servicio"
    name="precio"
    value="<?php echo $servicio->precio; ?>"
    />
</div>