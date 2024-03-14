<?php

ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);

include 'conexao.php';


/*function _pdo() {
  $db = array();
  $db[ 'host' ] = 'ip-50-116-31-199.cloudezapp.io';
  $db[ 'dbname' ] = 'db_estoque';
  $db[ 'user' ] = 'user_estoque';
  $db[ 'pass' ] = 'M3g4@2820';


  try {
    $options = array();
    $pdo = new PDO( "mysql:host=" . $db[ 'host' ] . ";dbname=" . $db[ 'dbname' ], $db[ 'user' ], $db[ 'pass' ], $options );
    $pdo->exec( "set names utf8mb4" );
   
    return $pdo;


  } catch ( \Exception $ex ) {
    return $ex->getMessage();
  }

};*/


function atualiza() {

  $conexao = funcao_conectar();

  /********** LIMPA TABELA ESTOQUE AGUA VERDE ********/
  $query_limpa_tabela_estoque_agua_verde = "DELETE FROM estoque_agua_verde";

  $query1_agua_verde = $conexao->prepare( $query_limpa_tabela_estoque_agua_verde );
  $query1_agua_verde->execute();
    
    /********** LIMPA TABELA ESTOQUE SAO JOSE********/
  $query_limpa_tabela_estoque_sao_jose = "DELETE FROM estoque_sao_jose";

  $query1_sao_jose = $conexao->prepare( $query_limpa_tabela_estoque_sao_jose );
  $query1_sao_jose->execute();
    
    /********** LIMPA TABELA ESTOQUE SAO PAULO ********/
  $query_limpa_tabela_estoque_sao_paulo = "DELETE FROM estoque_sao_paulo";

  $query1_sao_paulo = $conexao->prepare( $query_limpa_tabela_estoque_sao_paulo );
  $query1_sao_paulo->execute();

    
    
    
/*********** INSERIR ESTOQUE AGUA VERDE **********/
 $filename_agua_verde = "https://megamidiagroup.com.br/csv_jose_carlos/estoque_agua_verde.csv";
 /*  $filename_agua_verde = "\\10.1.1.76\Operacao\joao\estoque_agua_verde.csv";*/
    $file1_agua_verde = fopen( $filename_agua_verde, "r" );
  while ( ( $emapData1_agua_verde = fgetcsv( $file1_agua_verde, 10000, ";" ) ) !== FALSE ) {
   
      /*$desc_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[4]);
      $desc_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[4]);
      $desc_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[4]);
      $desc_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[4]);
      $desc_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[4]);
      $desc_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[4]);
      $desc_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[4]);
      $desc_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[4]);*/
      
/*$total_por_item = $emapData1_agua_verde[5] * $emapData1_agua_verde[13]; */
      
$nome_estoque = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[2]);
$cod_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[3]);
$descricao_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[4]);
$qtd_estoque = $emapData1_agua_verde[5];
$estoque_min = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[6]);
$estoque_max = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[7]);
$situacao = iconv("ISO-8859-1", "UTF-8", $emapData1_agua_verde[10]);
$preco_medio = $emapData1_agua_verde[13];

  settype($qtd_estoque, "float");    
   settype($preco_medio, "float");      
    settype($total_por_item, "float");  
$total_por_item = $qtd_estoque * $preco_medio;      
      
/*$valor_total_por_item = iconv("UTF-8", "ISO-8859-1", $total_por_item);*/
   
    $query_inserir_estoque_agua_verde = "INSERT into estoque_agua_verde (
    
    descr_estoque,
    cod_produto,
    descr_produto,
    situacao,
    qtd_estoque,
    estoque_min,
    estoque_max,
    preco_medio,
    valor_total_por_item
    
   
    ) 
   
    values (
   '$nome_estoque',
    '$cod_produto',
    '$descricao_produto',
    '$situacao',
    '$qtd_estoque',
    '$estoque_min',
    '$estoque_max', 
    '$preco_medio',
    '$total_por_item '
    
 
    )";
    $query2_agua_verde = $conexao->prepare( $query_inserir_estoque_agua_verde );
    $query2_agua_verde->execute();
    
  }
  fclose( $file1_agua_verde );

    
    
    
