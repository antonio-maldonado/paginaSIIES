
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../javascript/main.js"></script>

</body>

</html>

    <?php
        
        error_reporting(E_ERROR | E_PARSE);

        if(isset($_SESSION['message'])){

            $aux=$_SESSION['message'];
            
            if($_SESSION['tipo']=='good'){

                echo "<script>Swal.fire({

                    html:'<h4><b>$aux</b></h4>',
                    
                    confirmButtonColor: '#3085d6',
                    icon: 'success',
                    position:'bottom-start',
                    showCloseButton:true,
                    focusConfirm:false,
                    timer:6000,
                    timerProgressBar:true,
                    toast: true,
                    showConfirmButton: false,
                    customClass: {
                        popup:'texto',
                        icon:'ic',
                        container:'h4',
                    },
                });
                    </script>";

                    $_SESSION['tipo']=null;

            }else if($_SESSION['tipo']=='error'){

                echo "<script>Swal.fire({
    
                    html:'<h4><b>$aux</b></h4>',
                    timer:9000,
                    confirmButtonColor: '#3085d6',
                    icon: 'error',
                    position:'bottom-start',
                    buttonsStyling:true,
                    showCloseButton:true,
                    focusConfirm:false,
                    timerProgressBar:true,
                    toast: true,
                    showConfirmButton: false,
                    customClass: {
                        content:'texto',
                        icon:'ic',

                        text:'txt',
                    },
                });
                    </script>";

                $_SESSION['tipo']=null;

                }else if($_SESSION['tipo']=='caution'){
                    echo "<script>Swal.fire({
        
                        html:'<h4><b>$aux</b></h4>',
                        timer:9000,
                        confirmButtonColor: '#3085d6',
                        icon: 'warning',
                        position:'bottom-start',
                        buttonsStyling:true,
                        showCloseButton:true,
                        focusConfirm:false,
                        timerProgressBar:true,
                        toast: true,
                        showConfirmButton: false,
                        customClass: {
                            content:'texto',
                            icon:'ic',
                            closeButton:'close',
                            text:'txt',
                        },
                    });
                        </script>";

                    $_SESSION['tipo']=null;

                    }else if($_SESSION['tipo']=='good1'){

                        echo "<script>Swal.fire({ 
                             
                            icon: 'success',
                            showCloseButton:true,
                            showConfirmButton: false,
                            html:'<h3>$aux</h3>',   
                           
                        });
                            </script>";
        
                            $_SESSION['tipo']=null;
        
                    }else if($_SESSION['tipo']=='good2'){
                        $href="insertarActividad";
                        $href1="insertarPonente?idActividad=".$_SESSION['idA'];
                        $clase="nada";

                        echo "<script>Swal.fire({  
                            icon: 'success',
                            showCloseButton:true,
                            showConfirmButton: true,
                            html:'<h3>$aux</h3>', 

                            showCancelButton: true,
                            confirmButtonText: '<a class=$clase href=$href>Agregar Actividad</a>',
                            cancelButtonText: '<a class=$clase href=$href1>Agregar Participante</a>',
                            
                        });
                            </script>";
        
                            $_SESSION['tipo']=null;
        
                    }


            $_SESSION['message']=null;
            
        }

    ?>
