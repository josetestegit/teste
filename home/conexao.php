<?php

function funcao_conectar() {
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

    $pdo=null;
};

?>