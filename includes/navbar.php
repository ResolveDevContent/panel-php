<nav id="navbar" class="d-flex align-center justify-between">
    <div class="logo">
        <a href="/index.php">
            <img src="/panel-php/images/logo.png" alt="">
        </a>
    </div>
    <div class="d-flex align-center">
        <ul class="navbar-list d-flex align-center gap-1">
            <li class="navbar-items"><a href="/nosotros.php">Sobre Nosotros</a></li>
            <li class="navbar-items"><a href="/index.php#servicios">Servicios</a></li>
            <li class="navbar-items"><a href="/portafolio.php">Portafolio</a></li>
        </ul>
        <div class='buttons'>
            <a href="/contacto.php" class="d-flex align-center justify-center gap-5">
                Contacto
                <img src="../images/Pajaro.png" alt="">
            </a>
        </div>
    </div>

    <div class="navbar-responsive">
        <label for="menu">
            <i class="icon menu"></i>
        </label>
        <input type="checkbox" name="menu-responsive" id="menu" />
        <article class="popup">
            <label class="background" for="menu"></label>
            <ul>
                <li class="menu-close">
                    <em>Men&uacute;</em>
                    <label for="menu">
                        <i class="icon close"></i>
                    </label>
                </li>
                <li>
                    <a href="/index.php">Inicio</a>
                </li>
                <li>
                    <a href="/nosotros.php">Sobre Nosotros</a>
                </li>
                <li>
                    <a href="/index.php#servicios">Servicios</a>
                </li>
                <li>
                    <a href="/portafolio.php">Portafolio</a>
                </li>
                <li>
                    <a href="/contacto.php">Contacto</a>
                </li>
            </ul>
        </article>
    </div>
</nav>