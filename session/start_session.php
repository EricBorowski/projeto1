<?php 

  session_start();
    $_SESSION['id_usuario'] = $email;
   if(isset($_SESSION['id_usuario'])){ 
      header("location: ../paginas/perfil.php"); 
   }    //var_dump($_SESSION['id_usuario']);