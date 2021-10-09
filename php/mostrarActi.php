<?php

    $tabName='Mostrar Actividad';

    session_start();

    require 'data.php';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango,nivel FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $user=$records->fetch(PDO::FETCH_ASSOC);

        if(isset($_GET['idActividad'])){
            
            $id=$_GET['idActividad'];

            $records=$conn->prepare("SELECT * FROM actividad WHERE idActividad=$id");
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
                exit();

            }

        }else{

            header('Location: ../index');
            exit();

        }

    }else{

        header('Location: ../index');
        exit();
        
    }

?>

<?php include '../includes/header.php'; ?>

    <div class="topnav" id="myTopnav">
    
    <a href="../index"  class="im">
                
        <img src="../img/siies1.png" class="nav-brand" alt="Logo SIIES">

    </a>

    <div class="ai">

        <a href="javascript:void(0);" class="icon" onclick="myFunction()">

            <i class="fa fa-bars"></i>

        </a>

    </div>

    <div class="caja">

        <?php

            if(isset($_SESSION['user_id'])){

                if ($user['rango']=='admin'){ 

        ?>
               
                    <a href="mostrarActividad" class="padi">Actividades</a>

                    <a href="mostrarUsuarios" class="padi">Usuarios</a>

                    <a href="banner" class="padi">Banner</a>

                    <a href="mostrarCatalogo" class="padi">Catálogo</a>

                    <a href="logout" class="padi">Cerrar Sesión</a>

                <?php 

                    }else if($user['rango']=='capturista'){
                    
                ?>

                        <a href="mostrarActividad" class="padi">Actividades</a>

                        <a href="usuario" class="padi">Usuario</a>

                        <a href="logout" class="padi">Cerrar Sesión</a>

            <?php

                    }

                }else{

            ?>

                    <a href="login" class="padi">Iniciar Sesión</a>
            
            <?php

                }

            ?>
            
        </div>
        
</div>

    <div class="centro mt">

            <h1>

                Actividad

            </h1>

        </div>
        
    <form action="mostrarActividad" class="formulario" >

        <label class="etiqueta" id="na" >Nombre del programa o evento</label>
        <input type="text" id="na" name="nombreActividad" class="field" value="<?= $results['programaEvento'] ?>"  disabled  >

        <label class="etiqueta" >Tipo de actividad</label>
        <input type="text" id="na" name="nombreActividad" class="field" value="<?= $results['tipoActividad'] ?>"  disabled  >
            
        <label class="etiqueta" for="">Nombre de la actividad</label>
        <input type="text" id="na" name="nombreActividad" class="field" value="<?= $results['nombreActividad'] ?>"  disabled  >

        <label class="etiqueta">Nombre del área</label>
        <input type="text" id="na" name="nombreActividad" class="field" value="<?= $results['area'] ?>"  disabled  >

        <label class="etiqueta" >Nivel escolar del público objetivo</label>
        <input type="text" id="na" name="nombreActividad" class="field" value="<?= $results['nivelEscolarPublicoObjetivo'] ?>"  disabled  >

      
        <label class="etiqueta" >Nombre de institución </label>
        <input type="text" id="na" name="nombreActividad" class="field" value="<?= $results['nombreInstitucion'] ?>"  disabled  >     

        <label class="etiqueta" >Tipo de modalidad</label>
        <input type="text" id="na" name="nombreActividad" class="field" value="<?= $results['modalidad'] ?>"  disabled  >  

        
        <label class="etiqueta" for="link">Liga(link)</label>

        <textarea name="descripcion" id="myInput" class="field" rows="4" disabled cols="10" ><?= $results['liga'] ?></textarea>
   

        <label class="etiqueta">Descripción de la actividad</label>
        <textarea name="descripcion" class="field" rows="4" cols="10" maxlength="400" disabled><?= $results['descripcionActividad'] ?></textarea>

        <label class="etiqueta" for="fecha">Fecha y hora de la actividad</label>
        <input type="text" id="fecha" name="fechaHora" class="field"  value="<?= $results['fechaHora'] ?>" disabled  >

        <label class="etiqueta" for="num">Duración de la actividad en minutos</label> 
        <input type="number" value="<?= $results['duracion'] ?>"  id="num" class="field" name="duracion"  min="0" max="999" disabled  >

        <label class="etiqueta" for="per">Número de personas que asistirán(Si aplica)</label> 
        <input type="number" id="per" class="field"  value="<?= $results['numeroPersonas'] ?>" name="numeroPersonas"  min="0" max="9999" disabled >

        <label class="etiqueta" >Creado por:</label> 
        <input type="text" id="per" class="field"  value="<?= $results['creadoPor'] ?>" name="numeroPersonas"  min="0" max="9999" disabled required>

        <label class="etiqueta" for="fc">Fecha de creación</label> 
        <input type="text" id="per" class="field"  value="<?= $results['fechaCreacion'] ?>" name="numeroPersonas"  min="0" max="9999" disabled required>

        <label class="etiqueta">Modificado por:</label> 
        <input type="text" id="per" class="field"  value="<?= $results['modificadoPor'] ?>" name="numeroPersonas"  min="0" max="9999" disabled required>
       
        <label class="etiqueta" >Fecha de la ultima modificación</label> 
        <input type="text" id="per" class="field"  value="<?= $results['fechaModificacion'] ?>" name="numeroPersonas"  min="0" max="9999" disabled required>
        
    </form>


    <div class="centro mt">

        <h1>

            Participantes

        </h1>

    </div>
                         
    <div class="datatable-container">

        