/*********** INSERIR ESTOQUE SÃO JOSÉ DOS PINHAIS**********/
  $filename_sao_jose = "https://megamidiagroup.com.br/csv_jose_carlos/estoque_sao_jose_dos_pinhais.csv";
  $file1_sao_jose = fopen( $filename_sao_jose, "r" );
  while ( ( $emapData1_sao_jose= fgetcsv( $file1_sao_jose, 10000, ";" ) ) !== FALSE ) {
        $nome_estoque = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_jose[2]);
$cod_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_jose[3]);
$descricao_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_jose[4]);
$qtd_estoque = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_jose[5]);
$estoque_min = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_jose[6]);
$estoque_max = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_jose[7]);
$situacao = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_jose[10]);
$preco_medio = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_jose[13]);
  
      
settype($qtd_estoque, "float");    
   settype($preco_medio, "float");      
    settype($total_por_item, "float");       
      
$total_por_item = $qtd_estoque * $preco_medio;      
      
 /*  $total_por_item = $emapData1_sao_jose[4] * $emapData1_sao_jose[7];*/
    $query_inserir_estoque_sao_jose = "INSERT into estoque_sao_jose (
    
   descr_estoque,
    cod_produto,
    descr_produto,
    situacao,
    qtd_estoque,
    estoque_min,
    estoque_max,
    preco_medio,
   valor_total_por_item
   
    
    ) 
    
   values (
 '$nome_estoque',
    '$cod_produto',
    '$descricao_produto',
    '$situacao',
    '$qtd_estoque',
    '$estoque_min',
    '$estoque_max', 
    '$preco_medio',
    '$total_por_item '
    
    
    
    
    
    )";
    $query2_sao_jose = $conexao->prepare( $query_inserir_estoque_sao_jose );
    $query2_sao_jose->execute();
      
     
  }
  fclose( $file1_sao_jose );
 

/*********** INSERIR ESTOQUE SÃO PAULO*********/
  $filename_sao_paulo = "https://megamidiagroup.com.br/csv_jose_carlos/estoque_sao_paulo.csv";
  $file1_sao_paulo = fopen( $filename_sao_paulo, "r" );
  while ( ( $emapData1_sao_paulo = fgetcsv( $file1_sao_paulo, 10000, ";" ) ) !== FALSE ) {
   
      $nome_estoque = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_paulo[2]);
$cod_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_paulo[3]);
$descricao_produto = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_paulo[4]);
$qtd_estoque = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_paulo[5]);
$estoque_min = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_paulo[6]);
$estoque_max = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_paulo[7]);
$situacao = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_paulo[10]);
$preco_medio = iconv("ISO-8859-1", "UTF-8", $emapData1_sao_paulo[13]);
  
settype($qtd_estoque, "float");    
   settype($preco_medio, "float");      
    settype($total_por_item, "float");       
      
      
      $total_por_item = $qtd_estoque * $preco_medio;   
     /* $total_por_item = $emapData1_sao_paulo[4] * $emapData1_sao_paulo[7];*/
    $query_inserir_estoque_sao_paulo = "INSERT into estoque_sao_paulo (
    
    descr_estoque,
    cod_produto,
    descr_produto,
    situacao,
    qtd_estoque,
    estoque_min,
    estoque_max,
    preco_medio,
    valor_total_por_item
  
    
    ) 
    
     values (
   '$nome_estoque',
    '$cod_produto',
    '$descricao_produto',
    '$situacao',
    '$qtd_estoque',
    '$estoque_min',
    '$estoque_max', 
    '$preco_medio',
     '$total_por_item '
   
    
    
    
    
    
    )";
    $query2_sao_paulo = $conexao->prepare( $query_inserir_estoque_sao_paulo);
    $query2_sao_paulo->execute();
      
      
  }
  fclose( $file1_sao_paulo );
 
  

}



?>
