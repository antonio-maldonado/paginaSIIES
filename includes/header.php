
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">

    <title> <?=$tabName?> </title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/03bb5336a4.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">

<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans:wght@700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
/*
* Prefixed by https://autoprefixer.github.io
* PostCSS: v8.3.6,
* Autoprefixer: v10.3.1
* Browsers: last 4 version
*/

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');

*{
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    margin: 0;
    padding: 0;
 
}

body{
    background:white;
    color: rgb(75, 75, 75);
  
    
}




a{

    color:white;
    text-decoration: none;

}

ul{
    list-style: none;
}

.container1{

    width: 100%;
    margin: auto;

}

.nav-main{

    font-size: 22px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
        -ms-flex-pack: justify;
            justify-content: space-between;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    height: 64px;
   
     background: rgba(17, 17, 17, 0.6);

 
    right: 0;
    width: 100% !important;
    left: 0;
    z-index: 20;
  
}



.nav-brand{
    width: 200px;
    
}

.nav-main ul{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}

.nav-main ul li{
    padding-right: 20px;
}


.nav-main ul li a{

    padding: 5px;
}

.nav-main ul li a:hover{

   border-bottom: 2px solid #fff;
    color: white;
}


.nav-main ul.nav-menu{
    -webkit-box-flex: 1;
        -ms-flex: 1;
            flex: 1;
  
    display: flex;
    display: -webkit-box;
    display: -ms-flexbox;
    -webkit-box-pack: end;
        -ms-flex-pack: end;
            justify-content: flex-end;

}

input[type="text"].search-input{
    outline: none;
    padding: 15px 8px;
    display: block;
    width: 450px;
    border-radius: 3px;
    border: 1px solid #eee;
 margin-bottom: 10px;
    font-size: 16px;
}

/*
input[type="text"],input[type="password"], input[type="tel"], input[type="email"],input[type="number"],input[type="datetime-local"],textarea,p.form-control{
    outline: none;
    padding: 15px;
    display: block;
    width: 450px;
    border-radius: 3px;
    border: 1px solid #eee;
    margin-bottom: 20px;
}*/

input[type="submit"].field{

    padding: 15px;
    color: #fff;
    background: #0098cb;
    width: 250px;
    height: auto;
    margin: 0px auto;
    margin-top: 0px;
    border: 0;
    border-radius: 23px;
    cursor: pointer;

}


button[type="submit"]{


    color: #fff;
    background: #0dd107;
    width: 50%;
    max-width: 300px;
    height: auto;
    margin: 0px auto;
    margin-top: 0px;
    border: 0;
    border-radius: 23px;
    cursor: pointer;
    font-size: 20px;
    font-weight: 900;
    border: none;
    padding: 0 10px;

}

button[type="submit"].exp:hover{
    border: none;
    background: #24f51d;
}

.centro{

    text-align: center;

}

input[type="submit"].field:hover{
    background: #00b8eb;
}

header{

    padding: 20px 0px;
    margin-bottom: 10px;
    width: 100%;
    text-align: center;
    
}

header a{
    text-decoration: none;
    color: #333;
    display: -webkit-box;
display: -ms-flexbox;;
    display: -webkit-box;
    display: -ms-flexbox;
    -webkit-box-pack: right;
        -ms-flex-pack: right;
            justify-content: right;
    margin: 1000px;
}

.form-control{
    color: #000;
    font-size: 18px;
    text-align: left;
    font-weight: 0;
    
}

th{
    text-align: center;
    font-size: 20px;
    font-weight: 999;
}

select.form-control{
    padding: 15px;
}

label.form-control{
    font-weight: 0;

}

.boton2{
    background: yellowgreen;
    border: 0;
}

.boton2:hover{
    
    background: yellowgreen;
    opacity: 0.7;
}

.center {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -ms-flex-line-pack: center;
        align-content: center;

}

table.tablita{

    margin-left: auto;
    margin-right: auto;

    max-width: 80%;
}

.tablita{
    width: 60%;
}

.tablota{

    margin-left: auto;
    margin-right: auto;

    width: 90%;

}
table.tablita-catalogo{

    width:70%; 
    margin-left:15%; 
    margin-right:15%;
}

div.botones{

    display: -webkit-inline-box;

    display: -ms-inline-flexbox;

    display: inline-flex;
    -webkit-box-pack: left;
        -ms-flex-pack: left;
            justify-content: left;
    -ms-flex-line-pack: left;
        align-content: left;
    

}

.padr{
   
    margin-right: 19px;
}

.btn{

    font-size: 15px;

}

div.agregar-boton{
    margin: 0;
    padding: 0;
    padding-bottom: 0px;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
  display: block;
  margin-bottom: 5px;

  
}


.agregar-boton a{

    border-radius: 200px ;
    font-size: 16px;
    width: 145px;

}

.agregar-boton a i{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    height: 45px;
    
}

.agregar-boton.ag.ag a{
    display: block;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: start;
    left: 0;
    margin: 0;    

}

.agregar-boton.ag.ag a i{

    margin: 0 auto;
}

.agregar-boton.ag{

    text-align: center;
}

div.agregar-boton.ag2 a{
    padding: 12px 0;

}

h1{
    font-size: 40px;
    font-weight: 1000;
}

tr{
    padding-bottom: 15px;
}



:root{

    --colorTextos: #07070767;


    --primary-color: rgb(226, 213, 213);
    --secondary-color: rgb(4, 100, 163);
    --highlight-color: #497988;
    --border: rgb(102, 98, 98);
    --dt-padding: 12px;
    --dt-padding-s:6px;
    --dt-padding-xs:2px;

    --dt-border-radius:3px;

    --dt-background-color-container:#053f5e;
    --dt-border-color:var(--secondary-color);
    --dt-bg-color: var(--highlight-color);
    --dt-text-color:var(--primary-color);
    --dt-bg-active-button:var(--highlight-color);
    --dt-text-color-button:var(--primary-color);
    --dt-text-color-active-button:var(--primary-color);
    --dt-hover-cell-color:var(--highlight-color);
    --dt-even-row-color:var(--secondary-color);
    --dt-focus-color:var(--highlight-color);
    --dt-input-background-color:var(--secondary-color);
    --dt-input-color:var(--primary-color);

    --first-color: #ffffff;
    --first-color1: #3a3939;
    --text-color: #ffffff;
    --body-font: 'Roboto', sans-serif;
    --big-font-size:26px;
    --normal-font-size: 13px;
    --smaller-font-size: 11px;


}


h1.login1{
  margin: 0;  
 

}

img.login1{
    left: 0;
    top: 0;
    max-width: 100%;
    max-height: 100%;

}


  
.l-form {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%) ;
    -ms-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%) ;
    -moz-transform: translate(-50%,-50%) ;
    -o-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
}

.form{

    margin: 0px auto;
   
}

.l-form2{

    display: -webkit-box;

    display: -ms-flexbox;

    display: flex;
    height: 100%;
}

.form2{
    height: -webkit-fit-content;
    height: -moz-fit-content;
    height: fit-content;
  
    margin: 0px auto;
   
}

.form__content{

    width: 340px;
    padding: 20px 25px;
    height: auto;
    
}

.form__img{
   
    margin: 0 ;
    padding: 0;
    height: -webkit-fit-content;
    height: -moz-fit-content;
    height: fit-content;
    pointer-events: none;

}

.form img{

    margin: 0;
    padding: 0;
    max-width: 100%;
    max-height: 100vh;
    height: -webkit-fit-content;
    height: -moz-fit-content;
    height: fit-content;

}

.form2 img{
      
    pointer-events: none;

}

.form__title{
    
    font-size:  26px;
    font-weight: 900;
    margin-bottom: 25px;
    text-align: center;
    position: relative;

}

.form__div{

    position: relative;
    display: flex;
    display: -webkit-box;
    display: -ms-flexbox;
    margin-bottom: 10px;
    padding:0px 0;
    padding-top: 10px;
    border-bottom: 1px solid var(--text-color);
    /*background-color: rgb(255, 255, 255);*/
}

.form__div-one{

    margin-bottom: 30px;

}

.form__label{

    position:relative;
    left: 2px;
    top:0px;
    font-size: 16px;
    color: var(--text-color);
    margin: 0;
    padding: 0;
    font-weight: 900;

}


.form__input{
   
    position: absolute;
    top:4px;
    left: -5px;
    width: 100%;
    height: 100%;
    border: none;
    outline: none;
    background: none;
    padding-left: 34px;
    font-size: 15px;
    color: var(--first-color);
    font-weight: 900;
    
}

