   <!--ESTO ES EL CONTENIDO-->
   <body>
   <section class="espaciotop">
    <div class="centrar"><a href="?c=Reports&a=repConsultarUsuarios" class="btn-neon">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    <span id="span5"></span>
                    REPORTE PDF</a><br><br></div>
    <table class="centrar contenido-tabla">
        <thead>
            <tr id="tabla-crud">
                <th>Doc. Identidad</th>
                <th>Tipo doc</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Télefono</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Rol</th>
                <th>Contraseña</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user) : ?>
                <tr>
                <td><?php echo $user->getDocUsuario() ?></td>
                <td><?php 
							if ($user->getTipoDocUsuario() == 1) {
								echo 'CC';
							} elseif ($user->getTipoDocUsuario() == 2) {
								echo 'TI';								
							} elseif ($user->getTipoDocUsuario() == 3) {
								echo 'CE';								
							}
						?></td>
                <td><?php echo $user->getNombresUsuario() ?></td>
                <td><?php echo $user->getApellidosUsuario() ?></td>
                <td><?php echo $user->getTelUsuario() ?></td>
                <td><?php echo $user->getCelUsuario() ?></td>
                <td><?php echo $user->getEmailUsuario() ?></td>
                <td><?php echo $user->getDirUsuario() ?></td>
                <td><?php echo $user->getIdRol() ?></td>
                <td><?php echo $user->getPassUsuario() ?></td>
                <td><?php echo $user->getEstadoUsuario() ?></td>
                <td> <span class='link'><a href="?c=Users&a=actualizar&documento=<?php echo $user->getDocUsuario()?>">Editar</a></span> | 
                <span class='link'><a href="?c=Users&a=eliminar&documento=<?php echo $user->getDocUsuario()?>" onClick="return confirm('¿Está seguro de eliminar este registro?') ">Eliminar</a></span></td>
             </tr>
            <?php endforeach; ?>
         </tbody>
    </table>
</section>
 