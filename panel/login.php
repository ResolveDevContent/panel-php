<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Login"; 
        include_once("includes/head.php"); 
    ?>

    <body>
        <div class="background z-1 position-absolute w-100 top-0">
            <img src="" alt=""/>
        </div>
        <section class="login d-flex flex-col flex-wrap align-center justify-center position-relative z-2">
            <div class='p-4 rounded-2 d-flex flex-col flex-wrap gap-2 align-center text-white'>
                <header class='text-center'>
                    <h2 class='fs-2 fw-bolder'>¡Bienvenido/a!</h2>
                    <strong>Inicia sesion</strong>
                </header>
                <form onSubmit={handleSubmit}>
                    <ul class="form d-flex flex-col">
                        <li class='d-flex flex-col'>
                            <label htmlFor="user" class='text-uppercase fs-6 px-0 py-2'>Usuario</label>
                            <input type="text" 
                                name="email" 
                                id="user" 
                                onChange={handleChange}
                                class='p-3 fs-6 rounded-2 border-0 text-white'
                            />
                        </li>
                        <li class='d-flex flex-col'>
                            <label for="password" class='text-uppercase fs-6 px-0 py-2'>Contraseña</label>
                            <div class='d-flex password-container'>
                                <input type="password" 
                                    name="password" 
                                    id="password" 
                                    onChange={handleChange}
                                    class='p-3 fs-6 rounded-2 border-0 text-white'
                                    ref={password}
                                />
                                <button onClick={visibilityPassword} class='visible-btn'>
                                    {visible ? (
                                        <Hidden />
                                    ) : (
                                        <Show />
                                    )}
                                </button>
                            </div>
                        </li>
                        <li class='d-flex flex-col align-center mt-3'>
                            <button type='submit' class='p-3 rounded-2 border-0 text-uppercase text-white'>Iniciar sesion</button>
                        </li>
                    </ul>
                </form>
                <span class='fs-6' style="height: 2em; color: red">
                    {error}
                </span>
                <footer>
                    <span class='fs-6 fw-lighter text-white'>Ante cualquier inconveniente, comunic&aacute;te con nosotros</span>
                </footer>
            </div>
            <footer class='position-absolute bottom-0 d-flex justify-center'>
                <span class='fs-6 text-uppercase'>© Resolve Dev</span>
            </footer>
        </section>
    </body>
</html>