.form__button{

    margin-top: 10px;
    width: 100%;
    padding: 5px;
    font-size: var(--normal-font-size);
    outline: none;
    border: none;
    background-color: -webkit-linear-gradient(to right, #292E49, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-gradient(linear, left top, right top, from(#292E49), color-stop(#536976), to(#BBD2C5));
    background: -o-linear-gradient(left, #292E49, #536976, #BBD2C5);
    background: linear-gradient(to right, #292E49, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: white;
    font-size: 17px;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
    position: relative;

}

.form__div.focus{
    border-bottom: 1px solid var(--first-color);
   /* background-color: rgb(255, 255, 255);*/
}

.form__div.focus .form__icon{

    color: var(--first-color);

}

.form__div.focus .form__label{
    
    left:-24px;
    top: -23px;
    color: var(--first-color);
    font-size: 14px;
   /* background-color: rgb(255, 255, 255);*/
}

.form__icon i.ic{

    margin-top: 4px;
    font-size: 25px;
    color: var(--text-color);
    margin: 0;
    padding: 0;
    
}

.form__button:hover{
    -webkit-box-shadow:  0px 15px 36px rgba(0,0,0,.15);
            box-shadow:  0px 15px 36px rgba(0,0,0,.15);
}


.form2{ 
    max-width: 100%;
  
    height:auto;    overflow: scroll;
}


@media screen and (max-width:950px){

    .form__content{
        
        width: 340px;
        -webkit-box-shadow:7px 7px 80px #000;
                box-shadow:7px 7px 80px #000;
        padding: 15px 25px;
        height: auto;
  
    }

    .form__title{

        font-size:  25px;
        font-weight: 900;
        margin-bottom: 15px;
        text-align: center;
        position: relative;
    
    }
    
    .form__div{
      
        margin-bottom: 10px;
        padding: 0 0;
        padding-top: 20px;
        border-bottom: 1px solid var(--text-color);
        /*background-color: rgb(255, 255, 255);*/
    }
    
    .form__div-one{

        margin-bottom: 18px;
    
    }

    .form__label{

        position:relative;
        left: 2px;
        top:2px;
        font-size: 15px;
        color: var(--text-color);
        margin: 0;
        padding: 0;
        font-weight: 900;

    }
    
    .form__input{
     
        top:9px;
        left: -6px;
        width: 100%;
        height: 100%;
        padding-left: 32px;
        font-size: 16px;
        color: var(--first-color);
        
    }
    
    .form__button{

        width: 100%;
        padding: 6px;
        font-size: var(--normal-font-size);
        outline: none;
        border: none;
        background-color: -webkit-linear-gradient(to right, #292E49, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-gradient(linear, left top, right top, from(#292E49), color-stop(#536976), to(#BBD2C5));
        background: -o-linear-gradient(left, #292E49, #536976, #BBD2C5);
        background: linear-gradient(to right, #292E49, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
        font-size: 17px;
        border-radius: 10px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        position: relative;

    }

    .form__div.focus .form__label{

        left:-24px;
        width: 100%;
        top: -20px;
        color: var(--first-color);
        font-size: 14px;
    /* background-color: rgb(255, 255, 255);*/
    }

}

@media screen and (max-width:850px){

    .l-form{

        margin: 0;
        padding: 0;

    }

    .form__content{
   
        width: 360px;
        -webkit-box-shadow:7px 7px 80px #000;
                box-shadow:7px 7px 80px #000;
        padding: 20px 28px;
        height: auto;
    
    }
    
    .form__icon i.ic{

        margin-top: 4px;
        font-size: 20px;
        color: var(--text-color);
        margin: 0;
        padding: 0;   
    
    }

    .form__title{

        font-size:  24px;
        font-weight: 900;
        margin-bottom: 10px;
        text-align: center;
        position: relative;
    
    }
    
    .form__div{

        margin-bottom: 10px;
        padding: 0 0;
        padding-top: 20px;
        border-bottom: 1px solid var(--text-color);
       
    }
    
    .form__div-one{

        margin-bottom: 20px;
    
    }

    .form__label{

        left: 1px;
        top:4px;
        font-size: 17px;
        color: var(--text-color);
    
    }
    
    .form__input{
     
        top:9px;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background: none;
        padding-left: 34px;
        font-size: 16px;
        color: var(--first-color);
        
    }
    
    .form__button{

        width: 100%;
        padding: 5px;
        font-size: var(--normal-font-size);
        outline: none;
        border: none;
        background-color: -webkit-linear-gradient(to right, #292E49, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-gradient(linear, left top, right top, from(#292E49), color-stop(#536976), to(#BBD2C5));
        background: -o-linear-gradient(left, #292E49, #536976, #BBD2C5);
        background: linear-gradient(to right, #292E49, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
        font-size: 19px;
        border-radius: 10px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        position: relative;
        font-weight: 900;
    }

    .form__div.focus .form__label{
        left:-26px;
        width: 100%;
        top: -20px;
        color: var(--first-color);
        font-size: 14px;
    /* background-color: rgb(255, 255, 255);*/
    }

    .form__icon i.ic{
   
        font-size: 30px;
        color: var(--text-color);
        margin: 0;
        padding: 0;
        
    }

}


.material-icons{

    font-size: 16px;

}

.datatable-container{

    font-family: 'Open Sans', sans-serif;
    background-color: var(--dt-background-color-container);
   
    color: var(--dt-text-color);
    
    margin: 0 auto;
    font-weight: 800;
    width: 100%;
    left: 0;
    top: 0; /* Position the navbar at the top of the page */
    
    
}


.datatable-container .header-tools{

    border-bottom: solid 2px var(--dt-border-color);
    padding-top: 8px;
    padding-right: 8px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: baseline;
        -ms-flex-align: baseline;
            align-items: baseline;
    min-height: 72px;

}

.datatable-container .header-tools .search{
   
    width: 34%;

}

i.ser{

  font-size: 45px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  margin: auto 0;
}

.datatable-container .header-tools .search .search-input{
    
    width: 100%;
    background-color: var(--dt-input-background-color);
    display: block;
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    border-radius: var(--dt-border-radius);
    border: solid 2px var(--dt-border-color);
    color: var(--dt-input-color);

}

.pages.pg ul li.li-a {
    
 font-size: 20px;
padding-bottom: 20px;

}

.pages.pg{
  
    display: -webkit-box;
  
    display: -ms-flexbox;
  
    display: flex;
    width: 100%;
    -webkit-box-pack: end;
        -ms-flex-pack: end;
            justify-content: flex-end;
    margin-top: 10px;
    font-weight: 400;

}

.pages.pg ul li.li-a a:hover{
    background-color: #497988;;
}

.pages.pg ul li.li-a a.active{
    background-color: #497988;;
}


.datatable-container .header-tools .tools{

    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin: 0;
    padding: 0;

}

.datatable-container .header-tools .tools ul{

    margin: 0;
    padding: 0;
    display: inline-block;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: start;
    -webkit-box-align: baseline;
        -ms-flex-align: baseline;
            align-items: baseline;

}

.datatable-container .header-tools .tools ul li{

    display: inline-block;
    margin: 0 var(--dt-padding-s);
    -webkit-box-align: baseline;
        -ms-flex-align: baseline;
            align-items: baseline;

}

.datatable-container .footer-tools{

    padding: var(--dt-padding);
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: baseline;
        -ms-flex-align: baseline;
            align-items: baseline;

}

.datatable-container .footer-tools .list-items{

    width:20%;

}

.datatable-container .footer-tools .pages{

 
    margin-right: 0;
    width: 100%;
    display: block;

}

.datatable-container .footer-tools .pages ul{

    margin: 0;
    padding: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: baseline;
        -ms-flex-align: baseline;
            align-items: baseline;
    -webkit-box-pack: end;
        -ms-flex-pack: end;
            justify-content: flex-end;
  
}


.datatable-container .footer-tools .pages ul li{

    display: inline-block;
    margin: 0 var(--dt-padding-xs);
    margin-right: 8px;
    
  
}


.datatable-container .footer-tools .pages ul li a,
.datatable-container .header-tools .tools ul li a{

    color: var(--dt-text-color-button);
    border: 0;
    border-radius: var(--dt-border-radius);
    background: #0098cb;
    cursor: pointer;

}

.datatable-container .footer-tools .pages ul li a:hover, 
.datatable-container .headerer-tools .tools ul li a:hover{

    background: var(--dt-bg-active-button);
    color: var(--dt-text-color-active-button);
    width: 100%;
}

.datatable-container .footer-tools .pages ul li a.active{
   
    background: var(--dt-bg-active-button);
    color: var(--dt-text-color-active-button);
  

}

a.disabled {

    pointer-events: none;
    cursor: default;
    
  }

.datatable-container .footer-tools .pages ul li a,
.datatable-container .footer-tools .pages ul li span,
.datatable-container .header-tools .tools ul li a{
    
    padding: 4px 12px;

}

.datatable-container .datatable{

    border-collapse: collapse;
    width: 100%;
 
}

.datatable-container .datatable,
.datatable-container .datatable th,
.datatable-container .datatable td{

    padding: 8px 0px;

}

#datos{
    margin: 0;
    padding: 0;
}
.datatable-container .footer-tools .pages ul li a{

    font-size: 16px;

}

.datatable-container .datatable th{

    font-size: 16px;
    font-weight: 400;
    text-align: center;
    border-bottom: solid 9px var(--dt-border-color);
    border-top: solid 9px var(--dt-border-color);
    border-left: solid 4px var(--dt-border-color);
    border-right: solid 4px var(--dt-border-color);

}

.datatable-container .datatable td{

    font-size: 14px;
    font-weight: 400;
    border-bottom: solid 3px var(--dt-border-color);
    border-right: solid 4px var(--dt-border-color);
    border-left: solid 4px var(--dt-border-color);
    
}

.datatable-container .datatable tbody tr:nth-child(even){
    background-color: var(--dt-even-row-color);
    border-bottom: solid 3px var(--secondary-color);
    border-right: solid 4px var(--secondaru-color);
    border-left: solid 4px var(--dt-border-color);
}

.datatable-container .datatable tbody tr:nth-child(even) td{
    border-bottom: solid 3px var(--dt-background-color-container);
    border-right: solid 4px var(--dt-background-color-container);
    border-left: solid 4px var(--dt-background-color-container);
    
}

.datatable-container .datatable tbody tr:hover{
    background-color: var(--dt-hover-cell-color);
}

.datatable-container .header-tools div.opt{
    margin-right: 20px;
}

.botones a{
   
    font-size: 19px;

}

@media screen and (max-width: 900px) {

    .datatable-container .footer-tools .pages ul li a{

        font-size: 18px;
    }

    .datatable-container .header-tools .search{
   
        width: 54%;
    
    }
.datatable-container .footer-tools .pages ul li a,
.datatable-container .footer-tools .pages ul li span,
.datatable-container .header-tools .tools ul li a{
    
    padding: 6px 13px;

}
    
    .datatable-container .datatable td{
        font-size: 12px;
        font-weight: 900;
        border-bottom: solid 3px var(--dt-border-color);
        border-right: solid 4px var(--dt-border-color);
        border-left: solid 4px var(--dt-border-color);
        
    }

    .botones a {
        font-size: 14px;
    }

    .datatable-container .datatable th{
        font-size: 14px;
        font-weight: 900;
        text-align: center;
        border-bottom: solid 9px var(--dt-border-color);
        border-top: solid 9px var(--dt-border-color);
        border-left: solid 4px var(--dt-border-color);
        border-right: solid 4px var(--dt-border-color);
    }
}

@media screen and (max-width: 600px) {
   
    .datatable-container .header-tools .search{
   
        width: 100%;
    
    }

    .datatable-container .footer-tools .pages ul li a{

        font-size: 18px;    margin-bottom: 120px;
    }

    
    .datatable-container .footer-tools .pages ul li a,
    .datatable-container .footer-tools .pages ul li span,
    .datatable-container .header-tools .tools ul li a{
        
        padding: 7px 14px;
        margin-bottom: 120px;

    }

    .datatable-container .datatable td{

        font-size: 13px;
        font-weight: 900;
        border-bottom: solid 3px var(--dt-border-color);
        border-right: solid 4px var(--dt-border-color);
        border-left: solid 4px var(--dt-border-color);
        
    }

    .botones a {

        font-size: 20px;

    }

    .datatable-container .datatable th{

        font-size: 14px;
        font-weight: 900;
        text-align: center;
        border-bottom: solid 9px var(--dt-border-color);
        border-top: solid 9px var(--dt-border-color);
        border-left: solid 4px var(--dt-border-color);
        border-right: solid 4px var(--dt-border-color);    width: 100%;

    }

    table {

        width:100%;

    }

    thead th{

        content: attr(data-th);
        display: block;
        text-align:center;
        width: 100%;

    }
    
    tr:nth-of-type(2n) {

        background-color: inherit;

    }

    tr td:first-child {

        font-weight:bold;
        font-size:1.3em;

    }

    tbody td {

        display: block;
        text-align:center;
     
    }

    tbody td:before {

        content: attr(data-th);
        display: block;
        text-align:center;

    }
   
    .datatable-container .footer-tools .pages ul{

        margin-left: 20px;
        padding: 0;
        display: block;
        -webkit-box-align: baseline;
            -ms-flex-align: baseline;
                align-items: baseline;
        -webkit-box-pack: end;
            -ms-flex-pack: end;
                justify-content: flex-end;
    
    }

    .datatable-container .footer-tools .pages ul li {

        margin-bottom: 20px;
    
    }
  
    .jc a{

        font-size: 12px; 

    }

    div.agregar-boton{

        width: -webkit-fit-content;

        width: -moz-fit-content;

        width: fit-content;
  

    }

    .agregar-boton.ag a{

        font-size: 20px;
        max-width: 120px;
        width: 100%;
        min-width: 100px;
        padding: 0 8px;
       
        
    }

    a.boton{

        font-size: 17px;
        max-width: 150px;
        width: 100%;
     
    }

    th.width-20{
        width: 100%;
        max-width: 100%;
    }
    
    th.width-10{   
        width: 100%;
        max-width: 100%;
    }
    
    th.width-30{
        width: 100%;
        max-width: 100%;
    }
    
    th.width-40{
        max-width: 100%;
        width: 100%;
    }
    
    th.width-50{
        width: 100%;

        max-width: 100%;
    }
    
    th.width-15{
        max-width: 100%;
        width: 100%;
    }
    
    th.width-25{
        max-width: 100%;
        width: 100%;
    }
    
    th.width-45{
        max-width: 100%;
        width: 100%;
    }
    
    th.width-35{
        max-width: 100%;
        width: 100%;
    }
    
    th.width-70{
        max-width: 100%;
        width: 100%;
    }

}
.form__icon span{
    margin: 0;
    padding:0;
    color: white;
    
    font-size: 30px;
}
.topnav {

    font-family: 'Open Sans', sans-serif;
    overflow: hidden;
    position: absolute;
    background: rgba(17, 15, 15, 0.6);
    position: fixed; /* Set the navbar to fixed position */
    top: 0; /* Position the navbar at the top of the page */
    width: 100%;
    min-height: 48px;
    height: auto;
    overflow:auto;
    -webkit-box-shadow: 0 0 28px rgba(37, 37, 37, 0.8);
            box-shadow: 0 0 28px rgba(37, 37, 37, 0.8);

  }
  
  .topnav a {

    float: left;
    display: block;
    color: #ffffff;
    text-align: center;
    text-decoration: none;
    font-size: 12px;

  }

.topnav a{
    
    display: -webkit-box;
    
    display: -ms-flexbox;
    
    display: flex;
    -webkit-box-pack: end;
        -ms-flex-pack: end;
            justify-content: flex-end;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;

}

.topnav a img{
    top: 0;
    left: 0;
    height: 48px;
    margin: 0;
    padding: 0;
   width:133px;
   
}

.caja{

    display: -webkit-box;

    display: -ms-flexbox;

    display: flex;
    -webkit-box-pack: end;
        -ms-flex-pack: end;
            justify-content: flex-end;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;

}


.caja a.padi{
  
    font-size: 17px;
 
    
}@media screen and (max-width:840px) {
    a.im{
        position: absolute;
    }
  
        .caja a.padi{
            
            margin-top: 12px;
          margin-right: 14px;
          font-size: 15px;
          
        }
      
  }

.topnav a.padi:hover {
    
    border-bottom: 2px solid #fff;
    color: white;
     
}
  
.topnav a.padi.pestana {
    
    border-bottom: 2px solid orange;
    color: orange;
     
}
  
.topnav a.icon {
    
    margin: 0;
    padding: 0; 
    display: none;
    margin-top: 4px;
  }



  .topnav div.ai{

      margin-right: 20px;

  }

  a.padi{
      
    margin: 0;
    padding: 0;
    margin-right: 20px;
    
  }



  .mt{

      margin-top: 100px;

  }

  .pt{

      padding-top: 100px;

  }
  
  @media screen and (max-width: 750px) {

    .topnav a.icon {
        display: block;
          right: 0;
          height: 42px;
        margin-right: -8px;
         
      }
   
    .topnav a.icon {
 
      float: right;
      display: block;
      
    }
   
  }
  
  @media screen and (max-width: 750px) {

    .topnav.responsive {position: relative;}
    .topnav.responsive  .icon {
        
      position: absolute;
      padding: 0;
      margin: 0;
      right: 0;
      top: 0;

    }

    .topnav.responsive{

        overflow: hidden;
        position: absolute;
        background: rgba(37, 35, 35, 0.6);
        position: fixed; /* Set the navbar to fixed position */
        top: 0; /* Position the navbar at the top of the page */
        margin: 0;
        padding: 0;
      
        width: 100%;
    
        -webkit-box-pack: center;
    
            -ms-flex-pack: center;
    
                justify-content: center;
        min-height: 48px;
        height: auto;
        overflow:auto
    }
    .topnav.responsive  a {
      
        padding: 0;
      margin: 0;
      float: none;
      display: block;
      font-size: 1px;
      margin-right: 50px;
  
        
    }
    
    .topnav.responsive .caja a.icon {
        padding: 0;
      margin: 0;
      float: none;
      display: block;
   text-align: left;

       
     
    } 
    .caja{
        display:-ms-grid;
        display:grid;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        margin: 0;
      }

      .topnav a.icon i{
        
        font-size: 35px;
       
      }
    
      .topnav div.ai{
       
          margin-right: 20px;
      }
    
  }

.showcase{
    padding: 0;
    margin: 0;
}

.showcase img{

    padding: 0px;
    margin: 0;
    width: 100%;
    height: 450px;
    
}


@media screen and (max-width: 750px) {

    .topnav a.icon {
        
      float: right;
      display: block;
      font-size: 20px;

    }
   

    .topnav.responsive{
      
        width: 100%;
     
    }
    
    .caja{
        display:-ms-grid;
        display:grid;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        padding-top: -250px;
        
      }

      .topnav.responsive {position: relative;}
      .topnav.responsive  .icon {
          
  
        position: absolute;
        padding: 0;
        margin: 0;
        right: 0;
        top: 0;
        height: 20px;
       

      }
  
      
      .topnav.responsive{
  
          overflow: hidden;
          position: absolute;
          background: rgba(37, 35, 35, 0.9);
          position: fixed; /* Set the navbar to fixed position */
          top: 0; /* Position the navbar at the top of the page */
          margin: 0;
          padding: 0;
        
          width: 100%;
    
          -webkit-box-pack: center;
    
              -ms-flex-pack: center;
    
                  justify-content: center;
          padding-bottom: -800px;
       
      }
      .topnav.responsive a {
        
          padding: 0;
        margin: 0;
        float: none;
        display: block;
        font-size: 17px;
     
       
      }
      
      .topnav.responsive .caja a.icon {
        padding: 0;
        margin: 0;
        float: none;
        display: block;
        text-align: left;
  
     
      } 

}

a.icon i::before{

    margin: 0;
    padding: 0;
    font-size: 55px;
    overflow: hidden;

}


@media screen and (max-width: 750px) {
    .topnav  a:not(:nth-child(0)){display: none;}
    .topnav a.icon {
        
      float: right;
      display: block;
      font-size: 10px;
    }
   
    .topnav a.im{
        position: relative;

        width: -webkit-fit-content;

        width: -moz-fit-content;

        width: fit-content;
        display: block;
  
        
      }

 
    .topnav.responsive{
      
        width: 100%;
     
    }

    .topnav.responsive a.im{

        margin: 0 auto;
        margin-bottom: 30px;

    }
  
    .caja{
        display:-ms-grid;
        display:grid;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        padding-top: -250px;
        
      }

      .topnav.responsive {position: relative;}
      .topnav.responsive  .icon {
          
        position: absolute;
        padding: 0;
        margin: 0;
        right: 0;
        top: 0;
        height: 20px;    
        font-size: 20px;
        margin-right: 20px; margin-top: 10px;

      }
      
      .topnav.responsive{
  
          overflow: hidden;
          position: absolute;
          background: rgba(37, 35, 35, 0.7);
          position: fixed; /* Set the navbar to fixed position */
          top: 0; /* Position the navbar at the top of the page */
          margin: 0;
          padding: 0;
          width: 100%;
          -webkit-box-pack: center;
              -ms-flex-pack: center;
                  justify-content: center;
     
      }
      
      .topnav.responsive a {
        
        padding: 0;
        margin: 0;
        float: none;
        display: block;
        margin-bottom: 30px; font-size: 10px;
     
      }
      
      .topnav.responsive .caja a.icon {

        padding: 0;
        margin: 0;
        float: none;
        display: block;
        text-align: left;
       
      }  
      
      .topnav .caja a{

        font-size: 24px;
        font-weight: bolder; 
        
    }
      
    .topnav.responsive a.icon i::before{

        margin: 0;
        padding: 0;
        font-size: 59px;
        overflow: visible;
    
    }

    .topnav.responsive a.padi{

        border: none;

    }

}

 
@media screen and (max-width: 550px) {
  
    .topnav.responsive {position: relative;}
    .topnav.responsive  .icon {
        
      position: absolute;
      padding: 0;
      padding-top: 0px;
      margin: 0;
      right: 0;
      top: 0;

    }

    .topnav a.im{


        display: block;
      }


    .topnav.responsive{

        overflow: hidden;
        position: absolute;
        background: rgba(37, 35, 35, 0.6);
        position: fixed; /* Set the navbar to fixed position */
        top: 0; /* Position the navbar at the top of the page */
        margin: 0;
        padding: 0;
        width: 100%;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        min-height: 68px;
        height: auto;
        overflow:auto;
        
    }

    .topnav.responsive  a {
      
        padding: 0;
        margin: 0;
        float: none;
        display: block;
        font-size: 1px;
        margin-right: 10px;
    
    }
    
    .topnav.responsive .caja a.icon {

        padding: 0;
        margin: 0;
        float: none;
        display: block;
        text-align: left;     
     
    } 

    .caja{

        display:-ms-grid;

        display:grid;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        margin: 0;

      }
    
      .topnav div.ai{
         
          margin-right: 20px;

      }
  
  }

@media screen and (max-width: 550px) {

    .topnav  a:not(:nth-child(0)){display: none;}
    .topnav a.icon {
        
      float: right;
      display: block;
      font-size: 20px;
  
    }
  
      .topnav a.im{


        display: block;
      }

    .topnav.responsive{
      
        width: 100%;

        margin-right: 50px;
     
    }
    
    .caja{
        display:-ms-grid;
        display:grid;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        padding-top: -150px;
        
      }

      .caja a.padi{
          font-size: 10px;
          
      }

      .topnav.responsive {position: relative;}
      .topnav.responsive  .icon {
          
  
        position: absolute;
        padding: 0;
        margin: 0;
        right: 0;
        top: 0;
        height: 20px;
       
        font-size: 20px;
        margin-right: 20px;

      }
  
      
      .topnav.responsive{
  
          overflow: hidden;
          position: absolute;
          background: rgba(37, 35, 35, 0.6);
          position: fixed; /* Set the navbar to fixed position */
          top: 0; /* Position the navbar at the top of the page */
          margin: 0;
          padding: 0;
        
          width: 100%;
    
          -webkit-box-pack: center;
    
              -ms-flex-pack: center;
    
                  justify-content: center;
          padding-bottom: -800px;
       
      }
      .topnav.responsive a {
        
          padding: 0;
        margin: 0;
        float: none;
        display: block;
        font-size: 19px;
        padding-bottom: -80px;
     
      }
      
      .topnav.responsive .caja a.icon {
        padding: 0;
        margin: 0;
        float: none;
        display: block;
        text-align: left;
       
      }    

}


@media screen and (max-width: 550px) {
    .topnav  a:not(:nth-child(0)){display: none;}
    .topnav a.icon {
        
      float: right;
      display: block;
      font-size: 20px;
    
   
    }
  
  
      .topnav a.im{

        display: block;
 
      }


    .topnav.responsive{
      
        width: 100%;

        margin-right: 10px;
     
    }

    .topnav.topnav.responsive a.im{
        margin-bottom: 30px;
    }
    
    .caja{
        display:-ms-grid;
        display:grid;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        padding-top: -250px;
    
        
      }

      .topnav.responsive {position: relative;}
      .topnav.responsive  .icon {
          
  
        position: absolute;
        padding: 0;
        margin: 0;
        right: 0;
        top: 0;
        height: 20px;
        margin-right: 15px;        margin-top: 10px;
      }

  
      
      .topnav.responsive{
  
          overflow: hidden;
          position: absolute;
          background: rgba(37, 35, 35, 0.7);
          position: fixed; /* Set the navbar to fixed position */
          top: 0; /* Position the navbar at the top of the page */
          margin: 0;
          padding: 0;
        
          width: 100%;
    
          -webkit-box-pack: center;
    
              -ms-flex-pack: center;
    
                  justify-content: center;
          padding-bottom: -800px;
       
      }
      .topnav.responsive a {
        
          padding: 0;
        margin: 0;
        float: none;
        display: block;
     
       margin-bottom: 30px;
      }
      
      .topnav.responsive .caja a.icon {
        padding: 0;
        margin: 0;
        float: none;
        display: block;
        text-align: left;

          
      } 
      .topnav .caja a{
        font-size: 24px;
        font-weight: bolder; 
        
    }
}
/*
@media screen and (max-width: 500px) {

    .topnav a.im{
        pointer-events: none;
      }

    .topnav.responsive{

        overflow: hidden;
        position: absolute;
        background: rgba(37, 35, 35, 0.9);
        position: fixed; 
        top: 0; 
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100px;
        
    } 
    
    .caja{
        display: -webkit-box;
display: -ms-flexbox;;
        justify-content: center;
        margin: 0;
        
      }
    
      
      .topnav.responsive {position: relative;}

      .topnav.responsive  .icon {
          
        padding: 0;
        margin: 0;
        right: 0;
        top: 0;

        margin-right: 5px;
        font-size: 25px;
   
      }
      .topnav a.icon i{

        font-size: 35px;
       
      }
    
      .topnav div.ai{
          margin-top: 10px;
          margin-right: 15px;
      }
  
}

@media screen and (max-width: 300px) {

    .topnav a.im{
        pointer-events: none;
      }

    .topnav.responsive{
        overflow: hidden;
        position: absolute;
        background: rgba(37, 35, 35, 0.9);
        position: fixed; 
        top: 0; 
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100px;
        margin-right: 1px;
    }
    .caja{
        display: -webkit-box;
display: -ms-flexbox;;
        justify-content: center;
        
      }.caja a{
        padding-right: 50px;
    }


    .topnav.responsive {position: relative;}
    .topnav.responsive  .icon {
        

      position: absolute;
      padding: 0;
      margin: 0;
      right: 0;
      top: 0;
   
      margin-right: 50px;
      font-size: 19px;

    }
    .topnav.responsive a{
        font-size: 8px;
    }
    .topnav a.icon i{

        font-size: 15px;
       
      }
    
      .topnav div.ai{
          margin-top: 5px;
          margin-right: 10px;
      }

}
*/
.menu-btn{
    position: absolute;
      cursor: pointer;
      top: 15px;
      right: 15px;
      z-index: 2;
      font-size: 2rem;
      display :none;
  }


@media screen and (max-width: 700px) {

   
    .showcase {
        padding: 0px;
        margin: 0;
        width: 100%;
        height: 450px;
        
    }
  }

@media (max-width: 800px){
    .menu-btn{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }
  .nav-main{
      display: -ms-grid;
      display: grid;
      height: 100%;
  }

    .nav-main ul.nav-menu li{
        padding: 20px;

        font-size: 14px;
    }

    .nav-main ul.nav-menu.show{
        -webkit-transform: translateX(-20px);
            -ms-transform: translateX(-20px);
                transform: translateX(-20px);
    }
    .nav-main ul.nav-menu{
        display: block;
        position: absolute;
        top: 0;
        left:0;
        background: #2f3640;
        
        padding: 30px;
        opacity: .9;
        height: 100%;
        -webkit-transform: translateX(-400px);
            -ms-transform: translateX(-400px);
                transform: translateX(-400px);
        -webkit-transition: -webkit-transform .5s ease-in-out;
        transition: -webkit-transform .5s ease-in-out;
        -o-transition: transform .5s ease-in-out;
        transition: transform .5s ease-in-out;
        transition: transform .5s ease-in-out, -webkit-transform .5s ease-in-out;
    }   

    .nav-main a.im{
        pointer-events: none;
        display: none;
      }

    

}

/*
body{
    background: #BBD2C5;
    background: -webkit-linear-gradient(to right, #292E49, #536976, #BBD2C5); 
    background: linear-gradient(to right, #292E49, #536976, #BBD2C5); 
    
}
*/

/*
body{
   
    background: #16222A; 
background: -webkit-linear-gradient(to right, #3A6073, #16222A); 
background: linear-gradient(to right, #3A6073, #16222A); 

}*/

body{
    
   
    background: #0f0c29;  /* fallback for old browsers */  /* Chrome 10-25, Safari 5.1-6 */
background: -webkit-gradient(linear, left top, right top, from(#24243e), color-stop(#302b63), to(#0f0c29));
background: -o-linear-gradient(left, #24243e, #302b63, #0f0c29);
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

div.form1{
    
    display: -ms-grid;
    
    display: grid;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
   width: 500px;
   margin-top: 100px;
}

.log{
   
    background-color: #fff;
   
    -webkit-box-shadow: 0 0 8px rgba(255,255,255,0.8);
   
            box-shadow: 0 0 8px rgba(255,255,255,0.8);
    border-radius: 20px;
   padding: 40px 0px;
   
   
}

.padii{

    margin-bottom: 200px;
}

::after,::before{
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
}

label.l-f1{
    color: rgb(4, 4, 4);
    font-size: 20px;
    
    position: absolute;
    bottom: 0;
    top: 0px;

    width:300px;
   background-color: transparent;
    -webkit-transition: 0.5s ease all;
    -o-transition: 0.5s ease all;
    transition: 0.5s ease all;
    pointer-events: none;
    padding-left: 5px;
    opacity: 0.8;
}


input.f1:not(:-moz-placeholder-shown)~label{
    top:-28px;
    font-size: 19px;
    /*color:#2196f3;*/
    
    background-color: rgb(255, 255, 255);
    position: absolute;
    color: rgb(128, 125, 125);
    padding-left: 10px;
    opacity: 0.8;
 
}


input.f1:not(:-ms-input-placeholder)~label{
    top:-28px;
    font-size: 19px;
    /*color:#2196f3;*/
    
    background-color: rgb(255, 255, 255);
    position: absolute;
    color: rgb(128, 125, 125);
    padding-left: 10px;
    opacity: 0.8;
 
}


input.f1:focus~label,input.f1:not(:placeholder-shown)~label{
    top:-28px;
    font-size: 19px;
    /*color:#2196f3;*/
    
    background-color: rgb(255, 255, 255);
    position: absolute;
    color: rgb(128, 125, 125);
    padding-left: 10px;
    opacity: 0.8;
 
}

input.f1:not(:-moz-placeholder-shown)~input.f1{
    top:-28px;
    font-size: 19px;
    /*color:#2196f3;*/
    

    position: absolute;
    color: rgb(128, 125, 125);
    padding-left: 10px;
 
}

input.f1:not(:-ms-input-placeholder)~input.f1{
    top:-28px;
    font-size: 19px;
    /*color:#2196f3;*/
    

    position: absolute;
    color: rgb(128, 125, 125);
    padding-left: 10px;
 
}

input.f1:focus~input.f1,input.f1:not(:placeholder-shown)~input.f1{
    top:-28px;
    font-size: 19px;
    /*color:#2196f3;*/
    

    position: absolute;
    color: rgb(128, 125, 125);
    padding-left: 10px;
 
}
.form1{
    width: 100%;
    margin: auto;
}

.log .grupo{

    position: relative;
    margin-bottom: 220px;
    margin-left: 25px;
    margin-right: 25px;
   
}

span.barra{

    border: none;
    border-bottom: 1px solid var(--colorTextos);

 
}

input.f1{
  
    background:none;
    color: #000000;
    font-size: 18px;
    padding: 0px 0px 10px 0px;
    display: block;
   
    width: 300px;
    border: none;
    margin-bottom: 20px;
    background-color: white;
    position: absolute;
    padding-left: 5px;
    padding-top: 10px;

    opacity: 0.8;
}

input.f1:focus{
    outline: none;
    color: rgb(0, 0, 0);

    position: absolute;
    opacity: 0.8;
}



.barra{

    display: block;
  
    color: #000;
    overflow:hidden;
   
    bottom: 0px;
    left: 0px;
   
}


.barra::before{
    content: "";
    height: 3px;
    width: 0%;
    bottom: 0;
    position: absolute;
    background: blue;
   /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    -webkit-transition: 0.3s ease width;
    -o-transition: 0.3s ease width;
    transition: 0.3s ease width;
    left: 0;  
  opacity: 1;
 
}

input.f1:focus~.barra::before{
width: 100%;
opacity: 1;
  
}

button.b-f1{
    position: absolute;
    background: #BBD2C5;  /* fallback for old browsers */  /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-gradient(linear, left top, right top, from(#292E49), color-stop(#536976), to(#BBD2C5));
    background: -o-linear-gradient(left, #292E49, #536976, #BBD2C5);
    background: linear-gradient(to right, #292E49, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    border: none;
    display: block;
    width: 60%;
    margin: 10px auto;
    color: #fff;
    height: 40px;
    font-size: 16px;
    margin-top: 100px;
    margin-left: 20%;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    text-align: center;

}

h1,h2{
    color: white;
    font-size: 50px;
}


.h1-log{

    color: black;
    text-align: center;
    font-weight: bolder;
    font-size: 40px;
    margin-bottom: 50px;

}

.h1-login{
    margin-bottom: 80px;
}

body{

    font-family: 'Roboto';
    width: 100%;
    margin: 0;
    padding:0;

}

form.formulario{

    font-family: 'PT Sans', sans-serif;
    background-color: white;
    margin: 0 auto;
    width: 600px;
    padding: 40px 60px;
    border-radius: 20px;
    -webkit-box-shadow: 0 0 18px rgba(255,255,255,0.6);
            box-shadow: 0 0 18px rgba(255,255,255,0.6);

}

.formulario .field{

    display: block;
    width: 100%;
    
}

.field{

    border: 3px solid rgb(151, 151, 151);
    padding: 8px 8px;
    font-size: 16px;
    margin-top: 1px;
    margin-bottom: 15px;
    color: rgb(0, 0, 0);
    font-weight: 900;

}

.field:focus{

    border: 0;
    outline: rgb(4, 4, 109) solid 4px;
    margin-top: 5px;

}

 .etiqueta{

    color: #000;
    font-size: 17px;
    font-weight :900;
 
}



@media screen and (max-width: 750px) {

    form.formulario{
        background-color: white;
        margin: 0 auto;
        width: 500px;
        padding: 25px 40px;
        border-radius: 20px;
        -webkit-box-shadow: 0 0 18px rgba(255,255,255,0.6);
                box-shadow: 0 0 18px rgba(255,255,255,0.6);
    }
    
    .formulario .field{
        display: block;
        width: 100%;
    }
    
    .field{

        outline: none;
        border: 3.5px solid #ccc;
        padding: 10px;
        font-size: 15px;
        margin-bottom: 10px;
        color: black;
    }
    
    .etiqueta{
        font-size: 15px;
        font-weight: 500;
        color: black;
    }
    
    select.field option{
        font-weight: 500;
    }

    h1{
        font-size: 35px;
    }

    input[type="submit"].field{

        padding: 20px;
        color: #fff;
        background: #0098cb;
        width: 250px;
        margin: 0px auto;
        margin-top: 0px;
        border: 0;
        border-radius: 23px;
        cursor: pointer;
        
    
    }
   
}

@media screen and (max-width: 550px) {

    form.formulario{
        background-color: white;
        margin: 0 auto;
        width: 90%;
        padding: 20px 22px;
        border-radius: 20px;
        -webkit-box-shadow: 0 0 18px rgba(255,255,255,0.6);
                box-shadow: 0 0 18px rgba(255,255,255,0.6);
    }
    
    .formulario .field{
        display: block;
        width: 100%;
    }
    
    .field{
        outline: none;
        border: 3.5px solid #ccc;
        padding: 10px 5px;
        font-size: 15px;
        font-weight: 500;
        margin-bottom: 10px;
        color: black;
    }
    
    .etiqueta{
        font-size: 15px;
        font-weight: 500;
        color: black;
    }
    
    select.field option{
        font-weight: 500;
    }

    h1{
        font-size: 35px;
    }

    input[type="submit"].field{

        padding: 15px;
        color: #fff;
        background: #0098cb;
        width: 0%;
        height: auto;
        margin: 0px auto;
        margin-top: 0px;
        border: 0;
        border-radius: 23px;
        cursor: pointer;
    
    }

    
    button[type="submit"]{


        color: #fff;
        background: #0dd107;
        width: 80%;
        max-width: 300px;
        height: auto;
        margin: 0px auto;
        margin-top: 0px;
        border: 0;
        border-radius: 23px;
        cursor: pointer;
        font-size: 20px;
        font-weight: 900;
        border: none;
        padding: 0 10px;

    }

    button[type="submit"].exp:hover{
        border: none;
        background: #24f51d;
    }

    .reg input[type="submit"]{
            max-width: 60%;
        }
}

@media screen and (max-width: 450px) {

    form.formulario{
        background-color: white;
        margin: 0 auto;
        width: 96%;
        padding: 15px 10px;
        border-radius: 15px;
        -webkit-box-shadow: 0 0 18px rgba(255,255,255,0.6);
                box-shadow: 0 0 18px rgba(255,255,255,0.6);
    }
    
    .formulario .field{
        display: block;
        width: 100%;
    }
    
    .field{
        outline: none;
        border: 3.5px solid #ccc;
        padding: 10px 5px;
        font-size: 13px;
        font-weight:900;
        margin-bottom: 10px;
        color: black;
    }
    
    .etiqueta{
        font-size: 13px;
        font-weight:900;
        color: black;
    }
    
    select.field option{
        font-weight:900;
    }

    h1{
        font-size: 30px;
    }

    input[type="submit"].field{

        padding: 15px;
        color: #fff;
        background: #0098cb;
        width: 70%;
        height: auto;
        margin: 10px auto;
        margin-top: 0px;
        border: 0;
        border-radius: 23px;
        cursor: pointer;

    }
    .reg input[type="submit"].field{
            max-width: 90%;
            font-weight: 900;
            font-size: 20px;
            min-width: 100px;
        }

}

#myInput{

    width: 100%;

}


input[type="submit"].field{
    
    margin-top: 20px;
    width: 100%;
    font-size: 25px;
    
}

.jc {
  
    margin-top: 30px;
 
}



.btn.btn-primary.boton{
    background-color: #0aaddf;
   border-color: #0aaddf;
}

.btn.btn-primary.boton:hover{
    background-color: #0d90b8;
   border-color: #0d90b8;

}

form.eliminar{
    color: white;
    width: 50%;
    font-weight: 400;
    font-size: 20px;
    /*background-color: white;*/
    margin: 0 auto;
}

label.eli{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    margin-bottom: 20px;
}

input[type="submit"].eli{
    width: 150px;
    
    height: 60px;
    padding: 0;
    margin: 0;
    margin: 0 20px;
    margin-bottom: 30px;
}



input[name="Si"].eli{
   
    background-color: red;
}

input[name="Si"].eli:hover{
   
    background-color: rgb(182, 1, 1);
}

input[type="submit"].field{

    outline: none;
    
}

h4{

    font-family: 'Open Sans', sans-serif;
    margin: 0;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
    
    padding: 0 0;
    border: none;
    outline: none;
    -webkit-box-shadow: none !important;
            box-shadow: none !important;
    font-size: 15px;
    padding-right: 40px;
    
 
}

.ic{
    
    font-size: 20px;
    
}


.close{

    font-size: 20px;
    width: 20px;
    height: 20px;
    color: #000;
    background-color: #0098cb;

}

.exp{

    font-size: 20px;
    font-weight: bolder;
 
}

.container-login{
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin: 0 auto;
    width: 1000px;

}

.login-login{
    position: absolute;
  
    width:350px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    height: auto;

    border:none;
   
    right: 0px;
    -webkit-box-shadow:7px 7px 80px #000;
            box-shadow:7px 7px 80px #000;
}

.h1-login{
    font-size: 37px;
    color: #000;
    text-align: center;
    font-weight: bolder;
    
}

.container-login .main-login .log{
    width: 350px;
    height: 535px;
   
}


header.img-login{
    margin: 0;
    padding: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: flex-start;
  
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
   
}


.container-login form{

    border-radius: 0px;
    -webkit-box-shadow: none;
            box-shadow: none;
    margin: 0;
    color: rgb(255, 255, 255);
    opacity: 0.8;
    background-color: transparent; 
}

  .container-login form .grupo{

    color: #000;
    
  }

.barra{
    display: none;
}

@media screen and (max-width: 999px) {

    
    .container-login{
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin: 0 auto;
        width: 100%;
        height: 335px;
    }

    .login-login{
        position: absolute;
    
        width:350px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        height: 335px;

        border:none;
    
        right: 0px;
            -webkit-box-shadow:7px 7px 80px #000;
                    box-shadow:7px 7px 80px #000;
    }

    .h1-login{
        font-size: 35px;
        color: #000;
        text-align: center;
    }

    .container-login .main-login .log{
        
        width: 350px;
        height: 535px;
    
    }

    header.img-login{
        margin: 0;
        padding: 0;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: start;
            -ms-flex-pack: start;
                justify-content: flex-start;
    
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    
    }

    .img-login img{
    
        display: -webkit-box;
    
        display: -ms-flexbox;
    
        display: flex;
        margin: 0;
        padding: 0;
        max-width:100%;
        max-height:100%;
        width: 100%;

        height: 535px;
    
    }

    .container-login form{

        border-radius: 0px;
        -webkit-box-shadow: none;
                box-shadow: none;
        margin: 0;
        color: rgb(255, 255, 255);
        opacity: 0.8;
        background-color: transparent; 
    }

    .container-login form .grupo{

        color: #000;
        
    }

    div.form1{
    
        display: -ms-grid;
    
        display: grid;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
       width: 500px;
       margin-top: 100px;
    }
    
    .log{
       
        background-color: #fff;
       
        -webkit-box-shadow: 0 0 8px rgba(255,255,255,0.8);
       
                box-shadow: 0 0 8px rgba(255,255,255,0.8);
        border-radius: 20px;
       padding: 40px 0px;
       
       
    }
    
    .padii{
    
        margin-bottom: 200px;
    }
    
    ::after,::before{
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
                box-sizing: border-box;
    }
    
    label.l-f1{
        color: rgb(4, 4, 4);
        font-size: 20px;
        
        position: absolute;
        bottom: 0;
        top: 0px;
    
        width:300px;
       background-color: transparent;
        -webkit-transition: 0.5s ease all;
        -o-transition: 0.5s ease all;
        transition: 0.5s ease all;
        pointer-events: none;
        padding-left: 5px;
        opacity: 0.8;
    }
    
    
    input.f1:not(:-moz-placeholder-shown)~label{
        top:-28px;
        font-size: 19px;
        /*color:#2196f3;*/
        
        background-color: rgb(255, 255, 255);
        position: absolute;
        color: rgb(128, 125, 125);
        padding-left: 10px;
        opacity: 0.8;
     
    }
    
    
    input.f1:not(:-ms-input-placeholder)~label{
        top:-28px;
        font-size: 19px;
        /*color:#2196f3;*/
        
        background-color: rgb(255, 255, 255);
        position: absolute;
        color: rgb(128, 125, 125);
        padding-left: 10px;
        opacity: 0.8;
     
    }
    
    
    input.f1:focus~label,input.f1:not(:placeholder-shown)~label{
        top:-28px;
        font-size: 19px;
        /*color:#2196f3;*/
        
        background-color: rgb(255, 255, 255);
        position: absolute;
        color: rgb(128, 125, 125);
        padding-left: 10px;
        opacity: 0.8;
     
    }
    
    input.f1:not(:-moz-placeholder-shown)~input.f1{
        top:-28px;
        font-size: 19px;
        /*color:#2196f3;*/
        
    
        position: absolute;
        color: rgb(128, 125, 125);
        padding-left: 10px;
     
    }
    
    input.f1:not(:-ms-input-placeholder)~input.f1{
        top:-28px;
        font-size: 19px;
        /*color:#2196f3;*/
        
    
        position: absolute;
        color: rgb(128, 125, 125);
        padding-left: 10px;
     
    }
    
    input.f1:focus~input.f1,input.f1:not(:placeholder-shown)~input.f1{
        top:-28px;
        font-size: 19px;
        /*color:#2196f3;*/
        
    
        position: absolute;
        color: rgb(128, 125, 125);
        padding-left: 10px;
     
    }
    .form1{
        width: 100%;
        margin: auto;
    }
    
    .log .grupo{
    
        position: relative;
        margin-bottom: 100px;
        margin-left: 25px;
        margin-right: 25px;
       
    }
    
    span.barra{
    
        border: none;
        border-bottom: 1px solid var(--colorTextos);
    
     
    }
    
    input.f1{
      
        background:none;
        color: #000000;
        font-size: 18px;
        padding: 0px 0px 10px 0px;
        display: block;
       
        width: 300px;
        border: none;
        margin-bottom: 20px;
        background-color: white;
        position: absolute;
        padding-left: 5px;
        padding-top: 10px;
    
        opacity: 0.8;
    }
    
    input.f1:focus{
        outline: none;
        color: rgb(0, 0, 0);
    
        position: absolute;
        opacity: 0.8;
    }
    
    
    
    .barra{
    
        display: block;
      
        color: #000;
        overflow:hidden;
       
        bottom: 0px;
        left: 0px;
       
    }
    
    
    .barra::before{
        content: "";
        height: 3px;
        width: 0%;
        bottom: 0;
        position: absolute;
        background: blue;
       /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        -webkit-transition: 0.3s ease width;
        -o-transition: 0.3s ease width;
        transition: 0.3s ease width;
        left: 0;  
      opacity: 1;
     
    }
    
    input.f1:focus~.barra::before{
    width: 100%;
    opacity: 1;
      
    }
    
    button.b-f1{
        position: absolute;
        background: #BBD2C5;  /* fallback for old browsers */  /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-gradient(linear, left top, right top, from(#292E49), color-stop(#536976), to(#BBD2C5));
        background: -o-linear-gradient(left, #292E49, #536976, #BBD2C5);
        background: linear-gradient(to right, #292E49, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        border: none;
        display: block;
        width: 60%;
        margin: 10px auto;
        color: #fff;
        height: 40px;
        font-size: 16px;
        margin-top: 60px;
        margin-left: 20%;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        text-align: center;
    
    }

    
    
    .h1-login{
        font-size: 30px;
        margin-bottom: 20px;
    }

    .barra{
        display: none;
    }

}

.texto{

    font-family: 'Open Sans', sans-serif;
    
    padding: 40px 0;
    padding-top: 40px;
    border: none;
    outline: none;
    -webkit-box-shadow: none !important;
            box-shadow: none !important;
    color: #0098cb;
    background-color: #0098cb;

}
/*
.l-form img{
    
    width: auto;
}*/


@media screen and (max-width:650px){
  
    .form__content{
   
        width: 360px;
        -webkit-box-shadow:7px 7px 80px #000;
                box-shadow:7px 7px 80px #000;
        padding: 20px 28px;
        height: auto;
    
    }
    
    .form__title{

        font-size:  25px;
        font-weight: 900;
        margin-bottom: 12px;
        text-align: center;
       position: relative;
    
    }
    
    .form__div{

        margin-bottom: 10px;
        padding: 0 0;
        padding-top: 20px;
        border-bottom: 1px solid var(--text-color);
        /*background-color: rgb(255, 255, 255);*/
    }
    
    .form__div-one{

        margin-bottom: 20px;
    
    }

    .form__label{

        left: 1px;
        top:4px;
        font-size: 17px;
        color: var(--text-color);
    
    }
    
    .form__input{
     
        top:9px;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background: none;
        padding-left: 34px;
        font-size: 16.5px;
        color: var(--first-color);
        
    }
    
    .form__button{

        width: 100%;
        padding: 6px;
        font-size: var(--normal-font-size);
        outline: none;
        border: none;
        background-color: -webkit-linear-gradient(to right, #292E49, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-gradient(linear, left top, right top, from(#292E49), color-stop(#536976), to(#BBD2C5));
        background: -o-linear-gradient(left, #292E49, #536976, #BBD2C5);
        background: linear-gradient(to right, #292E49, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
        font-size: 17px;
        border-radius: 10px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        position: relative;

    }

    .form__div.focus .form__label{

        left:-28px;
        width: 100%;
        top:-20px;
        font-size: 14px;
        color: var(--first-color);
       /* background-color: rgb(255, 255, 255);*/
    }

    .form__icon i.ic{
   
        font-size: 30px;
        color: var(--text-color);
        margin: 0;
        padding: 0;
        
    }
    
}

.form img.form__img{
    width: 100%;
    margin: 0 auto;
    max-width: 360px;
    
}


@media screen and (max-width:550px){


    .form__content{
   
        width: 350px;
        -webkit-box-shadow:7px 7px 80px #000;
                box-shadow:7px 7px 80px #000;
        padding: 20px 20px;
        height: auto;
        
    }
    
    .form__title{

        font-size:  23px;
        font-weight: 900;
        margin-bottom: 8px;
        text-align: center;
       
    }
    
    .form__div{
     
        margin-bottom: 15px;
        padding: 0px 0;
        padding-top: 25px;
        border-bottom: 1px solid var(--text-color);
        /*background-color: rgb(255, 255, 255);*/

    }
    
    .form__div-one{

        margin-bottom: 15px;
    
    }

    .form__label{
   
        left: 0px;
        top: 2px;
        font-size: 18px;
        color: var(--text-color);
    
    }
    
    .form__input{
     
        top:13px;
        left: -4px;
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background: none;
        padding-left: 37px;
        font-size: 17px;
        color: var(--first-color);

    }
    
    .form__button{

        width: 100%;
        padding: 8px;
        font-size: var(--normal-font-size);
        outline: none;
        border: none;
        background-color: -webkit-linear-gradient(to right, #292E49, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-gradient(linear, left top, right top, from(#292E49), color-stop(#536976), to(#BBD2C5));
        background: -o-linear-gradient(left, #292E49, #536976, #BBD2C5);
        background: linear-gradient(to right, #292E49, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
        font-size: 16px;
        border-radius: 7px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        position: relative;

    }

    .form__div.focus .form__label{

        left:-27px;
        width: 100%;
        top:-20px;
        font-size: 14px;
        color: var(--first-color);
       /* background-color: rgb(255, 255, 255);*/

    }

    .form__icon i.ic{
   
        font-size: 30px;
        color: var(--text-color);
        margin: 0;
        padding: 0;
        
    }
    .reg input[type="submit"].field{
            max-width: 90%;
            font-weight: 900;
            font-size: 20px;
        }
}


@media screen and (max-width:350px){

    .l-form{

        width: 100%;

    }

    .form{

        width: 96%;

    }

    .form .form__content{
   
        width: 100%;
        -webkit-box-shadow:7px 7px 80px #000;
                box-shadow:7px 7px 80px #000;
        padding: 20px 5px;
        height: auto;
  
    }
    
    .form__title{

        font-size:  23px;
        font-weight: 900;
        margin-bottom: 20px;
        text-align: center;
       
    }
    
    .form__div{

        margin-bottom: 10px;
        padding: 0px 0;
        padding-top: 15px;
        border-bottom: 1px solid var(--text-color);
        /*background-color: rgb(255, 255, 255);*/

    }
    
    .form__div-one{

        margin-bottom: 30px;
    
    }

    .form__label{
   
        left: 2px;
        top: -2px;
        font-size: 16px;
        color: var(--text-color);
    
    }
    
    .form__input{
     
        top:6px;
        left: 0px;
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background: none;
        padding-left: 24px;
        font-size: 16px;
        color: var(--first-color);
        
    }
    
    .form__button{
        
        width: 100%;
        padding: 6px;
        font-size: var(--normal-font-size);
        outline: none;
        border: none;
        background-color: -webkit-linear-gradient(to right, #292E49, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-gradient(linear, left top, right top, from(#292E49), color-stop(#536976), to(#BBD2C5));
        background: -o-linear-gradient(left, #292E49, #536976, #BBD2C5);
        background: linear-gradient(to right, #292E49, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
        font-size: 16px;
        border-radius: 7px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        position: relative;

    }

    .form__div.focus .form__label{

        left:-18px;
        width: 100%;
        top:-24px;
        font-size: 13px;
        color: var(--first-color);
       /* background-color: rgb(255, 255, 255);*/

    }

    .form__icon i.ic{
   
        font-size: 20px;
        color: var(--text-color);
        margin: 0;
        padding: 0;
        
    }
 
}


  .form2{
      overflow: hidden;
    max-height: 100%;
    max-width: 100%;
        
    -webkit-box-pack: center;
        
        -ms-flex-pack: center;
        
            justify-content: center;


  }
.form2 img.login2{
    margin: 0;
    padding: 0;
    width: 100%;
    left: 0px;
    display: block;

    top: 0;
 
    overflow: hidden;

}

.form2 img{   
    overflow: hidden;
    width: 100%;
    margin: 0;
    padding: 0;
    left: 0px;
    top: 0;  
  
    max-width: 100%;

}

.form{
    overflow: hidden;
  max-height: 100%;
  max-width: 100%;
  height: -webkit-fit-content;
  height: -moz-fit-content;
  height: fit-content;

}

.form img.login1{
  margin: 0;
  padding: 0;
  width: 100%;
  left: 0px;
  display: block;

  top: 0;

  overflow: hidden;    height: -webkit-fit-content;    height: -moz-fit-content;    height: fit-content;

}

.form img{   
  overflow: hidden;
 
  margin: 0;
  padding: 0;
  left: 0px;
  top: 0;  

  max-width: 100%;
  height: -webkit-fit-content;
  height: -moz-fit-content;
  height: fit-content;
}


i.fa.fa-bars{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin: 0;
    padding: 0;

    margin-top: -7px;
    margin-bottom: -17px;
   max-height: 48px;

}

a.padi{

    margin-top: 10px;
    
}



@media screen and (max-width:500px) {

    input[type="submit"].field{

        width: 100%;
        font-size: 20px;
   
    }

    input[type="submit"].eli.field{
        width: 100%;
   
        font-size: 22px;
        font-weight: 900;
        overflow: hidden;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        margin: 0;
        padding: 0;
        margin-bottom: 30px;

    }

}

.form2 img{
    max-width: 100%;
    max-height: 100vh;
}

@media screen and (max-width:350px) {

    a.icon{
        position: absolute;
     
    }
    .topnav{
        overflow: hidden;
    }
}


@media screen and (max-width:300px) {
    .topnav.responsive{
        overflow: visible;
    }

    
}


a.im{
    width: 283px;
    pointer-events: none;
}

a.im img{
    width: 100%;

} 
 


.form{

    position: relative;
    left: 0;
    top: 0;    
    background-color: white;
   
}

:root{

    --color-letra:rgb(80, 78, 78);

}

.form .form__div{

    border-color: black;

}
.form__content input{

    color: var(--color-letra);

}

.form label{

    color:var(--color-letra);

}

.form__title{

    color: var(--color-letra);

}

.form .form__button{

    color: white;

}

.form .form__div.focus label{
    color: var(--color-letra);
}

.form .form__icon i{
    color: black;
}


.form__content{
    position: relative;
 }
 
header.imagen{
    margin: 0;
    padding: 0;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    text-align: center;
    margin: 0 auto;
 
}
header.imagen img.login1{
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    max-width: 460px;
    height: 100%;
    -o-object-fit: cover;
       object-fit: cover;
    margin:  0 auto;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
}


header.global{
    background: none;
 margin: 0;
 padding: 0;
    width: 100%;
    height:100vh;
 
    overflow: hidden;
}

header.global img.fondo{

    min-height: 100%;
    min-width: 1024px;
    width: 100%;
    height: auto;
    position: fixed;
    top: 0;
    left: 0;
    pointer-events: none;


}

.form__content img.login1{

    margin: 0 auto;
    margin-bottom: 15px;
    max-height: 200px;
    max-width: 300px;
    width: 100%;
    height: auto;
    -o-object-fit: contain;
       object-fit: contain;
    pointer-events: none;
  
}

.form__button{

    font-weight: 900;
    border-radius: 15px;

}



@media screen and (min-width:1441px){

    .form .form__content img.login1{

        margin: 0 auto;
        margin-bottom: 15px;
        max-height: 20%;
        max-width: 80%;

        height: auto;
        -o-object-fit: contain;
           object-fit: contain;
        pointer-events: none;
  
    }

    .form .form__content{

        width: 700px;
        -webkit-box-shadow:7px 7px 80px #000;
                box-shadow:7px 7px 80px #000;
        padding: 25px 45px;
        height: auto;
     
    }

    .form__title{

        font-size:  55px;
        font-weight: 900;
        margin-bottom: 40px;
        text-align: center;
       position: relative;
    
    }
    
    .form .form__div{

        margin-bottom: 27px;
        padding-top: 30px;
        border-bottom: 3px solid var(--color-letra);

    }
    .form__div.focus{
      
        border-bottom: 3px solid var(--color-letra);

    }
    
    .form .form__div-one{

        margin-bottom: 50px;
    
    }

    .form__label{

        left: 2px;
        top:0px;
        font-size: 30px;
        color: var(--color-letra);
    
    }
    
    .form__input{
     
        top:13px;
        left: 2px;
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background: none;
        padding-left: 51px;
        font-size: 28px;
        font-weight: 900;
        color: var(--color-letra);
        
    }
    
    .form__button{

        width: 100%;
        padding: 12px;
        font-size: var(--normal-font-size);
        outline: none;
        border: none;

        background-color: -webkit-linear-gradient(to right, #292E49, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-gradient(linear, left top, right top, from(#292E49), color-stop(#536976), to(#BBD2C5));
        background: -o-linear-gradient(left, #292E49, #536976, #BBD2C5);
        background: linear-gradient(to right, #292E49, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
        font-size: 28px;
        border-radius: 10px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        position: relative;    border-radius: 15px;
    }

    .form__div.focus .form__label{

        left:-51px;
        width: 100%;
        top:-39px;
        font-size: 24px;
        color: var(--first-color);
       /* background-color: rgb(255, 255, 255);*/
    }
    

    .form__icon i.ic{
   
        font-size: 50px;
        margin: 0;
        padding: 0;
        
    }

}

.botones a.apagar {

    padding: 0 9.31px;
    background-color: rgb(9, 172, 9);
    border: rgb(9, 172, 9);
    outline: none;
    font-size: 26px;
    
}

.botones a.apagar:hover{

    background-color: rgb(18, 225, 18);
    border-color: rgb(18, 225, 18);
    outline: none;

}

.botones a.nivel1{

    background-color: rgb(164, 2, 186);
    border-color: rgb(126, 16, 189);

}

.botones a.nivel1:hover{

    background-color: rgb(204, 44, 225);
    border-color: rgb(126, 16, 189);

}

.botones a.nivel2{

    background-color: tomato;
    border-color: tomato;

}

.botones a.nivel2:hover{

    background-color: rgb(223, 59, 31);
    border-color: rgb(223, 59, 31);

}

.botones a.apagar1{

    background-color: black;
    border: black;
    outline: none;
    font-size: 20px;
    
}

.botones a.apagar1:hover{

    background-color: rgb(40, 40, 40);
    border-color:black;
    outline: none;

}

a.disable{
    pointer-events: none;
}

.form{
    border-radius: 20px;
}

.texto{
    font-size: 30px;
    font-weight: 900;
}

h3{
    font-family: 'Open Sans', sans-serif;
    font-size: 20px;
    font-weight: bolder;
}

a.nada:hover{
    opacity: 1;
    color: white;
}

td.centro div.botones{
    margin: 0 10px;

}

.width-20{
    min-width: 20%;
    width: 20%;
    max-width: 20%;
}

.width-10{   
    min-width: 10%;
    width: 10%;
    max-width: 10%;
}

.width-30{
    min-width: 30%;
    width: 30%;
    max-width: 30%;
}

.width-40{
    min-width: 40%;
    max-width: 40%;
    width: 40%;
}

.width-50{
    min-width: 50%;
    width: 50%;
    max-width: 50%;
}

.width-15{
    max-width: 15%;
    min-width: 15%;
    width: 15%;
}

.width-25{
    max-width: 25%;
    min-width: 25%;
    width: 25%;
}

.width-45{
    max-width: 45%;
    width: 45%;
}

.width-35{
    max-width: 35%;
    width: 35%;
}

.width-70{
    width: 70%;
}

.reg input[type="submit"]{
        max-width: 40%;
        min-width: 300px;
    }
</style>
</head>

<body>

    
    <script>

        if ( window.history.replaceState ) {

            window.history.replaceState( null, null, window.location.href );

        }   

    </script>
    
  
    <?php
    
error_reporting(E_ERROR | E_PARSE);

    ?>

  
