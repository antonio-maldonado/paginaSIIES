<?php

    $tabName='Iniciar Sesíon';

    session_start();
    require 'data.php';

    if(isset($_SESSION['user_id'])){

        header('Location: mostrarActividad');
        exit();

    }

    if(!empty($_POST['email']) && !empty($_POST['password'])){

        $records=$conn->prepare('SELECT idUsuario, email, contrasena,rango,apagar FROM usuario WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $user=$records->fetch(PDO::FETCH_ASSOC);

        if(empty($user)){

            $message='No existe ese correo';
            $_SESSION['message']=$message;
            $_SESSION['tipo']='caution';
    
        }else{

            $message='';

            if($user['apagar']==1){

                $message='No tienes permiso para acceder';
                $_SESSION['message']=$message;
                $_SESSION['tipo']='error';

            }else{

                if(count($user)>0 && password_verify($_POST['password'],$user['contrasena'])){

                    $_SESSION['user_id']=$user['idUsuario'];
                    
                    header('Location: mostrarActividad');
                    exit();
                    
                }else{

                    $message='La contraseña es incorrecta';
                    $_SESSION['message']=$message;
                    $_SESSION['tipo']='error';

                }

            }

        }

    }

?>

<?php include '../includes/header.php'; ?>
    
<header class="global">

    <img src="../img/img1.png" class="fondo" alt="">

    <div class="l-form">
    
        <div class="form">

    <?php

        $query='SELECT * FROM imagen WHERE banner=:banner';
        $img=$conn->prepare($query);
        $uno=1;
        $img->bindParam(':banner',$uno);
        $img->execute();
        $imagen=$img->fetch(PDO::FETCH_ASSOC);

        ?>  
  
       <form action="" class="form__content" method="POST">
       <img src="data:<?=$imagen['tipo']?>;base64,<?=base64_encode($imagen['img']);?>" class="form__img login1" alt="">
    
                <h1 class="form__title">
                    Iniciar Sesión
                </h1>
                <?php

                        if(!empty($_POST['email'])){
                            
                    ?>

                <div class="form__div focus form__div-one">

                    <div class="form__icon">

                        <i class='bx bx-user-circle ic'></i>

                    </div>

                    <div class="form__div-input">
                        
                            <label for="" class="form__label">Correo electrónico</label>
                            <input type="text" name="email" id="fi" value="<?=$_POST['email']?>" placeholder=" "  onfocus="var val=this.value; this.value=''; this.value= val;" class="form__input" autofocus required>

                    </div>

                </div>

                <?php

                        }else{

                ?>

                <div class="form__div focus form__div-one">

                    <div class="form__icon">

                        <i class='bx bx-user-circle ic'></i>

                    </div>

                    <div class="form__div-input">
                                          
                            <label for="" class="form__label">Correo electrónico</label>
                            <input type="text" name="email" id="fi" class="form__input" placeholder=" " onfocus="var val=this.value; this.value=''; this.value= val;" autofocus required>

                      
                    </div>

                </div>

                <?php

                    }

                ?> 


                <div class="form__div">

                    <div class="form__icon">

                        <i class='bx bx-lock ic'></i>

                    </div>

                    <div class="form__div-input">

                        <label for="" class="form__label">Contraseña</label>
                        <input type="password" name="password" id="fi" class="form__input" required>


                    </div>

                </div>

                <input type="submit" value="Enviar" class="form__button">

            </form>

       

        </div>
     
    </div>
                </header>
               
   
<?php include '../includes/footer.php'; ?>