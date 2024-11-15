<?php 
    // Check if $alertas is set and is an array
    if (isset($alertas) && is_array($alertas)) {
        foreach ($alertas as $key => $mensajes):
            if (is_array($mensajes)): // Ensure $mensajes is also an array
                foreach ($mensajes as $mensaje):
?>
    <div class="alerta <?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?>
    </div>
<?php
                endforeach;
            endif;
        endforeach;
    } else {
        echo '<div class="alerta error">No hay alertas</div>'; // Fallback in case $alertas is not valid
    }
?>
