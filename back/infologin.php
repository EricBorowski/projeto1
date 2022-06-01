<?php
require_once "../src/view/header.php";
require_once "../src/view/header_nav.php";
require_once "../src/model/Usuarios.php";
require_once "../session/start_session.php";
$u = new Usuarios;


if (isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['pass']);
    if(!empty($email) && !empty($senha))
    {
        $u->conectar("mangaska", "localhost", "root", "");
        if($msgErro == "")
        {
            if ($u->logar($email,$senha))
            {
                header("location: ../paginas/perfil.php");
            }
            else
            {
                ?>
                <div class="msg-erro">
                  Email e/ou senha estão incorretos! 
                </div>
                <?php
                echo $redirect="<meta http-equiv='refresh' content='2; url=../paginas/login.php' />";
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
              <?php echo "Erro: ".$u->msgErro;?>
            </div>
            <?php        
        }
    }else
    {
        ?>
        <div class="msg-erro">
          Preencha todos os compos!
        </div>
        <?php
      
    }
}

require_once "../src/view/footer.php";

?>