<?php

    if($user['nivel']==0){

?>

        <table class="datatable">

        <thead>

                <th class="width-40" rowspan="2">

                    Nombre

                </th>

                <th class="width-20" rowspan="2">

                    Tipo de participante

                </th>

                <th class="width-25" rowspan="2">

                    Institución

                </th>

                <th class="width-15" colspan="1">
                    
                    Acciones
                    
                </th>

                <tr>
  
                    <th scope="col">Ver</th>

                </tr>

            </thead>

            <tbody>

                <?php
                    $records=$conn->prepare('SELECT * FROM ponente WHERE id=:id');
                    $records->bindParam(':id',$id);
                    $records->execute();
                    
                    while($results=$records->fetch(PDO::FETCH_ASSOC)){?>

                        <tr>

                            <td class="centro">

                                <?= $results['nombre']?>

                            </td>

                            <td class="centro">

                                <?= $results['tipoParticipante']?>

                            </td>

                            <td class="centro">

                                <?= $results['institucion']?>

                            </td>

                            
                            <td class="centro">

                                <div class="botones">
                                    
                                    <a alt="Insertar" class="btn btn-primary"  href="mostrarPonente?idPonente=<?php echo$results['idPonente']?>"><i class="fas fa-eye"></i></a>

                                </div>

                            </td>

                        </tr>
                    
                <?php 

                    }
                
                ?>

            </tbody>

        </table>

<?php

    }else{

?>

        <table class="datatable">

        <thead>

                <th class="width-40" rowspan="2">

                    Nombre

                </th>

                <th class="width-20"  rowspan="2">

                    Tipo de participante

                </th>

                <th class="width-25"  rowspan="2">

                    Institución

                </th>

                <th class="width-15" colspan="1">
                    
                    Acciones
                    
                </th>

                <tr>

                    <th scope="col">Ver</th>

                </tr>

            </thead>

            <tbody>

                <?php
                    $records=$conn->prepare('SELECT * FROM ponente WHERE id=:id');
                    $records->bindParam(':id',$id);
                    $records->execute();
                    
                    while($results=$records->fetch(PDO::FETCH_ASSOC)){?>

                        <tr>

                            <td class="centro">

                                <?= $results['nombre']?>

                            </td>

                            <td class="centro">

                                <?= $results['tipoParticipante']?>

                            </td>

                            <td class="centro">

                                <?= $results['institucion']?>

                            </td>
                            
                            <td class="centro">

                                <div class="botones">
                                    
                                    <a alt="Insertar" class="btn btn-primary"  href="mostrarPonente?idPonente=<?php echo$results['idPonente']?>"><i class="fas fa-eye"></i></a>

                                </div>

                            </td>

                        </tr>
                    
                <?php 

                    }
                
                ?>

            </tbody>

        </table>

<?php

    }

?>

    </div>


<form action="mostrarActividad" method="POST">

            <div class="centro jc reg">
                
                <input type="submit" class="field" name="save" value="Regresar">
                    
            </div>

        </form>

    
<br><br>

<?php include '../includes/footer.php'; ?>