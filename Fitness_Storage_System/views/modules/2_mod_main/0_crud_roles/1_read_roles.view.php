<!--ESTO ES EL CONTENIDO-->

<section class="espaciotop">
        <div class="centrar"><a href="?c=Roles&a=crear" class="btn-neon">
                <span id="span1"></span>
                <span id="span2"></span>
                <span id="span3"></span>
                <span id="span4"></span>
                <span id="span5"></span>
                ADICIONAR ROL</a></div><br><br>
    <table class="centrar contenido-tabla">
        <thead>
            <tr id="tabla-crud">
                <th>Id. Rol</th>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php /*foreach($users as $user) : ?>
                <tr>
                <td><?php echo $user->getIdRol() ?></td>";
                <td><?php echo $user->getNombreRol() ?></td>";
                <td> <span class='link'><a href="?c=Roles&a=actualizar&rol=<?php echo $user->getIdRol()?>">Editar</a></span> | 
                <span class='link'><a href="?c=Roles&a=eliminar&rol=<?php echo $user->getIdRol()?>" onClick="return confirm('¿Está seguro de eliminar este registro?') ">Eliminar</a></span></td>";
                
             </tr>
            <?php endforeach; */?>
         </tbody>
    </table>
</section>