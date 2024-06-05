<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <aside class='menu w-25 position-sticky top-0'>
        <div class='d-flex align-items-center display-menu'>
            <label for="display-menu">
                <!-- <HamburgerMenu /> -->
            </label>
        </div>
        <header class='text-center'>
            <div class='d-flex align-items-center'>
                <a to="/usuario">
                    <div class="user-img"></div>
                    <span>Nombre</span>
                </a>
                <button type='submit' >
                    <!-- <PowerOff /> -->
                </button>
            </div>
        </header>
        <div>
            <ul>
                <!-- <li class='categoria'>
                    <input type="radio" id="tienda" name='subcategoria' >
                    <label htmlFor='tienda'>
                        <span>Tienda</span>
                        <ArrowDown />
                    </label>
                    <ul>
                        <li>
                            <a href="tienda/agregar">Agregar</a>
                        </li>
                        <li>
                            <a href="tienda/listar">Listar</a>
                        </li>
                    </ul>
                </li> -->
                <li class='categoria'>
                    <a href="productos.php">
                        <span>Productos</span>
                        <!-- <ArrowDown /> -->
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</body>
</html>