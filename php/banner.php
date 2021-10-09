<?php

    $tabName='Banner';

    session_start();
    require 'data.php';

    if(isset($_SESSION['user_id'])){
        
        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        if($results['rango']!='admin'){

            header('Location: mostrarActividad');
            exit();

        }
  
    }else{

        header('Location: login3');
        exit();

    }

?>

<?php include '../includes/header.php'?>

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
                   
            <a href="mostrarActividad" class="padi">Actividades</a>

            <a href="mostrarUsuarios" class="padi">Usuarios</a>

            <a href="banner" class="padi pestana">Banner</a>

            <a href="mostrarCatalogo" class="padi">Catálogo</a>

            <a href="logout" class="padi">Cerrar Sesión</a>
                
        </div>
            
    </div>


     <div class="centro pt-4 pb-4 mt">

        <h1>

            Banners

        </h1>

    </div>

    
    <div class="datatable-container">

        <div class="header-tools">

            <div class="tools">

                        <div class="agregar-boton">

                            <a alt="Insertar" class="btn btn-primary boton"  href="insertarImagen">Agregar Imagen</a>

                        </div>

            </div>

        </div>

        <table class="datatable">

            <thead>

                <tr>

                    <th class="width-30" rowspan="2">

                        Nombre

                    </th>

                    <th class="width-40" rowspan="2">

                        Imagen

                    </th>

                    <th class="width-30" colspan="2">

                        Acciones

                    </th>

                </tr>

                <tr>
      
                    <th class="width-15"  scope="col">Seleccionar banner</th>
                    <th class="width-15" scope="col">Borrar</th>

                </tr>

            </thead>

            <tbody>

                <?php

                         

                    $records=$conn->prepare('SELECT * FROM imagen');
                    $records->execute();
                            
                    while($results=$records->fetch(PDO::FETCH_ASSOC)){
                           
                ?>
                 
                        <tr>
                            

                            <td >

                                <?= $results['titulo']?>

                            </td>

                            <td class="centro">

                                <img width=200px src="data:<?=$results['tipo']?>;base64,<?=base64_encode($results['img']);?>" alt="">
                                    
                         
                            </td>

                            <td class="centro">

                                <div class="botones">

                                    <?php

                                        if($results['banner']==0){

                                    ?>

                                    <a alt="Insertar" class="btn btn-primary " href="setBanner?id=<?php echo$results['id']?>"><i class="fas fa-star"></i></i></i></a>
                                    
                                    <?php

                                        }else{

                                    ?>

                                            <a alt="Insertar" class="btn btn-primary boton2 " href="setBanner?id=<?php echo$results['id']?>"><i class="fas fa-star"></i></i></i></a>
                                    

                                    <?php

                                        }

                                    ?>

                                </div>

                                </td>
                            <td class="centro">

                                <div class="botones">

                                    <a alt="Eliminar" class="btn btn-danger" href="eliminarImagen?id=<?php echo$results['id']?>"><i class="fas fa-trash-alt"> </i></a>
                                    
                                </div>

                            </td>
                           
                        </tr>
                    
                <?php 

                    }

                ?>

            </tbody>

        </table>

    </div>

    <div id="imagen"></div>

    <br>

<?php include '../includes/footer.php'?>
   