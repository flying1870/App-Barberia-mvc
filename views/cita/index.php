
    <h1 class="nombre-pagina">Hacer tu Cita</h1>
    <p class="descripcion-pagina">Introduce Tus Datos</p>

    <?php 

        include_once __DIR__ . '/../templates/barra.php';
    
    ?>

    <!-- Contenedor de la aplicación -->
    <div id="app">
        <!-- Navegación entre secciones -->
        <nav class="tabs">
            <button class="actual" type="button" data-paso="1">Servicios</button>
            <button type="button" data-paso="2">Información de Cita</button>
            <button type="button" data-paso="3">Resumen</button>
        </nav>

        <!-- Sección 1: Servicios -->
        <div id="paso-1" class="seccion mostrar">
            <h2>Servicios</h2>
            <p class="text-center">Elige los servicios que deseas</p>
            <div id="servicios" class="listado-servicios"></div> <!-- Los servicios se cargarán dinámicamente -->
        </div>

        <!-- Sección 2: Información de la Cita -->
        <div id="paso-2" class="seccion">
            <h2>Crea tu Cita</h2>
            <p class="text-center">A continuación selecciona Servicios</p>
            
            <form class="formulario">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input 
                        id="nombre"
                        type="text"
                        placeholder="Tu Nombre"
                    />
                </div>

                <div class="campo">
                    <label for="email">E-mail</label>
                    <input 
                        id="email"
                        type="email" 
                        placeholder="Tu Email"
                    />
                </div>

                <div class="campo">
                    <label for="fecha">Fecha</label>
                    <input 
                        id="fecha"
                        type="date"
                    />
                </div>

                <div class="campo">
                    <label for="hora">Hora</label>
                    <input
                        id="hora" 
                        type="time"
                    />
                </div>
                <!-- ID oculto para el cliente -->
                <input type="hidden" id="id" value="<?php echo $id; ?>"> 
            </form>
        </div>

        <!-- Sección 3: Resumen -->
        <div id="paso-3" class="seccion">
            <h2>Resumen</h2>
            <p class="text-center">Verifica que tus datos sean correctos</p>
            
            <!-- Contenedor donde se cargará el resumen dinámico -->
            <div class="container-resumen"></div> 
        </div>

        <!-- Navegación entre pasos -->
        <div class="paginacion">
            <button 
                id="anterior" 
                class="boton ocultar"
            >&laquo; Anterior</button>
            
            <button 
                id="siguiente"
                class="boton"
            >Siguiente &raquo;</button>
        </div>
    </div>

    <!-- Enlace al archivo JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="build/js/app.js"></script>

    <script>
        // Configura el valor mínimo para el campo de fecha dinámicamente
        document.addEventListener('DOMContentLoaded', () => {
            const fechaInput = document.querySelector('#fecha');
            const hoy = new Date().toISOString().split('T')[0];
            fechaInput.setAttribute('min', hoy);
        });
    </script>
