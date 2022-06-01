<?php
 require_once "../src/view/header.php";
require_once "../src/view/header_nav.php";
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
                    ?>
                    <div id="msg-sucesso">
                        <h3>Bem-vindo a Mangáska!</h3>
                    </div>
                    <?php
                    $redirect="<meta http-equiv='refresh' content='3; url=../paginas/perfil.php' />";
               } else
               {
                   ?>
                   <div class="msg-erro">
                        <h3>Email já cadastrado!</h3>
                   </div>
                    <?php
                    echo $redirect="<meta http-equiv='refresh' content='3; url=../paginas/login.php' />";
               }
            }else
            {
                ?>
                <div class="msg-erro">
                    <h3>Senhas não correspondem!</h3>
                </div>
                <?php
               echo $redirect="<meta http-equiv='refresh' content='3; url=../paginas/cadastro.php' />";
            }
        }else
        {
            ?>
            <div class="msg-erro">
             <?php echo "Erro: " . $u->msgErro;  ?> 
            </div>
            <?php
        }

    } else
    {
        ?>
        <div class="msg-erro">
          Preencha todos os campos!  
        </div>
        <?php
        echo $redirect="<meta http-equiv='refresh' content='3; url=../paginas/cadastro.php' />";
    }
}

require_once "../src/view/footer.php";
?>