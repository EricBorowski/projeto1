<?php

require_once "../src/model/Usuarios.php";

$u = new Usuarios();

?>

<?php require_once "../src/view/header.php" ?>
<?php require_once "../src/view/header_nav.php" ?>


    <main class="Corpo">
    <h2 class="titulo-acesso">:::Cadastro:::</h2>
    <form method="POST" action="../back/infocadastro.php">
        <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Digite seu email" maxlength="40" required><br>
        <input type="text" class="form-control" name="nome" placeholder="Nome de usuario" maxlength="30" required><br>
        <input type="password" class="form-control" name="pass" minlength="6" maxlength="15" placeholder="Crie sua senha" required><br>
        <input type="password" class="form-control" name="confpass" minlength="6" maxlength="15" placeholder="Confirme senha" required>
        <br><br>
        <input type="submit" class="btn btn-outline-success" value="Enviar dados">
        <input type="reset" class="btn btn-outline-danger" value="Apagar dados">
        <br>
        </div>
    </form>
    </main>
<?php require_once "../src/view/footer.php"?>