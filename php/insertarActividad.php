<?php

    $tabName='Agregar Actividad';

    session_start();

    require 'data.php';

    $message='';

    if(isset($_SESSION['user_id'])){

        $user=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango,nivel FROM usuario WHERE idUsuario=:id');
        $user->bindParam(':id',$_SESSION['user_id']);
        $user->execute();
        $user=$user->fetch(PDO::FETCH_ASSOC);

        if($user['nivel']==1){

            header('Location: mostrarActividad');
            exit();

        }

    }else{

        header('Location: ../index');
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

            Agregar Actividad

        </h1>

    </div>

    <form action="saveActividad.php" class="formulario" method="POST">

        <label class="etiqueta" >Ingrese el nombre del programa</label>

        <select  class="field" name="programaEvento"  autofocus required>

            <option value="">--Por favor, selecciona una opción-</option>

            <?php

                $records=$conn->prepare('SELECT * FROM programacatalogo WHERE ocultar=:ocultar');
                $records->bindParam(':ocultar',$cero);
                $records->execute();

                while($results=$records->fetch(PDO::FETCH_ASSOC)){

            ?>

                    <option value="<?=$results['programa']?>"><?=$results['programa']?></option>

            <?php

                }

            ?>
                
        </select>

        <label class="etiqueta" >Ingrese el tipo de actividad</label>

        <select  class="field" id="" name="tipoActividad" required>

            <option value="">--Por favor, selecciona una opción-</option>

        <?php

            $records=$conn->prepare('SELECT * FROM tipoactividadcatalogo WHERE ocultar=:ocultar');
            $records->bindParam(':ocultar',$cero);
            $records->execute();

            while($results=$records->fetch(PDO::FETCH_ASSOC)){

        ?>

                <option value="<?=$results['tipoActividad']?>"><?=$results['tipoActividad']?></option>

        <?php

            }

        ?>
                                
        </select>
            
        <label class="etiqueta" for="">Ingrese el nombre de la actividad</label>
        <input type="text" name="nombreActividad" class="field" required>

        <label class="etiqueta">Ingrese el nombre del área</label>

        <select  class="field"  name="area" required>

            <option value="">--Por favor, selecciona una opción-</option>

        <?php

            $records=$conn->prepare('SELECT * FROM areacatalogo WHERE ocultar=:ocultar');
            $records->bindParam(':ocultar',$cero);
            $records->execute();

            while($results=$records->fetch(PDO::FETCH_ASSOC)){

        ?>

                <option value="<?=$results['area']?>"><?=$results['area']?></option>

        <?php

            }

        ?>
                                
        </select>

        <label class="etiqueta" >Ingrese el nivel escolar del público objetivo</label>
        <select  class="field" name="nivelEscolar" required>

            <option value="">--Por favor, selecciona una opción-</option>

        <?php

            $records=$conn->prepare('SELECT * FROM nivelescolarcatalogo WHERE ocultar=:ocultar');
            $records->bindParam(':ocultar',$cero);
            $records->execute();

            while($results=$records->fetch(PDO::FETCH_ASSOC)){

        ?>

                <option value="<?=$results['nivelEscolar']?>"><?=$results['nivelEscolar']?></option>

        <?php

            }

        ?>
                                
        </select>

        <?php

            if($user['rango']=='admin'){
            
        ?>
                    
                <label class="etiqueta" >Ingrese el nombre de institución</label>

                <select  class="field" name="institucion" required>

                    <option value="">--Por favor, selecciona una opción-</option>

                <?php

                    $records=$conn->prepare('SELECT * FROM institucioncatalogo WHERE ocultar=:ocultar');
                    $records->bindParam(':ocultar',$cero);
                    $records->execute();

                    while($results=$records->fetch(PDO::FETCH_ASSOC)){

                ?>

                        <option value="<?=$results['institucion']?>"><?=$results['institucion']?></option>

                <?php

                    }

                ?>
                                
                </select>
                            
        <?php

            }else{
                
        ?>

                <label class="etiqueta">Nombre de institución o SEDE</label>
                <select  class="field" name="institucion" required>

                    <option value="<?=$_SESSION['institucion']?>"><?=$_SESSION['institucion']?></option>

                </select>
                                  
        <?php
                    
            }

        ?>

        <label class="etiqueta" >Ingrese el tipo de modalidad</label>
        <select  class="field" name="modalidad" required>

            <option value="">--Por favor, selecciona una opción-</option>

        <?php

            $records=$conn->prepare('SELECT * FROM modalidadcatalogo WHERE ocultar=:ocultar');
            $records->bindParam(':ocultar',$cero);
            $records->execute();

            while($results=$records->fetch(PDO::FETCH_ASSOC)){

        ?>

                <option value="<?=$results['modalidad']?>"><?=$results['modalidad']?></option>

        <?php

            }

        ?>
            
        </select>

        <?php

            date_default_timezone_set('America/Mexico_City'); 
   
         
        ?>

        <label class="etiqueta" for="link">Ingrese la liga(link)</label>
        <input type="text" class="field" name="liga" required >

        <label class="etiqueta" id="count">Ingrese una breve descripción de la actividad</label>
        <textarea name="descripcion" class="field" id="inp" rows="4" cols="10" maxlength="400" placeholder="Máximo 400 caracteres" required></textarea> 

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
            document.getElementById("count").innerHTML = "Ingrese una breve descripción de la actividad ";
            })

        </script>

        <?php  
        
            $datetime = new DateTime($timeinout[0]->time_in);  
               
        ?>

        <label class="etiqueta" for="fecha">Ingrese la fecha y hora de la actividad</label>
        <input type="datetime-local" id="fecha" name="fechaHora" class="field" required>

        <label class="etiqueta" for="num">Ingrese la duración de la actividad en minutos</label> 
        <input type="number" id="num" class="field" name="duracion"  min="0" max="999" required >

        <label class="etiqueta" for="per">Capacidad máxima de asistentes(Si aplica)</label> 
        <input type="number" id="per" class="field" name="numeroPersonas" placeholder="(Opcional)"  min="0" max="9999">
        
        <input type="submit" class="field" name="save" value="Enviar">
      
    </form>

    <br><br>

<?php include '../includes/footer.php'; ?>
