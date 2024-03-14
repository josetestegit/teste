<?php

define('TITLE', "ÁGUA VERDE");
include '../assets/layouts/header.php';
check_verified();
include 'atualiza.php';
atualiza();

$conexao = funcao_conectar();

?>

  <style>
    
    @font-face {
  font-family: "gotam";
  src: url("fontes/Gotham-Black.otf");
 
}
    
     .body{
                background: linear-gradient(341deg, black, #2034a5);
    color: white;    
    
    }
    
    .titulo{
        margin-top: 2%;
        margin-bottom: 3%;
        font-size: 20px;
        font-weight: bold;
        font-family: arial;
    }
    
     .linha_tabela:hover{
            background: linear-gradient(360deg, black, #b32929);
    }    
    
     
   
    .filtro{
        /*margin-top: 3%;*/
        display: flex;
        justify-content: center;
    }
    
    .centralizar{
            line-height: 0;
       text-align: center;
    }
    
    .campos{
      font-size: 16px;
    font-weight: bold;
    line-height: 1.2;
    }
    
    .campos_data{
        font-size: 20px;
        font-weight: bold;
        font-family: arial;
    }
    
 
    .conteudo_info{
       text-align: center;
    display: flex;
    justify-content: center; 
    }
    
    .quadro_info{
             height: 491px;
    border-radius: 20px;
    margin-top: 3%;
    width: 400px;
    background: linear-gradient(180deg, black, #352f2f);
}
.tudo{
/*display: flex;*/
width: 100%;
height: 100vh; 
display: flex;
background: linear-gradient(341deg, black, #df1717);
/* position: fixed;*/
}

    .col1{
            margin-left: 3%;
        text-align: center;
        width: 80%;
        height: 100vh;
    }
    
    .conteudo_tabela{
        justify-content: center;
    display: flex;
    }
    
    .grid_container {
    overflow-y: auto !important;
    height: 68% !important;
    width: 100%;
    margin: 0 auto;
}
    
    .col2{
          margin-top: 2%;
       width: 20%;
        height: 100vh;
        text-align: center;
    }
    .fundo_preto {
    background-color: #000000 !important;
}
    
    .btn_imprimir{
       
       color: white;
    border-radius: 20px;
    width: 100px;
    background: linear-gradient(360deg, #8b8686, #1a1a1a);  
    }
    .btn_imprimir:hover{
     
       color: white;
    border-radius: 20px;
    width: 100px;
    background: linear-gradient(360deg, #595757, #000000); 
    }
    .btn_voltar{
         
          margin-top: 36%;
      color: white;
    border-radius: 20px;
    width: 100px;
    background: linear-gradient(360deg, #8b8686, #1a1a1a); 
        
    }
    
    .form{
            margin-top: -1%;
        text-align: center;
    }
    
    .btn_voltar:hover{
              margin-top: 36%;
        color: white;
    border-radius: 20px;
    width: 100px;
      background: linear-gradient(360deg, #595757, #000000);
    }
    
    
     .btn_buscar{
       color: white;
    border-radius: 20px;
    width: 100px;
    background: linear-gradient(360deg, #8b8686, #1a1a1a); 
    }
    .btn_buscar:hover{
       color: white;
    border-radius: 20px;
    width: 100px;
    background: linear-gradient(360deg, #595757, #000000);
    }
     .radius_campos{
        border-radius: 15px;
    }
     .azul{
         background: black;
         border-radius: 10px;
        color: #77bcef;
         font-weight: bold;
    }
    .amarelo{
         background: black;
         border-radius: 10px;
        color: #e3e747;
        font-weight: bold;
    }
    .em_processo{
      
         border-radius: 10px;
       color: orange;
        font-weight: bold;
    }
    
    .canceladas{
       
         border-radius: 10px;
       color: red;
        font-weight: bold;
    }
    
    .concluidas{
        
         border-radius: 10px;
       color: limegreen;
        font-weight: bold;
        
    }
    
   .info_estoque {
    margin-top: 25%;
}
    
    
    .laranja{
         background: black;
         border-radius: 5px;
     
       color: orange;
        font-weight: bold;
    }
    
    .vermelho{
         background: black;
      
         border-radius: 5px;
       color: red;
        font-weight: bold;
    }
    
    .verde{
         background: black;
      
         border-radius: 5px;
       color: limegreen;
        font-weight: bold;
        
    }
    
    .azul_claro{
         background: black;
         border-radius: 10px;
       color: #00D3FF;
        font-weight: bold;
    }

    
    
    
    
    
    
    
    .tabela{
        width: 100%;
        margin-top: 2%;
    }
    
   
   
 
    
   
    }
    
    .impressao{
        display: none;
    }
    
    .header_fixo{
            display: flex;
        width: 100%;
        
            margin-top: 1%;
    }
    
    .campos{
        font-weight: bold;
    }
    
    .campos_imp{
       font-size: 10px; 
    }
    
 
    .fundo_header_fixo{
        background: linear-gradient(360deg, #8b8686, #1a1a1a);
    padding-left: 1%;
    padding-right: 1%;
    border-radius: 15px;
    }
    
    
   
    
    
         .mostly-customized-scrollbar {
  display: block;
 
  overflow: auto;
  height: 2em;
}

.invisible-scrollbar::-webkit-scrollbar {
  display: none;
}

/* Demonstrate a "mostly customized" scrollbar
 * (won't be visible otherwise if width/height is specified) */
.mostly-customized-scrollbar::-webkit-scrollbar {
    width: 15px;
    height: 15px;
    background-color: none;
    background: #dedee3;
    border-radius: 10px;
}
          
        .mostly-customized-scrollbar::-webkit-scrollbar-thumb {
    /* background: #161b5b; */
    background: linear-gradient(341deg, black, #9f1010);
    border-radius: 20px;
}
        
    
   .span_des_estoque {
    width: 11%;
}

.span_cod_produto {
    width: 11%;
}

.span_desc_produto {
    width: 20%;
}

.span_qtd_estoque {
    width: 7%;
}

.span_est_min {
    width: 8%;
}
.span_est_max {
    width: 8%;
}
.span_situacao_produto {
    width: 11%;
}

.span_valor_medio {
    width: 12%;
}
.span_valor_total_item {
    width: 12%;
} 
    
    
   .td_des_estoque {
   width: 11%;
}

.td_cod_produto {
    width: 11%;
}

.td_desc_produto {
    width: 20%;
}

.td_est_min{
     width: 8%;
}


.td_est_max{
     width: 8%;
}

.td_situacao_produto{
   width: 11%;

}

.td_valor_medio {
     width: 12%;
}

.td_qtd_estoque {
   width: 7%;
}

.td_valor_total_item {
   width: 12%;
}

    .impressao{
        display: none;
    }
    
    .novo_imprimir{
        background: none;
    color: white;
          /*  width: 30px;
    height: 33px;*/
       
    }
    
     svg.bi.bi-printer-fill{
          width: 35px;
    height: 40px;
    margin-left: 2%;
    }
      
      .bg-dark{
            background: black !important;
    }
    </style>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Estoque 1 - Água Verde</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
   
<!--    <link type="text/css" href="novo/index.css">-->
</head>

     
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
   
     
     window.location.href = ("estoque1_inicial.php");
    
}

function executa_delay_atualiza(){
     setTimeout(chama_atualiza, 300000);
}
    
        executa_delay_atualiza();
    
    </script>  
    
    
<?php
/*function _pdo() {
$db = array();
  $db[ 'host' ] = 'ip-50-116-31-199.cloudezapp.io';
  $db[ 'dbname' ] = 'db_estoque';
  $db[ 'user' ] = 'user_estoque';
  $db[ 'pass' ] = 'M3g4@2820';


try {
$options = array();
$pdo = new PDO( "mysql:host=" . $db[ 'host' ] . ";dbname=" . $db[ 'dbname' ], $db[ 'user' ], $db[ 'pass' ], $options );
$pdo->exec( "set names utf8" );

return $pdo;


} catch ( \Exception $ex ) {
return $ex->getMessage();
}

};
*/
   
    ?>
    
    
     <?PHP

/*$pdo = _pdo();  */
$sql = 'SELECT sum(valor_total_por_item) from estoque_agua_verde ';
$valor_total = $conexao->query( $sql )->fetch();

/*$pdo = _pdo(); */ 
$sql = 'select sum(qtd_estoque) from estoque_agua_verde';
$qtd_total_itens = $conexao->query( $sql )->fetch();
    
    
    
    ?>

    
    
    
                  
<body class="body">
<div class="tudo">
    <div class="col1">
    <div class="centralizar">
     <label class="titulo">ESTOQUE 1 - CURITIBA - ÁGUA VERDE</label><br>
    </div>  
    
        <form class="form"  method="post" action="estoque1.php">
   
    
  <label class="campos">COD:</label>
<select id="select_status" class="radius_campos" name="select_cod_produto">
<option  value="" selected> </option>
<?php
/*$pdo = _pdo();*/
$buscar_cod_produto = $conexao->query( "select cod_produto from estoque_agua_verde group by cod_produto" );
while ( $res = $buscar_cod_produto->fetch() ) {
$cod_produto = $res[ 'cod_produto' ];
?>
<option value="<?php echo $cod_produto ?>"> <?php echo $cod_produto ?></option>
<?php  } ?>
</select>&nbsp;&nbsp; &nbsp;  
    
            
<label class="campos">DESCRIÇÃO DE PRODUTO</label>
<select id="select_status" class="radius_campos" name="select_descricao_produto">
<option  value="" selected> </option>
<?php
/*$pdo = _pdo();*/
$buscar_descr_produto = $conexao->query( "select descr_produto from estoque_agua_verde group by descr_produto" );
while ( $res = $buscar_descr_produto->fetch() ) {
$descr_produto = $res[ 'descr_produto' ];
?>
<option value="<?php echo $descr_produto ?>"> <?php echo $descr_produto ?></option>
<?php  } ?>
</select>&nbsp; &nbsp; &nbsp;             
            
            
    
   
    
    <button class="btn_buscar" > Buscar </button>&nbsp; &nbsp; &nbsp; &nbsp; 
     
            
            
            
   <button class="novo_imprimir" onClick="printDiv_conteudo('imprimir_conteudo');">
            
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
  <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
  <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
</svg>       
            
            
            
            </button>      
            
            
          
           
    </form>
           
   <?PHP  
        
    /*********TODOS PRODUTOS *********/    
/*$db = _pdo();*/
$sql = 'select * from estoque_sao_jose';
$todos_produtos = $conexao->query( $sql )->fetch();
$total_de_instalacoes = 0;

    
    
    

 ?>   

<div class="header_fixo">
<div class="span_des_estoque campos fundo_header_fixo">DESC. ESTOQUE</div>
<div class="span_cod_produto campos fundo_header_fixo">CÓD. PRODUTO</div>
<div class="span_desc_produto campos fundo_header_fixo">DESCR. PRODUTO</div>
<div class="span_qtd_estoque campos fundo_header_fixo">QTD. ESTOQUE</div>
<div class="span_est_min campos fundo_header_fixo">QTD MIN.</div>
<div class="span_est_max campos fundo_header_fixo">QTD MAX.</div>
<div class="span_situacao_produto campos fundo_header_fixo">SITUAÇÃO</div>
<div class="span_valor_medio campos fundo_header_fixo">VALOR MÉDIO</div> 

<div class="span_valor_total_item campos fundo_header_fixo">VALOR TOTAL POR ITEM</div> 

</div>  <br>      

        
        
        <!--/*********** tela ***********/    -->
<div class="grid_container mostly-customized-scrollbar">
<table class="tabela">
<thead>
<tr>
<!--<th class="">DESC. ESTOQUE</th>
<th class="">CÓD. PRODUTO</th>
<th class="">DESC. PRODUTO</th>
<th class="">VALOR MÉDIO</th>
<th class="">QTD. ESTOQUE</th>
    <th>VALOR TOTAL POR ITEM</th>-->
  
</tr>
</thead>
<tbody>
    <?php
    
  
    
    
    
    $total_geral_estoque = 0; 



/*$db = _pdo(); */ 
$sql = 'select * from estoque_agua_verde';
$todos_produtos = $conexao->query( $sql )->fetch();
$total_de_instalacoes = 0;  
foreach ( $conexao->query( $sql ) as $row ) {         
  
$preco_medio = $row['preco_medio'];     
$valor_total_item = $row['preco_medio']  * $row['qtd_estoque']; 
   
echo '<tbody>';        
echo '<tr class="linha_tabela">';
echo '<td class="td_des_estoque">'. $row["descr_estoque"].' </td>';
echo '<td class="td_cod_produto">'. $row["cod_produto"].' </td>';
echo '<td class="td_desc_produto">'. $row["descr_produto"].' </td>';
echo '<td class="td_qtd_estoque">'. $row["qtd_estoque"].' UN.'.' </td>';
echo '<td class="td_est_min">'. $row["estoque_min"].' UN.'.' </td>';
echo '<td class="td_est_max">'. $row["estoque_max"].' UN.'.' </td>';  
echo '<td class="td_situacao_produto">'. $row["situacao"].' </td>';  
echo '<td class="td_valor_medio">'.'R$ '.number_format("$preco_medio",2,",",".").' </td>';
echo '<td class="td_valor_total_item">'.'R$ '.number_format("$valor_total_item",2,",",".").' </td>';
echo '</tr>';          
echo '</tbody>';
    
    

    
  
        }      
        
    
    

  
    

        ?>
</tbody>
</table>
</div>

   <!-- /*********** impressao **********/-->
        <!-- /********** impressao **********/-->
       <div id="imprimir_conteudo" class="impressao">
              <label style="font-weight: bold; font-family: arial; font-size: 12px;">ESTOQUE:</label>
<label style="font-weight: bold; font-family: arial; font-size: 12px; color: blue;">CURITIBA - ÁGUA VERDE </label>
            
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            
<label style="font-weight: bold; font-family: arial; font-size: 12px;">VALOR MONETÁRIO TOTAL EM ESTOQUE:</label>
<label style="font-weight: bold; font-family: arial; font-size: 12px; color: blue;"><?php echo 'R$ '.number_format("$valor_total[0]",2,",",".")    ?></label>
            
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            
<label style="font-weight: bold; font-family: arial; font-size: 12px;">QTD. TOTAL DE ITENS EM ESTOQUE:</label>
<label style="font-weight: bold; font-family: arial; font-size: 12px; color: blue;"><?php echo number_format("$qtd_total_itens[0]",0,",",".").' ITENS'    ?></label><br>
<div class="grid_container mostly-customized-scrollbar">
    
  
    
    
<table class="tabela">
<thead>
<tr>
    
    <th style="font-family: arial; padding-left: 5px; padding-right: 5px; font-size: 12px;  width: 11%; border-radius: 10px; background: black; color: white;">DESC. <br> ESTOQUE</th>
<th style="font-family: arial;font-size: 12px; padding-left: 5px; padding-right: 5px; width: 11%; border-radius: 10px; background: black; color: white;">CÓD. <br> PRODUTO</th>
<th style="font-family: arial; font-size: 12px; padding-left: 5px; padding-right: 5px; width: 20%; border-radius: 10px; background: black; color: white;">DESCR. <br> PRODUTO</th>
<th style="font-family: arial; font-size: 12px; padding-left: 5px; padding-right: 5px; width: 7%;  border-radius: 10px;background: black; color: white;">QTD. <br> ESTOQUE</th>
<th style="font-family: arial;  font-size: 12px; padding-left: 5px; padding-right: 5px; width: 8%; border-radius: 10px; background: black; color: white;">QTD. <br> MIN.</th>
<th style="font-family: arial;  font-size: 12px; padding-left: 5px; padding-right: 5px;width: 8%;  border-radius: 10px;background: black; color: white;">QTD. <br> MAX.</th>
<th style="font-family: arial;  font-size: 12px; padding-left: 5px; padding-right: 5px; width: 11%; border-radius: 10px; background: black; color: white;">SITUAÇÃO</th>
<th style="font-family: arial;  font-size: 12px; padding-left: 5px; padding-right: 5px;width: 12%; border-radius: 10px; background: black; color: white;">VALOR <br>MÉDIO</th> 
<th style="font-family: arial;  font-size: 12px; padding-left: 5px; padding-right: 5px;width: 12%; border-radius: 10px; background: black; color: white;">VALOR TOTAL<br> POR ITEM</th> 
    
    
<!--<th class="">DESC. ESTOQUE</th>
<th class="">CÓD. PRODUTO</th>
<th class="">DESC. PRODUTO</th>
<th class="">VALOR MÉDIO</th>
<th class="">QTD. ESTOQUE</th>
<th>VALOR TOTAL POR ITEM</th>-->
  
</tr>
</thead>
<tbody>
    <?php
  $VALOR_TOTAL_EM_ESTOQUE = 0;  

  
 $total_item = 0;
 $total_geral = 0;



/*$pdo = _pdo();  */
$sql = 'select * from estoque_agua_verde';
$todos_produtos = $conexao->query( $sql )->fetch();
$total_de_instalacoes = 0;  
foreach ( $conexao->query( $sql ) as $row ) {         
 
$valor_total_item = $row['preco_medio'] * $row['qtd_estoque'];    
$total_item = ($row['preco_medio'] * $row['qtd_estoque']);
$total_geral += $total_item; 
    

    
echo '<tbody>';        
echo '<tr>';
echo '<td style="width: 11%; text-align: center;">'. $row["descr_estoque"].' </td>';
echo '<td style="width: 11%; text-align: center;">'. $row["cod_produto"].' </td>';
echo '<td style="width: 20%; text-align: center;">'. $row["descr_produto"].' </td>';
echo '<td style="width: 7%; text-align: center;">'. $row["qtd_estoque"].' UN.'.' </td>';
echo '<td style="width: 8%; text-align: center;">'. $row["estoque_min"].' UN.'.' </td>';
echo '<td style="width: 8%; text-align: center;">'. $row["estoque_max"].' UN.'.' </td>';  
echo '<td style="width: 11%; text-align: center;">'. $row["situacao"].' </td>';  
echo '<td style="width: 12%; text-align: center;">'.'R$ '. number_format("$preco_medio",2,",",".").' </td>';
echo '<td style="width: 12%; text-align: center;">'.'R$ '.number_format("$valor_total_item",2,",",".").' </td>';
echo '</tr>';          
echo '</tbody>';
   
} 
   


        ?>
</tbody>
</table>
</div>
</div> 
    
     <script> 
function printDiv_conteudo() { 
var divContents = document.getElementById("imprimir_conteudo").innerHTML; 
var a =  window.open('', '', 'height=1000, width=1000, left='+(window.innerWidth-1000)/2+', top='+(window.innerHeight-1000)/2);
a.document.write('<html>'); 
a.document.write('<div style="text-align: right">');
a.document.write('<img src="logo_megamidia.png" style="width: 40px; height: 40px; text-align: right; margin-right: 1%;">');
a.document.write('</div>');
a.document.write('<body > <h1 style="text-align: center; margin-top: -2%; "><br>'); 
a.document.write('<div style="font-size: 12px; width: 100%; text-align: center; text-weight: bold;">');
a.document.write('<div style=" padding-top: 3px; padding-bottom: 3px;  background: black; text-align: center; width: 100%; border-radius: 10px;">');    
a.document.write('<label style="background: black; color: white; width: 70%; font-family: arial; font-weight: bold; font-size: 20px; padding-top: 3px; padding-bottom: 3px;  ">CONTROLE DE ESTOQUE - ESTOQUE 1 - ÁGUA VERDE </label>');
 a.document.write('</div>');
    a.document.write('</div>');

a.document.write(divContents); 

a.document.write('</body></html>'); 
a.document.close(); 
a.print();  

                  }
                  
                  
                  
                  
               
                  
       
    </script> 
               
        
        
        
        
        
</div>

<div class="col2">

<a href="index.php"><button class="btn_voltar">voltar</button></a>


<div class="info_estoque">
<!--<label>INFORMAÇÕES SOBRE O ESTOQUE</label><br><br>-->

  
 <label>ESTOQUE:</label><br>
<label style="font-weight: bold;">CURITIBA - ÁGUA VERDE </label><br><br>
   
<label>VALOR MONETÁRIO <br> TOTAL EM ESTOQUE</label><br>
<label style="font-weight: bold;"><?php echo 'R$ '.number_format("$valor_total[0]",2,",",".")    ?>   </label><br><br>
<label>QTD. TOTAL <br> DE ITENS EM ESTOQUE</label><br>
<label style="font-weight: bold;"><?php echo number_format("$qtd_total_itens[0]",0,",",".").' itens'    ?> </label>

<!--<button class="btn_imprimir" onClick="printDiv('valores');">Imprimir</button>     -->
</div>
        
<div id="valores" class="impressao">

<div style="text-align: center; ">
<br><br>
<!--<label style="font-weight: bold; font-size: 20px;">INFORMAÇÕES SOBRE O ESTOQUE</label><br><br>-->


<label style="font-weight: bold; font-size: 20px;">VALORES EM ESTOQUE</label><br>
<label style="font-weight: bold; font-size: 20px;">R$ 400.000</label>
<label style="font-weight: bold; font-size: 20px;">QTD. DE ITENS EM ESTOQUE</label><br>
<label style="font-weight: bold; font-size: 20px;">8000 itens</label>
<label style="font-weight: bold; font-size: 20px;">VALOR TOTAL EM ESTOQUE:</label><br>
</div>
</div>
        
        
        
        


        
        
    
    </div>
    
    </div>

  

   
    </body>
</html>

<?php

 include '../assets/layouts/footer.php'

    ?>

