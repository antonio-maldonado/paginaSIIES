$('#fi').focus(function(){
  var that = this;
  setTimeout(function(){ that.selectionStart = that.selectionEnd = 10000; }, 0);
});

const inputs = document.querySelectorAll(".form__input")

/*=== Add focus ===*/
function addfocus(){
    let parent = this.parentNode.parentNode
    parent.classList.add("focus")
}

/*=== Remove focus ===*/
function remfocus(){
    let parent = this.parentNode.parentNode
    if(this.value == ""){
        parent.classList.remove("focus")
    }
}

/*=== To call function===*/
inputs.forEach(input=>{
    input.addEventListener("focus",addfocus)
    input.addEventListener("blur",remfocus)
})

$(buscar_datos());
$(buscar_usuario());
$(numero());
$(numeroU());

function numeroU(numu){
  $.ajax({
      url: 'buscarUsuario.php',
      type: 'POST',
      dataType: 'html',
      data:{numu:numu},
  })
      .done(function (respuesta) {
          $("#user").html(respuesta);
      })
      
}

$(document).on('input','#entries',function(){
  var valor=$(this).val();
  if(valor !=""){
    numeroU(valor);
  }else{
    numeroU();
  }
});

function numero(num){
  $.ajax({
      url: 'buscarActividad.php',
      type: 'POST',
      dataType: 'html',
      data:{num:num},
  })
      .done(function (respuesta) {
          $("#datos").html(respuesta);
      })
     

}

$(document).on('input','#n-entries',function(){
  var valor=$(this).val();
  if(valor !=""){
    numero(valor);
  }else{
    numero();
  }
});

function buscar_datos(consulta){
  $.ajax({
      url: 'buscarActividad.php',
      type: 'POST',
      dataType: 'html',
      data:{consulta:consulta},
  })
      .done(function (respuesta) {
          $("#datos").html(respuesta);
      })
      

}

$(document).on('input','#caja_busqueda',function(){
  var valor=$(this).val();
  if(valor !=""){

    buscar_datos(valor);
  }else{
    buscar_datos("");
  }

});

function buscar_usuario(usuario){
  $.ajax({
      url: 'buscarUsuario.php',
      type: 'POST',
      dataType: 'html',
      data:{usuario:usuario},
  })
      .done(function (respuesta) {
          $("#user").html(respuesta);
      })
      

}

$(document).on('input','#busqueda',function(){
  var valor=$(this).val();
  if(valor !=""){
    buscar_usuario(valor);
  }else{
    buscar_usuario("");
  }
});


function opcion(opt){
  $.ajax({
      url: 'buscarActividad.php',
      type: 'POST',
      dataType: 'html',
      data:{opt:opt},
  })
      .done(function (respuesta) {
          $("#datos").html(respuesta);
      })
    

}

$(document).on('change','#opcionId',function(){
  var valor=$(this).val();
  if(valor !=""){
    opcion(valor);
  }else{
    opcion();
  }
});


function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

document.querySelector('.menu-btn').addEventListener('click',()=>{
  document.querySelector('.nav-menu').classList.toggle('show');
})
