 <!--ESTO ES EL CONTENIDO-->

 <section class="espaciotop">
<div class="centrar"><a href="#" class="btn-neon">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    <span id="span5"></span>
                    REPORTE PDF</a></div><br><br>
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
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($entrenadores as $user) : ?>
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
                    <td><?php 
							if ($user->getEstadoUsuario() == 0) {
								echo 'Inactivo';
							} elseif ($user->getEstadoUsuario() == 1) {
								echo 'Activo';								
							}
					?></td>
                </tr>
            <?php endforeach; ?>
         </tbody>
    </table> 
</section>
