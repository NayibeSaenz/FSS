<body>
    
    <div class="content espaciotop2">    
        <div class="contact-wrapper">
            <div class="contact-form">
                <form action="?c=Users&a=actualizar" method="POST">
                      <p>
                        <label for="tipo_doc">Tipo documento</label></p>
                        <p>
                        <div class="select">
                        <select name="tipodoc" >
                            <?php 
                                for ($i=1; $i <= 3; $i++) { 
                                    if ($user->getTipoDocUsuario() == $i) {
                                        echo '<option value="' . ($i) . '" selected>' . $tipodoc[$i-1] . '</option>';
                                    } else {
                                        echo '<option value="' . ($i) . '">' . $tipodoc[$i-1] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    </p>
                    <p>
                        <label for="doc_identidad">Doc. Identidad</label>
                        <input type="hidden" name="documento" value="<?php echo $user->getDocUsuario(); ?>" />
                    </p>
                    <p>
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" value="<?php echo $user->getNombresUsuario(); ?>" 
                        required/>
                    </p>
                    <p>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" value="<?php echo $user->getApellidosUsuario(); ?>" 
                        required/>
                    </p>
                    <p>
                        <label for="telefono">Tel. contacto</label>
                        <input type="text" name="telefono" value="<?php echo $user->getTelUsuario(); ?>" 
                    />
                    </p>
                    <p>
                        <label for="celular">Cel. contacto</label>
                        <input type="number" name="celular" value="<?php echo $user->getCelUsuario(); ?>" 
                        required/>
                    </p>
                    <p>
                        <label for="email">Email</label>
                        <input type="text" name="email" value="<?php echo $user->getEmailUsuario(); ?>" 
                        required/>
                    </p>
                    <p>
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" value="<?php echo $user->getDirUsuario(); ?>" 
                        required/>
                    </p>
                    <p>
                        <label for="contrasena">Contraseña</label>
                        <input type="password" name="pass" value="<?php echo $user->getPassUsuario(); ?>" 
                        required/>
                    </p>
                    <p>
                        <label for="id_rol">Rol</label></p>
                        <p>
                        <div class="select">
                        <select name="rol">
                            <?php 
                                for ($i=1; $i <= 3; $i++) { 
                                    if ($user->getIdRol() == $i) {
                                        echo '<option value="' . ($i) . '" selected>' . $perfil[$i-1] . '</option>';
                                    } else {
                                        echo '<option value="' . ($i) . '">' . $perfil[$i-1] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    </p>
                    <p>
                        <label for="estado">Estado</label></p>
                        <p>
                        <div class="select">
                        <select name="estado">
                            <?php 
                                for ($i=0; $i <= 1; $i++) { 
                                    if ($user->getEstadoUsuario() == $i) {
                                        echo '<option value="' . ($i) . '" selected>' . $estado[$i] . '</option>';
                                    } else {
                                        echo '<option value="' . ($i) . '">' . $estado[$i] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    </p>
                    <p class="block">
                    <button type="submit">
                        <p class="button-submit">ACTUALIZAR</p>
                    </button>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <?php
           # if(isset($errMsg)){
           #     echo '<div style="color:white;text-align:center;font-size:l7px;">'.$errMsg.'</dív>';
           # }
        ?>
</body>
</html>