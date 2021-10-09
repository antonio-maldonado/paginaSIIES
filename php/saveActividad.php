<?php
    session_start();
    require 'data.php';

    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

    }else{

        header('Location: ../index');
        exit();
        
    }

    if(isset($_POST['save'])){

        $query="SELECT idActividad FROM actividad WHERE programaEvento=:programaEvento AND tipoActividad=:tipoActividad AND nombreActividad=:nombreActividad AND area=:area AND nivelEscolarPublicoObjetivo=:nivelEscolarPublicoObjetivo AND nombreInstitucion=:nombreInstitucion AND descripcionActividad=:descripcionActividad   AND modalidad=:modalidad AND liga=:liga";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':programaEvento',$_POST['programaEvento'],PDO::PARAM_STR);
        $stmt->bindParam(':tipoActividad',$_POST['tipoActividad'],PDO::PARAM_STR);
        $stmt->bindParam(':nombreActividad',$_POST['nombreActividad'],PDO::PARAM_STR);
        $stmt->bindParam(':area',$_POST['area'],PDO::PARAM_STR);
        $stmt->bindParam(':nivelEscolarPublicoObjetivo',$_POST['nivelEscolar'],PDO::PARAM_STR);
        $stmt->bindParam(':nombreInstitucion',$_POST['institucion'],PDO::PARAM_STR);
        $stmt->bindParam(':descripcionActividad',$_POST['descripcion'],PDO::PARAM_STR);

        $stmt->bindParam(':modalidad',$_POST['modalidad'],PDO::PARAM_STR);
        $stmt->bindParam(':liga',$_POST['liga'],PDO::PARAM_STR);
        $stmt->execute();

        $id1=$stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($id1)){

            $message='Actividad registrada <br> Ahora, agregue participantes presionando el ícono + de la tabla Participantes';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='good1';
            header('location: editarActividad?idActividad='.$id1['idActividad'].'#ponente');
            exit();
            
        }

        if(($_POST['numeroPersonas'])!=""){

            $sql="INSERT INTO actividad (programaEvento,tipoActividad,nombreActividad,area,nivelEscolarPublicoObjetivo,nombreInstitucion,descripcionActividad,fechaHora,duracion,numeroPersonas,modalidad,liga,fechaCreacion,fechaModificacion,creadoPor,modificadoPor) VALUES (:programaEvento,:tipoActividad,:nombreActividad,:area,:nivelEscolarPublicoObjetivo,:nombreInstitucion,:descripcionActividad,:fechaHora,:duracion,:numeroPersonas,:modalidad,:liga,:fechaCreacion,:fechaModificacion,:creadoPor,:modificadoPor)";
            $stmt=$conn->prepare($sql);

            $stmt->bindParam(':programaEvento',$_POST['programaEvento'],PDO::PARAM_STR);
            $stmt->bindParam(':tipoActividad',$_POST['tipoActividad'],PDO::PARAM_STR);
            $stmt->bindParam(':nombreActividad',$_POST['nombreActividad'],PDO::PARAM_STR);
            $stmt->bindParam(':area',$_POST['area'],PDO::PARAM_STR);
            $stmt->bindParam(':nivelEscolarPublicoObjetivo',$_POST['nivelEscolar'],PDO::PARAM_STR);
            $stmt->bindParam(':nombreInstitucion',$_POST['institucion'],PDO::PARAM_STR);
            $stmt->bindParam(':descripcionActividad',$_POST['descripcion'],PDO::PARAM_STR);
            $stmt->bindParam(':fechaHora',$_POST['fechaHora']);
            $stmt->bindParam(':duracion',$_POST['duracion'],PDO::PARAM_INT);
            $stmt->bindParam(':numeroPersonas',$_POST['numeroPersonas'],PDO::PARAM_INT);
            $stmt->bindParam(':modalidad',$_POST['modalidad'],PDO::PARAM_STR);
            $stmt->bindParam(':liga',$_POST['liga'],PDO::PARAM_STR);
            $stmt->bindParam(':creadoPor',$results['nombreContacto'],PDO::PARAM_STR);
            $stmt->bindParam(':modificadoPor',$results['nombreContacto'],PDO::PARAM_STR);
            
            date_default_timezone_set('America/Mexico_City'); 
            $fecha=date("Y-m-d H:i:s");
            $stmt->bindParam(':fechaCreacion',$fecha);
            $stmt->bindParam(':fechaModificacion',$fecha);

        }else{
        
            $sql="INSERT INTO actividad (programaEvento,tipoActividad,nombreActividad,area,nivelEscolarPublicoObjetivo,nombreInstitucion,descripcionActividad,fechaHora,duracion,modalidad,liga,fechaCreacion,fechaModificacion,numeroPersonas,creadoPor,modificadoPor) VALUES (:programaEvento,:tipoActividad,:nombreActividad,:area,:nivelEscolarPublicoObjetivo,:nombreInstitucion,:descripcionActividad,:fechaHora,:duracion,:modalidad,:liga,:fechaCreacion,:fechaModificacion,NULL,:creadoPor,:modificadoPor) "; 
            $stmt=$conn->prepare($sql);

            $stmt->bindParam(':programaEvento',$_POST['programaEvento'],PDO::PARAM_STR);
            $stmt->bindParam(':tipoActividad',$_POST['tipoActividad'],PDO::PARAM_STR);
            $stmt->bindParam(':nombreActividad',$_POST['nombreActividad'],PDO::PARAM_STR);
            $stmt->bindParam(':area',$_POST['area'],PDO::PARAM_STR);
            $stmt->bindParam(':nivelEscolarPublicoObjetivo',$_POST['nivelEscolar'],PDO::PARAM_STR);
            $stmt->bindParam(':nombreInstitucion',$_POST['institucion'],PDO::PARAM_STR);
            $stmt->bindParam(':descripcionActividad',$_POST['descripcion'],PDO::PARAM_STR);
            $stmt->bindParam(':fechaHora',$_POST['fechaHora']);
            $stmt->bindParam(':duracion',$_POST['duracion'],PDO::PARAM_INT);
            $stmt->bindParam(':modalidad',$_POST['modalidad'],PDO::PARAM_STR);
            $stmt->bindParam(':liga',$_POST['liga'],PDO::PARAM_STR);
            $stmt->bindParam(':creadoPor',$results['nombreContacto'],PDO::PARAM_STR);
            $stmt->bindParam(':modificadoPor',$results['nombreContacto'],PDO::PARAM_STR);
            
            date_default_timezone_set('America/Mexico_City'); 
            $fecha=date("Y-m-d H:i:s");
            $stmt->bindParam(':fechaCreacion',$fecha);
            $stmt->bindParam(':fechaModificacion',$fecha);

        }
    
        if($stmt->execute()){

            $query="SELECT idActividad FROM actividad WHERE programaEvento=:programaEvento AND tipoActividad=:tipoActividad AND nombreActividad=:nombreActividad AND area=:area AND nivelEscolarPublicoObjetivo=:nivelEscolarPublicoObjetivo AND nombreInstitucion=:nombreInstitucion AND descripcionActividad=:descripcionActividad AND duracion=:duracion  AND modalidad=:modalidad AND liga=:liga";
            $stmt=$conn->prepare($query);
            $stmt->bindParam(':programaEvento',$_POST['programaEvento'],PDO::PARAM_STR);
            $stmt->bindParam(':tipoActividad',$_POST['tipoActividad'],PDO::PARAM_STR);
            $stmt->bindParam(':nombreActividad',$_POST['nombreActividad'],PDO::PARAM_STR);
            $stmt->bindParam(':area',$_POST['area'],PDO::PARAM_STR);
            $stmt->bindParam(':nivelEscolarPublicoObjetivo',$_POST['nivelEscolar'],PDO::PARAM_STR);
            $stmt->bindParam(':nombreInstitucion',$_POST['institucion'],PDO::PARAM_STR);
            $stmt->bindParam(':descripcionActividad',$_POST['descripcion'],PDO::PARAM_STR);

            $stmt->bindParam(':duracion',$_POST['duracion'],PDO::PARAM_INT);

            $stmt->bindParam(':modalidad',$_POST['modalidad'],PDO::PARAM_STR);
            $stmt->bindParam(':liga',$_POST['liga'],PDO::PARAM_STR);
            $stmt->execute();

            $id=$stmt->fetch(PDO::FETCH_ASSOC);

            if(count($id)>0){

                $message='Actividad registrada <br> Ahora, agregue participantes presionando el ícono + de la tabla Participantes';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='good1';
                header('location: editarActividad?idActividad='.$id['idActividad'].'#ponente');
                exit();
    
                
            }else{

                $message='No se pudo encontrar la actividad';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='error';
                header('location: mostrarActividad');
                exit();
    
            }        
           
        }else{

            $message='Error, registro no completado';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='error';

            header('location: mostrarActividad');
            exit();

        }
    
    }

?>