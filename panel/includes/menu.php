<input type="checkbox" id="display-menu">
<aside class='menu'>
    <div class='d-flex align-center display-menu'>
        <label for="display-menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
            </svg>
        </label>
    </div>
    <header class='text-center'>
        <div class='d-flex align-center'>
            <a href="/panel/user.php" class="user">
                <div class="user-img"></div>
                <span>
                    <?php
                        echo $_COOKIE['usuarioLogeado'];
                    ?>
                </span>
            </a>
            <a href="/panel/logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z"></path>
                    <path d="M11 2h2v10h-2z"></path>
                </svg>
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