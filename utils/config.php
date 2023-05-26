<?php 
  $hostname = 'localhost';
  $bancodedados = 'prova';
  $usuario = 'root';
  $senha = '';

  // Conexão com o banco de dados 

  $myqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
  
  //mensagem para teste ou não, opcional

  // if ($myqli->connect_errno) {
  //   echo 'Falha ao conectar: (' . $myqli->connect_errno . ')' . $mysqli->connect_error;
  // } else
  // echo 'Conectado!';
?>