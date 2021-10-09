<?php

    $tabName='Editar Actividad';

    session_start();
    
    require 'data.php';

    $message='';

    $_SESSION['boton']=true;

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango,nivel FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $user=$records->fetch(PDO::FETCH_ASSOC);

        if($user['nivel']==1){

            header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
            exit();

        }

    }else{

        header('Location: login3');

    }

        if (isset($_GET['idActividad'])){

            $id=$_GET['idActividad'];
            $_SESSION['idActividad']=$id;
            
            $records=$conn->prepare("SELECT * FROM actividad WHERE idActividad=$id");
            $records->execute();
            $results=$records->fetch(PDO::FETCH_ASSOC);

            if(!$results){

                header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
                exit();

            }

        }else{

            header('Location: mostrarActividad?pagina='.$_SESSION['pagActividad']);
            exit();

        }

        $uno=1;
        $cero=0;

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
                }
  
            ?>
            
        </div>
        
    </div>

    <div class="centro mt">

        <h1>

            Editar Actividad

        </h1>

    </div>

    <form action="updateActividad.php" class="formulario" method="POST">

        <label class="etiqueta" >Ingrese el nombre del programa</label>

        <select  class="field" name="programaEvento" required>

            <option value="<?=$results['programaEvento']?>"><?=$results['programaEvento']?></option>

    <?php

        $records=$conn->prepare('SELECT * FROM programacatalogo WHERE (programa<>:programa AND ocultar=:ocultar)');
        $records->bindParam(':programa',$results['programaEvento']);
        $records->bindParam(':ocultar',$cero);
        $records->execute();

        while($results1=$records->fetch(PDO::FETCH_ASSOC)){

    ?>

            <option value="<?=$results1['programa']?>"><?=$results1['programa']?></option>

    <?php

        }

    ?>
                
        </select>

        <label class="etiqueta" >Ingrese el tipo de actividad</label>

        <select  class="field" id="" name="tipoActividad" required>

            <option value="<?=$results['tipoActividad']?>"><?=$results['tipoActividad']?></option>

    <?php

        $records=$conn->prepare('SELECT * FROM tipoactividadcatalogo WHERE tipoActividad<>:tipoActividad AND ocultar=:ocultar');
        $records->bindParam(':tipoActividad',$results['tipoActividad']);
        $records->bindParam(':ocultar',$cero);
        $records->execute();

        while($results1=$records->fetch(PDO::FETCH_ASSOC)){

    ?>

            <option value="<?=$results1['tipoActividad']?>"><?=$results1['tipoActividad']?></option>

    <?php

        }

    ?>
                                
        </select>
            
        <label class="etiqueta" for="">Ingrese el nombre de la actividad</label>
        <input type="text" id="na" name="nombreActividad" class="field" value="<?= $results['nombreActividad'] ?>" required>


        <label class="etiqueta">Ingrese el nombre del área</label>

        <select  class="field"  name="area" required>

            <option value="<?=$results['area']?>"><?=$results['area']?></option>

    <?php

        $records=$conn->prepare('SELECT * FROM areacatalogo WHERE (area<>:area AND ocultar=:ocultar)');
        $records->bindParam(':area',$results['area']);
        $records->bindParam(':ocultar',$cero);
        $records->execute();

        while($results1=$records->fetch(PDO::FETCH_ASSOC)){

    ?>

            <option value="<?=$results1['area']?>"><?=$results1['area']?></option>

    <?php

        }

    ?>
                                
        </select>

        <label class="etiqueta" >Ingrese el nivel escolar del público objetivo</label>
        <select  class="field" name="nivelEscolar" required>

            <option value="<?=$results['nivelEscolarPublicoObjetivo']?>"><?=$results['nivelEscolarPublicoObjetivo']?></option>

    <?php

        $records=$conn->prepare('SELECT * FROM nivelescolarcatalogo WHERE nivelEscolar<>:nivelEscolar AND ocultar=:ocultar');
        $records->bindParam(':nivelEscolar',$results['nivelEscolarPublicoObjetivo']);
        $records->bindParam(':ocultar',$cero);
        $records->execute();

        while($results1=$records->fetch(PDO::FETCH_ASSOC)){

    ?>

            <option value="<?=$results1['nivelEscolar']?>"><?=$results1['nivelEscolar']?></option>

    <?php

        }

    ?>
                                
        </select>

    <?php

        if($_SESSION['rango']=='admin'){

    ?>

            <label class="etiqueta" >Ingrese el nombre de institución</label>
            <select  class="field" name="institucion" required>

            <option value="<?=$results['nombreInstitucion']?>"><?=$results['nombreInstitucion']?></option>

            <?php

                $records=$conn->prepare('SELECT * FROM institucioncatalogo WHERE institucion<>:institucion AND ocultar=:ocultar');
                $records->bindParam(':institucion',$results['nombreInstitucion']);
                $records->bindParam(':ocultar',$cero);
                $records->execute();

                while($results1=$records->fetch(PDO::FETCH_ASSOC)){

            ?>
 
                    <option value="<?=$results1['institucion']?>"><?=$results1['institucion']?></option>

            <?php

                }

            ?>
                
        </select>   

    <?php       

        }else{

    ?>

            <label class="etiqueta" >Ingrese el nombre de institución</label>
            <select  class="field" name="institucion" required>

                    <option value="<?=$_SESSION['institucion']?>"><?=$_SESSION['institucion']?></option>
                
            </select>

    <?php

         }

    ?>      

        <label class="etiqueta" >Ingrese el tipo de modalidad</label>
        <select  class="field" name="modalidad" required>

            <option value="<?=$results['modalidad']?>"><?=$results['modalidad']?></option>

    <?php

        $records=$conn->prepare('SELECT * FROM modalidadcatalogo WHERE modalidad<>:modalidad AND ocultar=:ocultar');
        $records->bindParam(':modalidad',$results['modalidad']);
        $records->bindParam(':ocultar',$cero);
        $records->execute();

        while($results1=$records->fetch(PDO::FETCH_ASSOC)){

    ?>

            <option value="<?=$results1['modalidad']?>"><?=$results1['modalidad']?></option>

    <?php

        }

    ?>
            
        </select>

        <label class="etiqueta" for="link">Ingrese la liga(link)</label>
        <input type="text" class="field" name="liga" value="<?= $results['liga'] ?>" required >

        <label class="etiqueta" id="count">Ingrese una breve descripción de la actividad</label>
        <textarea name="descripcion" class="field" id="inp" rows="4" cols="10" maxlength="400" placeholder="Máximo 400 caracteres" required><?= $results['descripcionActividad'] ?></textarea>

        <script>

            var a = document.getElementById("inp");
            a.addEventListener("keyup",function(){
            document.getElementById("count").innerHTML = "Ingrese una breve descripción de la actividad  (" + a.value.length+ "/400)";
            })
            a.addEventListener("select",function(){
            document.getElementById("count").innerHTML = "Ingrese una breve descripción de la actividad  (" + a.value.length+ "/400)";
            })

            a.addEventListener("focus",function(){
            document.getElementById("count").innerHTML = "Ingrese una breve descripción de la actividad  (" + a.value.length+ "/400)";
            })

            a.addEventListener("input",function(){
            document.getElementById("count").innerHTML = "Ingrese una breve descripción de la actividad  (" + a.value.length+ "/400)";
            })

            a.addEventListener("focusout",function(){
            document.getElementById("count").innerHTML = "Ingrese una breve descripción de la actividad";
        
            })
        </script>

        <?php

        $format='%Y-%m-%dT%H:%i';
        $consulta='SELECT * , DATE_FORMAT(fechaHora, :fecha) as fecha from actividad where  idActividad=:id';
        $cons=$conn->prepare($consulta);
        $cons->bindParam(':fecha',$format);
        $cons->bindParam(':id',$id);
        $cons->execute();
        $con=$cons->fetch(PDO::FETCH_ASSOC);

        ?>

        <label class="etiqueta" for="fecha">Ingrese la fecha y hora de la actividad</label>
        <input type="datetime-local" id="fecha" name="fechaHora" class="field"  value="<?= $con['fecha'] ?>" required>

        <label class="etiqueta" for="num">Ingrese la duración de la actividad en minutos</label> 
        <input type="number" value="<?= $results['duracion'] ?>"  id="num" class="field" name="duracion"  min="0" max="999" required >

        <label class="etiqueta" for="per">Ingrese el número de personas que asistirán(Si aplica)</label> 
        <input type="number" id="per" class="field"  value="<?= $results['numeroPersonas'] ?>" placeholder="(Opcional)" name="numeroPersonas"  min="0" max="9999" >

        <input type="submit" class="field" name="save" value="Enviar">

    </form>

        <div class="centro mt">

            <h1>

                Participantes

            </h1>

        </div>
                                   
    <div class="datatable-container" id="ponente">

        <div class="header-tools">

            <div class="tools">

                <div class="agregar-boton">

                    <a alt="Insertar" class="btn btn-primary boton"  href="insertarPonente?idActividad=<?php echo$id?>">Agregar participante</a> 
                            
                </div>

            </div>

        </div>

        <table class="datatable">

           <thead>

                <th class="width-40" rowspan="2">

                    Nombre

                </th>

                <th class="width-20" rowspan="2">

                    Tipo de participante

                </th>

                <th class="width-20"  rowspan="2">

                    Institución

                </th>

                <th class="width-20" colspan="3">
                    
                    Acciones
                    
                </th>
                
                <tr>
      
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
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

                                    <a alt="Editar" class="btn btn-warning" href="editarPonente?idPonente=<?php echo$results['idPonente']?>"><i class="fas fa-edit"> </i></a>
                            
                                </div>
                            
                            </td>

                            <td class="centro">

                                <div class="botones">

                                    <a alt="Eliminar" class="btn btn-danger" href="eliminarPonente?idPonente=<?php echo$results['idPonente']?>"><i class="fas fa-trash-alt"> </i></a>

                                </div>

                            </td>    

                            <td class="centro">

                                <div class="botones">
                                    
                                    <a alt="Insertar" class="btn btn-primary" href="mostrarPonente?idPonente=<?php echo$results['idPonente']?>"><i class="fas fa-eye"></i></a>

                                </div>

                             </td>

                        </tr>
                    
                <?php 

                    }
                
                ?>

            </tbody>


        </table>

        
    </div>

    <form action="mostrarActividad" method="POST">

            <div class="centro jc reg">
                
                <input type="submit" class="field" name="save" value="Regresar">
                    
            </div>

        </form>
        
    <br><br>
    
<?php include '../includes/footer.php'; ?>
