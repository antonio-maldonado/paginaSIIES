<?php
       session_start();

    require 'data.php';
    use PhpOffice\PhpSpreadsheet\{Spreadsheet,IOFactory};
    require '../vendor/autoload.php';
   
    if(isset($_SESSION['user_id'])){

        $records=$conn->prepare('SELECT idUsuario,email,contrasena,nombreContacto,rango,nivel FROM usuario WHERE idUsuario=:id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $user=$records->fetch(PDO::FETCH_ASSOC);

    }else{

        header('Location: ../index');
        exit();
        
    }

    function exportarDatos($records){
        $bandera=false;
        session_start();

        require 'data.php';
            $hoja = new Spreadsheet();
            $hoja->getProperties()->setCreator("Antonio Maldonado")->setTitle("Hoja de cálculo de Actividades");
            $hoja->setActiveSheetIndex(0);
            $hojaCalculo=$hoja->getActiveSheet();
            $acumulador=1;

            $hojaCalculo->setCellValue('A'.$acumulador,'# Actividad');
            $hojaCalculo->setCellValue('B'.$acumulador,'Nombre Actividad');
            $hojaCalculo->setCellValue('C'.$acumulador,'Nombre Programa');
            $hojaCalculo->setCellValue('D'.$acumulador,'Tipo de actividad');
            $hojaCalculo->setCellValue('E'.$acumulador,'Área');
            $hojaCalculo->setCellValue('F'.$acumulador,'Nivel Escolar Publico Objetivo');
            $hojaCalculo->setCellValue('G'.$acumulador,'Nombre de la institucion o SEDE');
            $hojaCalculo->setCellValue('H'.$acumulador,'Descripcion de la Actividad');
            $hojaCalculo->setCellValue('I'.$acumulador,'Fecha y Hora de la actividad');
            $hojaCalculo->setCellValue('J'.$acumulador,'Duración de la actividad');
            $hojaCalculo->setCellValue('K'.$acumulador,'Número de personas');
            $hojaCalculo->setCellValue('L'.$acumulador,'Modalidad');
            $hojaCalculo->setCellValue('M'.$acumulador,'Liga(link)');
            $hojaCalculo->setCellValue('N'.$acumulador,'Fecha Creacion');
            $hojaCalculo->setCellValue('O'.$acumulador,'Fecha Modificacion');
            $hojaCalculo->setCellValue('P'.$acumulador,'Nombre participante');
            $hojaCalculo->setCellValue('Q'.$acumulador,'Tipo de participación');
            $hojaCalculo->setCellValue('R'.$acumulador,'Nivel académico');
            $hojaCalculo->setCellValue('S'.$acumulador,'Institución');
            $hojaCalculo->setCellValue('T'.$acumulador,'Teléfono');
            $hojaCalculo->setCellValue('U'.$acumulador,'Correo');
            $hojaCalculo->setCellValue('V'.$acumulador,'Fecha Creacion');
            $hojaCalculo->setCellValue('W'.$acumulador,'Fecha Modificacion');

            while($results=$records->fetch(PDO::FETCH_ASSOC)){
 
                $acumulador=$acumulador+1;

                $stmt='SELECT * from ponente WHERE id=:idActividad';
                $ponente=$conn->prepare($stmt);
                $ponente->bindParam(':idActividad',$results['idActividad']);
                $ponente->execute();
                $ponente1=$ponente->fetch(PDO::FETCH_ASSOC);
 
                if(empty($ponente1)){

                    $hojaCalculo->setCellValue('A'.$acumulador,$results['idActividad']);
                    $hojaCalculo->setCellValue('B'.$acumulador,$results['nombreActividad']);
                    $hojaCalculo->setCellValue('C'.$acumulador,$results['programaEvento']);
                    $hojaCalculo->setCellValue('D'.$acumulador,$results['tipoActividad']);
                    $hojaCalculo->setCellValue('E'.$acumulador,$results['area']);
                    $hojaCalculo->setCellValue('F'.$acumulador,$results['nivelEscolarPublicoObjetivo']);
                    $hojaCalculo->setCellValue('G'.$acumulador,$results['nombreInstitucion']);
                    $hojaCalculo->setCellValue('H'.$acumulador,$results['descripcionActividad']);
                    $hojaCalculo->setCellValue('I'.$acumulador,$results['fechaHora']);
                    $hojaCalculo->setCellValue('J'.$acumulador,$results['duracion']);
                    $hojaCalculo->setCellValue('K'.$acumulador,$results['numeroPersonas']);
                    $hojaCalculo->setCellValue('L'.$acumulador,$results['modalidad']);
                    $hojaCalculo->setCellValue('M'.$acumulador,$results['liga']);
                    $hojaCalculo->setCellValue('N'.$acumulador,$results['fechaCreacion']);
                    $hojaCalculo->setCellValue('O'.$acumulador,$results['fechaModificacion']);

                }else{

                    $stmt='SELECT * from ponente WHERE id=:idActividad';
                    $ponente=$conn->prepare($stmt);
                    $ponente->bindParam(':idActividad',$results['idActividad']);
                    $ponente->execute();
        
                    while($ponente1=$ponente->fetch(PDO::FETCH_ASSOC)){

                        $hojaCalculo->setCellValue('A'.$acumulador,$results['idActividad']);
                        $hojaCalculo->setCellValue('B'.$acumulador,$results['nombreActividad']);
                        $hojaCalculo->setCellValue('C'.$acumulador,$results['programaEvento']);
                        $hojaCalculo->setCellValue('D'.$acumulador,$results['tipoActividad']);
                        $hojaCalculo->setCellValue('E'.$acumulador,$results['area']);
                        $hojaCalculo->setCellValue('F'.$acumulador,$results['nivelEscolarPublicoObjetivo']);
                        $hojaCalculo->setCellValue('G'.$acumulador,$results['nombreInstitucion']);
                        $hojaCalculo->setCellValue('H'.$acumulador,$results['descripcionActividad']);
                        $hojaCalculo->setCellValue('I'.$acumulador,$results['fechaHora']);
                        $hojaCalculo->setCellValue('J'.$acumulador,$results['duracion']);
                        $hojaCalculo->setCellValue('K'.$acumulador,$results['numeroPersonas']);
                        $hojaCalculo->setCellValue('L'.$acumulador,$results['modalidad']);
                        $hojaCalculo->setCellValue('M'.$acumulador,$results['liga']);
                        $hojaCalculo->setCellValue('N'.$acumulador,$results['fechaCreacion']);
                        $hojaCalculo->setCellValue('O'.$acumulador,$results['fechaModificacion']);
                        $hojaCalculo->setCellValue('P'.$acumulador,$ponente1['nombre']);
                        $hojaCalculo->setCellValue('Q'.$acumulador,$ponente1['tipoParticipante']);
                        $hojaCalculo->setCellValue('R'.$acumulador,$ponente1['nivelAcademico']);
                        $hojaCalculo->setCellValue('S'.$acumulador,$ponente1['institucion']);
                        $hojaCalculo->setCellValue('T'.$acumulador,$ponente1['telefono']);
                        $hojaCalculo->setCellValue('U'.$acumulador,$ponente1['email']);
                        $hojaCalculo->setCellValue('V'.$acumulador,$ponente1['fechaCreacion']);
                        $hojaCalculo->setCellValue('W'.$acumulador,$ponente1['fechaModificacion']);

                        $acumulador=$acumulador+1;

                        $bandera=true;
            
                    }
            
                    if($bandera){

                        $acumulador=$acumulador-1;
                        $bandera=false;

                    }

                }

            }
        
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="actividades.xlsx"');
            header('Cache-Control: max-age=0');
        
            $writer = IOFactory::createWriter($hoja, 'Xlsx');
          
            $writer->save('php://output');
            
            exit();

    }

    error_reporting(E_ERROR | E_PARSE);
 
    $num=10;
  
    if($_SESSION['num']==null){

        $_SESSION['num']=10;
   
    }
  
    if(isset($_POST['num'])){

        $_SESSION['num']=$_POST['num'];

        if($_SESSION['pagActividad']>1){

            if(isset($_POST['num'])){
                
                $_SESSION['num']=$_POST['num'];
                $_SESSION['pagActividad']=1;
                header('Location: #datos');
        
            }

        }

    } 
  
    $inicio=($_SESSION['pagActividad']-1)*$_SESSION['num'];
   
        if($_SESSION['consulta']==''){
            
            if($_SESSION['rango']=='capturista'){
    
                $records=$conn->prepare('SELECT * FROM actividad WHERE nombreInstitucion=:nombreInstitucion LIMIT :inicio,:num');
               
                $records->bindParam(':nombreInstitucion',$_SESSION['institucion']);
                $records->bindParam(':inicio',$inicio,PDO::PARAM_INT);
                $records->bindParam(':num',$_SESSION['num'],PDO::PARAM_INT);
                $records->execute();

                $records1=$conn->prepare('SELECT * FROM actividad WHERE nombreInstitucion=:nombreInstitucion ');
                $records1->bindParam(':nombreInstitucion',$_SESSION['institucion']);
                $records1->execute();
                
    
            }else if($_SESSION['rango']=='admin'){

                $query="SELECT * FROM actividad LIMIT :inicio,:num";
                
                $records=$conn->prepare($query);
                $records->bindParam(':inicio',$inicio,PDO::PARAM_INT);
                $records->bindParam(':num',$_SESSION['num'],PDO::PARAM_INT);
                $records->execute();
         
                $query="SELECT * FROM actividad";
                $records1=$conn->prepare($query);
                $records1->execute();
    
            }

        }else{

            if($_SESSION['rango']=='admin'){

                $query="SELECT * FROM actividad  WHERE nombreActividad LIKE '%".$_SESSION['consulta']."%'   OR programaEvento LIKE '%".$_SESSION['consulta']."%' OR area LIKE '%".$_SESSION['consulta']."%' OR nombreInstitucion LIKE '%".$_SESSION['consulta']."%' LIMIT :inicio,:num";
                $records=$conn->prepare($query);
                $records->bindParam(':inicio',$inicio,PDO::PARAM_INT);
                $records->bindParam(':num',$_SESSION['num'],PDO::PARAM_INT);
                $records->execute();

                $query="SELECT * FROM actividad WHERE nombreActividad LIKE '%".$_SESSION['consulta']."%'   OR programaEvento LIKE '%".$_SESSION['consulta']."%' OR area LIKE '%".$_SESSION['consulta']."%' OR nombreInstitucion LIKE '%".$_SESSION['consulta']."%' ";
                $records1=$conn->prepare($query);
                $records1->execute();
               
                }else{

                    $query="SELECT * FROM actividad WHERE (nombreActividad LIKE '%".$_SESSION['consulta']."%' OR programaEvento LIKE '%".$_SESSION['consulta']."%' OR area LIKE '%".$_SESSION['consulta']."%' OR nombreInstitucion LIKE '%".$_SESSION['consulta']."%') AND nombreInstitucion=:institucion LIMIT :inicio,:num";
                    
                    $records=$conn->prepare($query);
                    $records->bindParam(':institucion',$_SESSION['institucion']);
                    $records->bindParam(':inicio',$inicio,PDO::PARAM_INT);
                    $records->bindParam(':num',$_SESSION['num'],PDO::PARAM_INT);
                    $records->execute();
        
                    $query="SELECT * FROM actividad WHERE (nombreActividad LIKE '%".$_SESSION['consulta']."%' OR programaEvento LIKE '%".$_SESSION['consulta']."%' OR area LIKE '%".$_SESSION['consulta']."%' OR nombreInstitucion LIKE '%".$_SESSION['consulta']."%') AND nombreInstitucion=:institucion";
                    
                    $records1=$conn->prepare($query);
                    $records1->bindParam(':institucion',$_SESSION['institucion']);
                    $records1->execute();
                  
                }
    
          }

          if(isset($_POST['consulta'])){
          
            if($_POST['consulta']!=$_SESSION['consulta']){

                $_SESSION['pagActividad']=1;
                header('Location: #datos');
               
            }

            $_SESSION['consulta']=$_POST['consulta'];

          }

    $numFilas=$records1->rowCount();

    $filasPagina=ceil($numFilas/$_SESSION['num']);
    $_SESSION['pp']=$filasPagina;

             
   if(isset($_POST['save'])){

        exportarDatos($records1);

    }

    if(!isset($_SESSION['user_id'])){

        header('Location: login3');
        exit();

    }

?>
          
<?php

    if($user['nivel']==0){

?>

        <table class="datatable">

            <thead>

                <tr>
                    
                    <th class="width-15" rowspan="2">

                        Programa

                    </th>

                    <th class="width-20" rowspan="2">

                        Nombre de la Actividad

                    </th>

                    <th class="width-25" rowspan="2">

                        Área

                    </th>

                    <th class="width-20" rowspan="2">

                        Institución
                        
                    </th>

                    <th class="width-20"  colspan="3">
                        
                        Acciones

                    </th>

                </tr>
                
                <tr>
      
                    <th scope="col">Editar</th>
                    <th  scope="col">Borrar</th>
                    <th  scope="col">Ver</th>
  
                </tr>

            </thead>

            <tbody>
               
            <?php
                    
                    while($results=$records->fetch(PDO::FETCH_ASSOC)){?>
                    

                        <tr>
                            
                            <td class="centro">

                                <?= $results['programaEvento']?>

                            </td>

                            <td class="centro">

                                <?= $results['nombreActividad']?>

                            </td>

                            <td class="centro">

                                <?= $results['area']?>

                            </td>


                            <td class="centro">

                                <?= $results['nombreInstitucion']?>

                            </td>

                            <td class="centro" >
                                    
                                <div class="botones">

                                    <a alt="Editar" class="btn btn-warning " href="editarActividad?idActividad=<?php echo$results['idActividad']?>"><i class="fas fa-edit"> </i></a>
                                    
                                </div>

                                </td>

                            <td class="centro" >

                                <div class="botones">

                                    <a alt="Eliminar" class="btn btn-danger" href="eliminarActividad?idActividad=<?php echo$results['idActividad']?>"><i class="fas fa-trash-alt"> </i></a>
                                    
                                </div>

                            </td>

                            <td class="centro" >

                                <div class="botones">

                                    <a alt="Insertar" class="btn btn-primary" href="mostrarActi?idActividad=<?php echo$results['idActividad']?>"><i class="fas fa-eye"></i></i></a>
                                    
                                </div>

                            </td>

                        </tr>
                    
                <?php 

                    }

                ?><div id="datos">
                   
                </div>
 
             </tbody>
 
         </table>

<?php

    }else{

?>

        <table class="datatable">

            <thead>

                <tr>
                    
                    <th rowspan="2">

                        Programa

                    </th>

                    <th rowspan="2">

                        Nombre de la Actividad

                    </th>

                    <th rowspan="2">

                        Área

                    </th>

                    <th rowspan="2">

                        Institución
                        
                    </th>

                    <th colspan="1">
                        
                        Acciones

                    </th>

                </tr>
                
                <tr>

                    <th scope="col">Ver</th>
  
                </tr>

            </thead>

            <tbody>
               
            <?php
                    
                    while($results=$records->fetch(PDO::FETCH_ASSOC)){?>
                    

                        <tr>
                            
                            <td class="centro">

                                <?= $results['programaEvento']?>

                            </td>

                            <td class="centro">

                                <?= $results['nombreActividad']?>

                            </td>

                            <td class="centro">

                                <?= $results['area']?>

                            </td>


                            <td class="centro">

                                <?= $results['nombreInstitucion']?>

                            </td>

                            <td class="centro" >

                                <div class="botones">

                                    <a alt="Insertar" class="btn btn-primary" href="mostrarActi?idActividad=<?php echo$results['idActividad']?>"><i class="fas fa-eye"></i></i></a>
                                    
                                </div>

                            </td>

                        </tr>
                    
                <?php 

                    }

                ?><div id="datos">
                   
                </div>
 
             </tbody>
 
         </table>
<?php

    }

?>
         

        <div class="footer-tools">

            <div class="list-items">

                Mostrar 
                <select name="n-entries" id="n-entries"  class="n-entries">

                <?php $pag=array(5,10,15,25,50);
                
                    foreach ($pag as $value){

                            if($_SESSION['num']==$value){

                ?>
                                <option selected="selected" value="<?=$_SESSION['num']?>"><?=$_SESSION['num']?></option>

                        <?php   

                            }else{
                                
                        ?>

                                <option value="<?=$value?>"><?=$value?></option>

                        <?php

                            }

                        }

                        ?>

                </select>
                por página

            </div>

            <div class="pages">

                <ul>

                    <?php
                    
                    if($_SESSION['pagActividad']<=1){ ?>
                    <li>
                        <a class="disabled" href="mostrarActividad.php?pagina=<?=$_SESSION['pagActividad']-1?>">
                        Atrás</a>
                        </li>

            <?php }else{ ?>
                <li>
                        <a href="mostrarActividad.php?pagina=<?=$_SESSION['pagActividad']-1?>">
                        Atrás</a>
                        </li>

            <?php }if($filasPagina<=5){ ?>

                    <?php for($i=0;$i<$filasPagina;$i++){ 
                        
                        if($i==$_SESSION['pagActividad']-1){?>

                            <li><a class="active" href="mostrarActividad.php?pagina=<?=$i+1?>"><?=$i+1?></a></li>

                    <?php }else{
                        ?>

                        
                        <li><a href="mostrarActividad.php?pagina=<?=$i+1?>"><?=$i+1?></a></li>
                        <?php } }}else{
                            
          
                        
                                if($_SESSION['pagActividad']==1){?>
        
                                    <li><a class="active" href="mostrarActividad.php?pagina=<?=1?>">1</a></li>

                                    <li><a class="" href="mostrarActividad.php?pagina=<?=2?>">2</a></li>

                                    <li><a class="" href="mostrarActividad.php?pagina=<?=3?>">3</a></li>

                                    <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                                    <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>
        
                            <?php }if($_SESSION['pagActividad']==2){?>
        
                                    <li><a class="" href="mostrarActividad.php?pagina=<?=1?>">1</a></li>

                                    <li><a class="active" href="mostrarActividad.php?pagina=<?=2?>">2</a></li>

                                    <li><a class="" href="mostrarActividad.php?pagina=<?=3?>">3</a></li>

                                    <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                                    <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

        
                                <?php }if($_SESSION['pagActividad']==3){?>
        
                                        <li><a class="" href="mostrarActividad.php?pagina=<?=1?>">1</a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=2?>">2</a></li>

                                        <li><a class="active" href="mostrarActividad.php?pagina=<?=3?>">3</a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>


                                    <?php }else if($_SESSION['pagActividad']==3){?>
                            
                                        <li><a class="" href="mostrarActividad.php?pagina=<?=1?>">1</a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=2?>">2</a></li>

                                        <li><a class="active" href="mostrarActividad.php?pagina=<?=3?>">3</a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

                               <?php    }else if($_SESSION['pagActividad']>3 && $_SESSION['pagActividad']<=$filasPagina-2){?>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=1?>">1</a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=$_SESSION['pagActividad']-1?>"><?=$_SESSION['pagActividad']-1?></a></li>

                                        <li><a class="active" href="mostrarActividad.php?pagina=<?=$_SESSION['pagActividad']?>"><?=$_SESSION['pagActividad']?></a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=$_SESSION['pagActividad']+1?>"><?=$_SESSION['pagActividad']+1?></a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

                               <?php  }else if($_SESSION['pagActividad']==$filasPagina-1){?>

                                            <li><a class="" href="mostrarActividad.php?pagina=<?=1?>">1</a></li>

                                            <li><a class="" href="mostrarActividad.php?pagina=<?=2?>"><?=2?></a></li>

                                            <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina-2?>"><?=$filasPagina-2?></a></li>

                                            <li><a class="active" href="mostrarActividad.php?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                                            <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

                               <?php }else if($_SESSION['pagActividad']==$filasPagina){?>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=1?>">1</a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=2?>"><?=2?></a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina-2?>"><?=$filasPagina-2?></a></li>

                                        <li><a class="" href="mostrarActividad.php?pagina=<?=$filasPagina-1?>"><?=$filasPagina-1?></a></li>

                                        <li><a class="active" href="mostrarActividad.php?pagina=<?=$filasPagina?>"><?=$filasPagina?></a></li>

                                        <?php }else if($_SESSION['pagActividad']>$filasPagina || $_SESSION['pagActividad']<1){ 

                                                    $_SESSION['pagActividad']=1;
                                                    header('Location: mostrarActividad?pagina=1');
                                                    exit();
   
                                         }
                                                                        
                            }
                        ?>

                        <?php if($_SESSION['pagActividad']>=$filasPagina){ ?>
                
                        <li><a class="disabled" href="mostrarActividad.php?pagina=<?=$_SESSION['pagActividad']+1?>">Siguiente</a></li>

                        <?php }else{ ?>
                            <li><a href="mostrarActividad.php?pagina=<?=$_SESSION['pagActividad']+1?>">Siguiente</a></li>
                            <?php } ?>
                    </ul>
                
            </div>

        </div>
   
    <?php
   


    ?>