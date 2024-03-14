<?php 
define('TITLE', "Instalações");
include '../assets/layouts/header.php';
check_verified();
/*include 'conexao.php';
$conexao = funcao_conectar();*/
include 'atualiza.php';
atualiza();

?>

<style>

.body{
                background: linear-gradient(341deg, black, #2034a5);
    color: white;    
    
    }
    
    .centralizar{
        text-align: center;
    }
    
    .fundo_preto {
    background-color: #000000 !important;
}
    .btn_voltar{
       color: white;
    border-radius: 20px;
    width: 100px;
    background: linear-gradient(360deg, #8b8686, #1a1a1a); 
    }
    .btn_voltar:hover{
       color: white;
    border-radius: 20px;
    width: 100px;
   background: linear-gradient(360deg, #595757, #000000);
        cursor: pointer;
    }
    
    a {
        color: white;
        cursor: pointer;
    }
    
    a:hover{
      color: white;
        cursor: pointer !important;  
        text-decoration: none;
    }
    
    .totalizadores{
        width: 100%;
     
        height: 50%;
       
            justify-content: center;
        
            
    }
    
    .linha1{
        width: 100%;
        height: 50%;
        display: flex;
        justify-content: center;
            margin-top: 2%;
    }
    
    .linha2{
        margin-top: 2%;
        width: 100%;
        height: 50%;
        display: flex;
        justify-content: center;
    }
    
    .totalizador_rede_data_inauguracao{
             width: 16%;
    height: 200px;
    background: #bdbd4c;
    border-radius: 30px;
    margin-left: 20px;
    margin-right: 20px;
    }
    
    .quadro_totalizadores{
          width: 250px;
    height: 200px;
       background: linear-gradient(45deg, #433a3a, black);
    border-radius: 30px;
    margin-left: 20px;
    margin-right: 20px;
    justify-content: center;
    align-items: center;
    display: flex;
            box-shadow: -8px -5px 16px 0 #c9c7c7;
    }
    
     .quadro_totalizadores:hover{
          width: 250px;
    height: 200px;
     background: linear-gradient(45deg, #433a3a, black);
    border-radius: 30px;
    margin-left: 20px;
    margin-right: 20px;
    justify-content: center;
    align-items: center;
    display: flex;
             box-shadow: -8px -5px 16px 0 #c9c7c7;
         scale: 1.1;
        
    }
    
 
    
    .titulo{
        font-size: 25px;
        font-family: arial;
        font-weight: bold;
    }
    
     .titulo_itens{
        font-size: 20px;
        font-family: arial;
        font-weight: bold;
         
    }
    
     .titulo_itens:hover{
        font-size: 20px;
        font-family: arial;
        font-weight: bold;
         cursor: pointer;
         color: yellow;
    }
    
    .tudo{
        display: flex;
       width: 100%;
        height: 100vh;
            background: linear-gradient(341deg, black, #df1717);
    }
    
    .col1{
        width: 100%;
        height: 100vh;
    }
    
  .centralizar_div {
    width: 100%;
    display: flex;
    justify-content: center;
    background: linear-gradient(341deg, black, #df1717);
}

</style>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Totalizadores</title>
</head>
    
    <style>
    
        .btn_atualizar{
            color: white;
    border-radius: 20px;
    width: 100px;
    background: linear-gradient(360deg, #8b8686, #1a1a1a);
        }
        
        .btn_atualizar:hover{
             color: white;
    border-radius: 20px;
    width: 100px;
    background: linear-gradient(360deg, #595757, #000000); 
        }
    
    
    </style>
    
   
    
      
    <script>
          
     $(function() { //onload
   setEvent();
    
});

$(document).on('mousemove', function() { //mouse move 
    if (timeout !== null) {
       
        clearTimeout(timeout); //clear no timer
    }
    setEvent(); //seta ele novamente para caso aja inatividade faça o evento
});

function setEvent(){
    timeout = setTimeout(function() {
       window.location.href = ("../logout/");
    }, 900000); 
}   
          
      </script>
    
    
    
    
   
    
    
    <script type="text/javascript">
    
    function chama_atualiza(){
   
    
     window.location.href = ("index.php");
    
}

function executa_delay_atualiza(){
     setTimeout(chama_atualiza, 300000);
}
    
        executa_delay_atualiza();
    
    </script>
    

<body class="body">
    <div class="tudo">
    <div class="col1">
        <div class="centralizar"><br>

    <label class="titulo">CONTROLE DE PRODUTOS EM ESTOQUE</label><br>
<br>

    </div>
    <div class="centralizar">
        
        <div class="totalizadores">
            
            <div class="linha1">
            <!--<a  href="totalizador_rede_projeto.php">
            <div class="quadro_totalizadores">
            <label class="titulo_itens">POR REDE <BR> E PROJETO </label>  
            </div>
            </a>-->
            
             <a  href="estoque1_inicial.php">
            <div class="quadro_totalizadores">
            <label class="titulo_itens">ESTOQUE 1 <br> ÁGUA VERDE </label> 
            </div>
            </a>
                 
            <a href="estoque2_inicial.php">
            <div class="quadro_totalizadores">
            <label class="titulo_itens">ESTOQUE 2 <br> SÃO JOSÉ</label> 
            </div>
            </a>     
                 
            <a href="estoque3_inicial.php">
            <div class="quadro_totalizadores">
            <label class="titulo_itens">ESTOQUE 3 <br> SÃO PAULO </label>    
            </div>
            </a>    
            
           
                           
            
            </div>
            
            
            <div class="linha2">
            
            
            <a href="totalizador_rede_projeto.php">
            <div class="quadro_totalizadores">
            <label class="titulo_itens"> </label>    
            </div>
            </a>
            
            <a href="totalizador_estado.php">
            <div class="quadro_totalizadores">
            <label class="titulo_itens"> </label>    
            </div>
            </a>
           </div>
            
            
            
        </div>
                
                <br><br><br><br><br>

                <label>A ATUALIZAÇÃO É FEITA AUTOMATICAMENTE DE 5 EM 5 MIN, OU SE DESEJAR PODE-SE CLICAR EM ATUALIZAR.</label><br>
                <label>ÚLTIMA ATUALIZAÇÃO:</label> <label><?php 
                date_default_timezone_set('America/Sao_Paulo');
                echo date("d/m/Y   H:i:s");  ?></label><br><br>
                
                <a href="index.php"><button class="btn_atualizar">ATUALIZAR</button></a>
    <br>
    
        </div>
        </div>
  
    </div>
    
    </body>
        

</html>
<?php

 include '../assets/layouts/footer.php'

    ?>
