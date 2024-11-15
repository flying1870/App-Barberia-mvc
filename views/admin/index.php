<h1 class="nombre-pagina">Panel de Administración</h1>

<?php include_once __DIR__ . '/../templates/barra.php'; ?>

<h2>Buscar Citas</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input 
                type="date"
                id="fecha"
                name="fecha"
                value="<?php echo htmlspecialchars($fecha); ?>"
            />
        </div>
    </form> 
</div>

<div id="citas-admin">
    <ul class="citas">
        <?php if (!empty($citas)): ?>
            <?php foreach ($citas as $key => $cita): 
                    if ($idcita !== $cita->idcita);
                        $total = 0;
                ?>
                <li>
                    <p>ID: <span><?php echo htmlspecialchars($cita->id); ?></span></p>
                    <p>Hora: <span><?php echo htmlspecialchars($cita->hora); ?></span></p>
                    <p>Cliente: <span><?php echo htmlspecialchars($cita->cliente); ?></span></p>
                    <p>Email: <span><?php echo htmlspecialchars($cita->email); ?></span></p>
                    <p>Teléfono: <span><?php echo htmlspecialchars($cita->telefono); ?></span></p>
                    <p>Servicio: <span><?php echo htmlspecialchars($cita->servicio); ?></span></p>
                    <p>Precio: <span><?php echo htmlspecialchars($cita->precio); ?></span></p>

                    <h3>Servicios</h3>

                    <?php 
                        $idCita = $cita->id;
                        $total += $cita->precio;
                    
                 ?>
                <P class="servicio"><?php echo $cita->servicio . " " . $cita->precio; ?></P>

                <?php 
                    $actual = $cita->id;
                    $proximo = $citas[$key + 1]->id ?? 0;

                    if($esUltimo($actual, $proximo)) { ?>
                        <p class="total">Total: <span>$ <?php echo $total; ?></span</p>

                        <form  action="/api/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo $idCita->id; ?>">

                            <input type="submit" class="boton-eliminar"
                            value="Eliminar">
                        </form>
                    <?php } ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay citas para la fecha seleccionada.</p>
        <?php endif; ?>
    </ul>
</div>

<?php 
    $script = "<script src='build/js/buscador.js'></script>"
?>
