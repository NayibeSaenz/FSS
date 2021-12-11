<body>
    
    <div class="content espaciotop">
    <div class="centrar"><a href="?c=Users&a=consultar" class="btn-neon">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    <span id="span5"></span>
                    VER USUARIOS</a></div>
    
        <div class="contact-wrapper">
            <div class="contact-form">
                <form action="?c=Users&a=crear" method="POST">
                      <p>
                        <label for="tipo_doc">Tipo documento</label></p>
                        <p>
                          <div class="select">
                            <select name="tipodoc">
                              <option selected disabled="">Seleccione...</option>
                              <option value="1">CC</option>
                              <option value="2">TI</option>
                              <option value="3">CE</option>
                            </select>
                    </div>
                    </p>
                    <p>
                        <label for="doc_identidad">Doc. Identidad</label>
                        <input type="number" name="documento" pattern=[0-9] required autocomplete="off"/>
                    </p>
                    <p>
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" required autocomplete="off"/>
                    </p>
                    <p>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" required autocomplete="off"/>
                    </p>
                    <p>
                        <label for="telefono">Tel. contacto</label>
                        <input type="number" name="telefono" pattern=[0-9] autocomplete="off"/>
                    </p>
                    <p>
                        <label for="celular">Cel. contacto</label>
                        <input type="number" name="celular" pattern=[0-9] required autocomplete="off"/>
                    </p>
                    <p>
                        <label for="email">Email</label>
                        <input type="email" name="email" 
                        pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}" 
                        title="Ingrese un correo válido" required autocomplete="off"/>
                    </p>
                    <p>
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" required autocomplete="off"/>
                    </p>
                    <p>
                        <label for="contrasena">Contraseña</label>
                        <input type="password" name="pass" required autocomplete="off"/>
                    </p>
                    <p>
                        <label for="id_rol">Rol</label></p>
                        <p>
                        <div class="select">
                        <select name="rol">
                            <option selected disabled="">Seleccione...</option>
                            <option value="1">Admin</option>
                            <option value="2">Entrenador</option>
                            <option value="3">Cliente</option>
                        </select>
                    </div>
                    </p>
                    <p>
                        <label for="estado">Estado</label></p>
                        <p>
                        <div class="select">
                        <select name="estado">
                            <option selected disabled="">Seleccione...</option>
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                        </select>
                    </div>
                    </p>
                    <p class="block">
                    <button type="submit">
                        <p class="button-submit">Registro</p>
                    </button>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <<?php
            #if(isset($errMsg)){
              #  echo '<div style="color:white;text-align:center;font-size:l7px;">'.$errMsg.'</dív>';
           # }
        ?>
</body>
</html>