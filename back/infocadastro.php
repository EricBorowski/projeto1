<?php

require_once "../src/model/Usuarios.php";
$u = new Usuarios;

if (isset($_POST['nome']))
{
    $email = addslashes($_POST['email']);
    $nome = addslashes($_POST['nome']);
    $senha = addslashes($_POST['pass']);
    $confirmarsenha = addslashes($_POST['confpass']);
    if(!empty($email) && !empty($nome) && !empty($senha) && !empty($confirmarsenha))
    {
        $u->conectar("mangaska", "localhost", "root", "");
        if($msgErro == "")//ESTÁ TUDO OK
        {
            if ($senha == $confirmarsenha)
            {
               if ($u->cadastrar($email,$nome,$senha))
               {
                    echo "Bem-vindo a Mangáska!";
               } else
               {
                    echo "Email já cadastrado!";
               }
            }else
            {
                echo "Senhas não correspondem!";
            }
        }else
        {
            echo "Erro: " . $u->msgErro;
        }

    } else
    {
        echo "Preencha todos os campos!";
    }
}

?>