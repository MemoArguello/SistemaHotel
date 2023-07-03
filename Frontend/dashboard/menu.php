<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="../../Frontend/IMG/logo.svg" alt="">
        </div>

        <span class="logo_name">HOTEL</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="./index.php">
                    <i class="uil uil-calendar-alt"></i>
                    <span class="link-name">Reservas</span>
                </a></li>
            <li><a href="../admin/listado/form_habitaciones.php">
                    <i class="uil uil-bed"></i>
                    <span class="link-name">Habitación</span>
                </a></li>
            <li><a href="../reportes.php">
                    <i class="uil uil-file-graph"></i>
                    <span class="link-name">Reportes</span>
                </a></li>
            <li><a href="../producto/listado_productos.php">
                    <i class="uil uil-coffee"></i>
                    <span class="link-name">Productos</span>
                </a></li>
            <li><a href="../ventas/ventas.php">
                    <i class="uil uil-usd-circle"></i>
                    <span class="link-name">Venta</span>
                </a></li>
            <li><a href="../reportes_caja.php">
                    <i class="uil uil-money-withdrawal"></i>
                    <span class="link-name">Caja</span>
                </a></li>
            <li><a href="../admin/listado/form_cuentas.php">
                    <i class="uil uil-setting"></i>
                    <span class="link-name">Configuración</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a>
                    <i class="uil uil-user"></i>
                    <span class="link-name"><?php echo "Usuario: $usuario"; ?></span>
                </a>
            </li>
            <li><a href="../cerrar_sesion.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Cerrar Sesión</span>
                </a></li>
        </ul>
    </div>
</nav>
