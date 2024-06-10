<input type="checkbox" id="display-menu">
<aside class='menu'>
    <div class='d-flex align-center display-menu'>
        <label for="display-menu">
            <i class="icon h-menu"></i>
        </label>
    </div>
    <header class='text-center'>
        <div class='d-flex align-center'>
            <a href="/panel-php/panel/user.php" class="user">
                <div class="user-img"></div>
                <span>
                    <?php
                        echo $_COOKIE['usuarioLogeado'];
                    ?>
                </span>
            </a>
            <a href="/panel-php/panel/logout.php">
                <i class="icon turn-off"></i>
            </a>
        </div>
    </header>
    <div>
        <ul>
            <li class='categoria'>
                <a href="tienda.php">
                    <span>Tienda</span>
                </a>
            </li>
            <li class='categoria'>
                <a href="/panel-php/panel/products/productos.php">
                    <span>Productos</span>
                </a>
            </li>
        </ul>
    </div>
</aside>