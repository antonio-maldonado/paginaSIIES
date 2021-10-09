<?php

    session_start();
    error_reporting(E_ERROR | E_PARSE);
 
    require 'data.php';

    if($_SESSION['numu']==null){

        $_SESSION['numu']=10;

    }

    if(isset($_POST['numu'])){

        $_SESSION['numu']=$_POST['numu'];
        
        if($_SESSION['pagUsuario']>1){

            if(isset($_POST['numu'])){
                
                $_SESSION['numu']=$_POST['numu'];
                $_SESSION['pagUsuario']=1;
                header('Location: #user');
            
            }

        }
        
    }

    $inicio=($_SESSION['pagUsuario']-1)*$_SESSION['numu'];

    if($_SESSION['usuario']!=''){

            $query="SELECT * FROM usuario WHERE nombreInstitucion LIKE '%".$_SESSION['usuario']."%' OR programaEvento LIKE '%".$_SESSION['usuario']."%' OR nombreContacto LIKE '%".$_SESSION['usuario']."%' OR rango LIKE '%".$_SESSION['usuario']."%'  LIMIT :inicio,:num";
            $records=$conn->prepare($query);
            $records->bindParam(':inicio',$inicio,PDO::PARAM_INT);
            $records->bindParam(':num',$_SESSION['numu'],PDO::PARAM_INT);
            $records->execute();

            $query="SELECT * FROM usuario WHERE nombreInstitucion LIKE '%".$_SESSION['usuario']."%' OR programaEvento LIKE '%".$_SESSION['usuario']."%' OR nombreContacto LIKE '%".$_SESSION['usuario']."%' OR rango LIKE '%".$_SESSION['usuario']."%' ";
            $records1=$conn->prepare($query);
            $records1->execute();

     
    }else{
     
            $query="SELECT * FROM usuario LIMIT :inicio,:num";
            $records=$conn->prepare($query);
            $records->bindParam(':inicio',$inicio,PDO::PARAM_INT);
            $records->bindParam(':num',$_SESSION['numu'],PDO::PARAM_INT);
            $records->execute();


            $query="SELECT * FROM usuario";
            $records1=$conn->prepare($query);
            $records1->execute();
}

        if(isset($_POST['usuario'])){
                
            if($_POST['usuario']!=$_SESSION['usuario']){
                $_SESSION['pagUsuario']=1;
            
                //echo "<script>window.location = 'mostrarUsuarios?pagina=1'</script>";
                header('Location: #user');
            
            }
        $_SESSION['usuario']=$_POST['usuario'];
        }

            $numFilas=$records1->rowCount();

            $filasPagina=ceil($numFilas/$_SESSION['numu']);
            $_SESSION['pu']=$filasPagina;

    if(!isset($_SESSION['user_id'])){

        header('Location: login3');
        exit();

    }
            
?>

