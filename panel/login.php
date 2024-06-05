<!DOCTYPE html>
<html lang="en">

    <?php include_once("includes/head.php"); ?>

    <body>
        <div className="background z-1 position-absolute w-100 top-0">
                <img src="" alt=""/>
            </div>
            <section className="login d-flex flex-col flex-wrap align-center justify-center position-relative z-2">
                <div className='p-4 rounded-2 d-flex flex-col flex-wrap gap-2 align-center text-white'>
                    <header className='text-center'>
                        <h2 className='fs-2 fw-bolder'>¡Bienvenido/a!</h2>
                        <strong>Inicia sesion</strong>
                    </header>
                    <form onSubmit={handleSubmit} className='w-100'>
                        <ul className="form d-flex flex-column gap-2 w-100">
                            <li className='d-flex flex-column'>
                                <label htmlFor="user" className='text-uppercase fs-6 px-0 py-2'>Usuario</label>
                                <input type="text" 
                                    name="email" 
                                    id="user" 
                                    onChange={handleChange}
                                    defaultValue={""}
                                    className='p-3 fs-6 rounded-2 border-0 text-white'
                                />
                            </li>
                            <li className='d-flex flex-column'>
                                <label htmlFor="password" className='text-uppercase fs-6 px-0 py-2'>Contraseña</label>
                                <div className='d-flex password-container'>
                                    <input type="password" 
                                        name="password" 
                                        id="password" 
                                        onChange={handleChange}
                                        defaultValue={""}
                                        className='p-3 fs-6 rounded-2 border-0 text-white'
                                        ref={password}
                                    />
                                    <button onClick={visibilityPassword} className='visible-btn'>
                                        {visible ? (
                                            <Hidden />
                                        ) : (
                                            <Show />
                                        )}
                                    </button>
                                </div>
                            </li>
                            <li className='d-flex flex-column align-items-center mt-3'>
                                <button type='submit' className='p-3 rounded-2 border-0 text-uppercase text-white'>Iniciar sesion</button>
                            </li>
                        </ul>
                    </form>
                    <span className='fs-6' style={{height: "2em", color: "red"}}>
                        {error}
                    </span>
                    <footer>
                        <span className='fs-6 fw-lighter text-white'>Ante cualquier inconveniente, comunic&aacute;te con nosotros</span>
                    </footer>
                </div>
                <footer className='position-absolute bottom-0 p-3 w-100 d-flex justify-content-center'>
                    <span className='fs-6 text-uppercase'>© Resolve Dev</span>
                </footer>
            </section>
    </body>
</html>