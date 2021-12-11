<body>
    <section class="espaciotop2">
        <div class="content">
            <div class="contact-wrapper">
                <div class="contact-form">
                    <form action="?c=Roles&a=actualizar" method="POST">
                        <p>
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombres" value="<?php echo $user->getNombreRol(); ?>" required/>
                        </p>
                        <p class="block">
                            <button type="submit" name="Submit">
                                <p class="button-submit">Agregar</p>
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>