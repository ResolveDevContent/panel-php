<input type="checkbox" id="display-menu" checked>
<aside class='menu'>
    <div class='d-flex align-center display-menu'>
        <label for="display-menu" class="d-flex">
            <i class="icon h-menu"></i>
        </label>
    </div>
    <header class='text-center'>
        <div class='d-flex align-center'>
            <a href="/panel-php/panel/user.php" class="user d-flex align-center">
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
        <ul class="d-flex flex-col">
            <li class='categoria d-flex flex-col'>
                <a href="tienda.php">
                    <span>Tienda</span>
                </a>
            </li>
            <li class='categoria d-flex flex-col'>
                <a href="/panel-php/panel/products/productos.php">
                    <span>Productos</span>
                </a>
            </li>
        </ul>
    </div>
</aside>