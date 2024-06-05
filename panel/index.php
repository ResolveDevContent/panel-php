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
    <input type="checkbox" id="display-menu">
    <aside class='menu w-25 position-sticky top-0'>
        <div class='d-flex align-items-center display-menu'>
            <label for="display-menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                </svg>
            </label>
        </div>
        <header class='text-center'>
            <div class='d-flex align-items-center'>
                <a href="" class="user">
                    <div class="user-img"></div>
                    <span>Nombre</span>
                </a>
                <a href="">
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
                    <a href="productos.php">
                        <span>Productos</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <article>
        
    </article>
</body>
</html>