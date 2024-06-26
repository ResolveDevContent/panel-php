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
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #fff; width:3em; height: 3em;">
                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
            </svg>
            <!-- <i class="icon menu"></i> -->
        </label>
        <input type="checkbox" name="menu-responsive" id="menu" />
        <article class="popup">
            <label class="background" for="menu"></label>
            <ul>
                <li class="menu-close">
                    <em>Men&uacute;</em>
                    <label for="menu">
                        <!-- <i class="icon close"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #fff; width:2em; height: 2em;">
                            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path>
                        </svg>
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