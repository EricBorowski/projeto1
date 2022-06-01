<?php
require_once "../config.php";

class Usuarios
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        //CASO HAJA ERRO SERÁ TRATADO NA MSG ERRO
        try
        {
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
         $msgErro = $e->getMessage();
        }
    }
    public function cadastrar($email, $nome, $senha)
    {
        global $pdo;
        //VERIFICAR SE HÁ EMAIL
        $sql = $pdo->prepare ("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql-> bindValue (":e", $email);
        $sql-> execute();
        $result = $sql->fetchAll(PDO::FETCH_CLASS); // Captura uma linha se o email conferir

//var_dump($result);

        if ($result)
        {
            return false; //JÁ ESTÁ CADASTRADO
        } else
        {
        //CASO NÃO, INICIE CADASTRO
        $sql = $pdo->prepare ("INSERT INTO usuarios (email, nome, senha) VALUES (:e, :n, :s)");
        $sql-> bindValue (":e",$email);
        $sql-> bindValue (":n",$nome);
        $sql-> bindValue (":s",md5 ($senha));
        $sql->execute();
        return true;
        }
    }
    public function logar($email, $senha)
    {
        global $pdo;
        //VERIFICAR EMAIL SENHA E SE ESTÃO CADASTRADO
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5 ($senha));
        $sql->execute();
        if ($sql->rowCount() > 0)
        {
        //ENTRAR NO SISTEMA
            $dado =$sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //LOGADO COM SUCESSO
    }
     else
    {
            return false;
    }
    }
}

?>