<table class="datatable" >

            <thead>

                <th class="width-20" rowspan="2">

                    Nombre

                </th>

                <th class="width-20" rowspan="2">

                    Institución

                </th>

                <th class="width-20" rowspan="2">

                    Programa

                </th>

                <th class="width-10" rowspan="2">
                    
                    Rango
                    
                </th>

                <th class="width-30"  colspan="5s">
                    
                    Acciones
                    
                </th>

                <tr>
      
                    <th scope="col">Nivel</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                    <th scope="col">Ver</th>
                    <th scope="col">Bloquear</th>

                </tr>

            </thead>

            <tbody>

                <?php
                    
             
                    while($results=$records->fetch(PDO::FETCH_ASSOC)){?>

                        <tr>
                            
                            <td class="centro">

                                <?= $results['nombreContacto']?>

                            </td>

                            <td class="centro">

                                <?= $results['nombreInstitucion']?>

                            </td>

                            <td class="centro">

                                <?= $results['programaEvento']?>

                            </td>

                            <td class="centro">

                                <?= $results['rango']?>

                            </td>

                            <?php

                                if($results['nivel']==0 && $results['rango']=='capturista'){

                            ?>

                                    <td class="centro">

                                        <div class="botones">

                                            <a alt="Nivel" class=" bt btn btn-primary nivel1" href="nivel?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-user-plus"></i></a>
                                        
                                        </div>

                                    </td>

                            <?php

                                }else  if($results['nivel']==1 && $results['rango']=='capturista'){

                            ?>

                                    <td class="centro">

                                        <div class="botones">

                                            <a alt="Nivel" class=" bt btn btn-primary nivel2" href="nivel?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-user-minus"></i></a>
                                        
                                        </div>

                                    </td>

                            <?php

                                }else{

                            ?>

                                    <td class="centro">

                                        <div class="botones">

                                            <a alt="Nivel" class="disable bt btn btn-primary nivel1" href="nivel?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-user-plus"></i></a>
                                        
                                        </div>

                                    </td>

                            <?php

                                }

                            ?>

                            <td class="centro">

                                <div class="botones">
                                    
                                    <a alt="Editar" class=" btn btn-warning" href="editarUsuario?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-edit"> </i></a>
                        
                                </div>

                            </td>

                            <?php if($_SESSION['user_id']!=$results['idUsuario']){ ?>

                                <td class="centro">

                                    <div class="botones">
                                    
                                        <a alt="Eliminar" class="  btn btn-danger" href="eliminarUsuario?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-trash-alt"> </i></a>
                            
                                    </div>

                                </td>

                            <?php }else{ ?>

                                        <td class="centro">

                                            <div class="botones">
                                            
                                                <a alt="Eliminar" class="disable btn btn-danger" href="eliminarUsuario?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-trash-alt"> </i></a>
                                    
                                            </div>

                                        </td>

                            <?php } ?>

                            <td class="centro">

                                <div class="botones">

                                    <a alt="Mostrar" class=" bt btn btn-primary" href="mostrarUsuario?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-eye"></i></a>
                                
                                </div>

                            </td>

                        <?php

                            if($results['apagar']==0){

                        ?>
                                <?php if($_SESSION['user_id']!=$results['idUsuario']){ ?>

                                <td class="centro">

                                    <div class="botones">

                                        <a alt="Apagar" class=" bt btn btn-primary apagar" href="apagar?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-user"></i></a>
                                    
                                    </div>

                                </td>

                                <?php }else{ ?>

                                    <td class="centro">

                                        <div class="botones">

                                            <a alt="Apagar" class="disable bt btn btn-primary apagar" href="apagar?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-user"></i></a>
                                        
                                        </div>

                                    </td>

                                <?php } ?>

                        <?php

                            }else{

                        ?>  

                                <td class="centro">

                                    <div class="botones">

                                        <a alt="Apagar" class=" bt btn btn-primary apagar1" href="apagar?idUsuario=<?php echo$results['idUsuario']?>"><i class="fas fa-user-slash"></i></a>
                                    
                                    </div>

                                </td>

                        <?php

                            }

                        ?>  
                                                    

                        </tr>

                <?php 
                            
                    }

                ?>

            </tbody>

        </table>

        <div class="footer-tools">

            <div class="list-items">

                Mostrar 
                <select name="n-entries" id="entries"  class="n-entries">

                <?php $pag=array(5,10,15,25,50);

            foreach ($pag as $value){

                    if($_SESSION['numu']==$value){

            ?>

                    <option selected="selected" value="<?=$_SESSION['numu']?>"><?=$_SESSION['numu']?></option>

            <?php }else{ ?>

                <option value="<?=$value?>"><?=$value?></option>

                <?php

            }}
                    ?>

                </select>

                por página

        </div>

        <div class="pages">

        <ul>

                <?php
                
                if($_SESSION['pagUsuario']<=1){ ?>

                <li>

                    <a class="disabled" href="mostrarUsuarios?pagina=<?=$_SESSION['pagUsuario']-1?>">
                    Atrás</a>

                </li>

        <?php }else{ ?>
            <li>
                    <a href="mostrarUsuarios?pagina=<?=$_SESSION['pagUsuario']-1?>">
                    Atrás</a>
                    </li>

        <?php } ?>

        

        <?php if($filasPagina>5){  if($_SESSION['pagUsuario']==1){?>
        
        <li><a class="active" href="mostrarUsuarios?pagina=<?=1?>">1</a></li>

        <li><a class="" href="mostrarUsuarios?pagina=<?=2?>">2</a></li>

        <li><a class="" href="mostrarUsuarios?pagina=<?=3?>">3</a></li>

        <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

        <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

        <?php } if($_SESSION['pagUsuario']==2){?>

                <li><a class="" href="mostrarUsuarios?pagina=<?=1?>">1</a></li>

                <li><a class="active" href="mostrarUsuarios?pagina=<?=2?>">2</a></li>

                <li><a class="" href="mostrarUsuarios?pagina=<?=3?>">3</a></li>

                <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>


            <?php }if($_SESSION['pagUsuario']==3){?>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=1?>">1</a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=2?>">2</a></li>

                    <li><a class="active" href="mostrarUsuarios?pagina=<?=3?>">3</a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>


                <?php }else if($_SESSION['pagUsuario']==3){?>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=1?>">1</a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=2?>">2</a></li>

                    <li><a class="active" href="mostrarUsuarios?pagina=<?=3?>">3</a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

        <?php    }else if($_SESSION['pagUsuario']>3 && $_SESSION['pagUsuario']<=$filasPagina-2){?>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=1?>">1</a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=$_SESSION['pagUsuario']-1?>"><?=$_SESSION['pagUsuario']-1?></a></li>

                    <li><a class="active" href="mostrarUsuarios?pagina=<?=$_SESSION['pagUsuario']?>"><?=$_SESSION['pagUsuario']?></a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=$_SESSION['pagUsuario']+1?>"><?=$_SESSION['pagUsuario']+1?></a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

        <?php  }else if($_SESSION['pagUsuario']==$filasPagina-1){?>

                        <li><a class="" href="mostrarUsuarios?pagina=<?=1?>">1</a></li>

                        <li><a class="" href="mostrarUsuarios?pagina=<?=2?>"><?=2?></a></li>

                        <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina-2?>"><?=$filasPagina-2?></a></li>

                        <li><a class="active" href="mostrarUsuarios?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                        <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

        <?php }else if($_SESSION['pagUsuario']==$filasPagina){?>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=1?>">1</a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=2?>"><?=2?></a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina-2?>"><?=$filasPagina-2?></a></li>

                    <li><a class="" href="mostrarUsuarios?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                    <li><a class="active" href="mostrarUsuarios?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

                    <?php }}else{ ?>

                <?php for($i=0;$i<$filasPagina;$i++){ 
                    
                    if($i==$_SESSION['pagUsuario']-1){?>

                        <li><a class="active" href="mostrarUsuarios?pagina=<?=$i+1?>"><?=$i+1?></a></li>

                <?php }else{
                    ?>

                    
                    <li><a href="mostrarUsuarios?pagina=<?=$i+1?>"><?=$i+1?></a></li>
                    <?php } }}?>

                    <?php if($_SESSION['pagUsuario']>=$filasPagina){ ?>
            
                    <li><a class="disabled" href="mostrarUsuarios?pagina=<?=$_SESSION['pagUsuario']+1?>">Siguiente</a></li>

                    <?php }else{ ?>
                        <li><a href="mostrarUsuarios?pagina=<?=$_SESSION['pagUsuario']+1?>">Siguiente</a></li>
                        <?php } ?>
                    
                     

                </ul>
            
        </div>
