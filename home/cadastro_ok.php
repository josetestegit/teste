<?php
define('TITLE', "Instalações");
include '../assets/layouts/header.php';
check_verified();
?>

<style>

    .titulo{
        margin-top: 5%;
        font-size: 20px;
        color: white;
        font-weight: bold;
        font-family: arial;
        
    }
    
    .tudo{
        height: 100vh;
        width: 100%;
      /*  display: flex;*/
        background: linear-gradient(341deg, black, #df1717);
    }
    
    .btn_ok {
   
    color: white;
    border-radius: 20px;
    width: 100px;
    background: linear-gradient(360deg, #8b8686, #1a1a1a);
}

    .btn_ok:hover{
        color: white;
    border-radius: 20px;
    width: 100px;
      background: linear-gradient(360deg, #595757, #000000);
    }
    
    .conteudo{
        text-align: center;
       /* display: flex;
        justify-content: center;
        align-items: center;*/
    }

    
</style>
<body>

    <div class="tudo">
    
        <div class="conteudo">
        
         <label class="titulo">USUÁRIO CADASTRADO COM SUCESSO!</label><br>
        <a href="../logout/"><button class="btn_ok">OK</button></a>
        
        
        </div>
   
    
    
    </div>
    



</body>
