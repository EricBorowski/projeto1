<?php 
require_once "../src/model/Usuarios.php";
$u = new Usuarios();

require_once "../src/view/header.php";
require_once "../src/view/header_nav.php"; 
?>

    <main class="Corpo">
    <h2 class="titulo-acesso">:::Login:::</h2>
        <form method="post" action="../back/infologin.php">
            <div class="form-group">
                <label for="email" style="color: darkred;">Digite seu email</label>
                <input type="email" class="form-control" name="email" placeholder="exemplo@email.com" required class="cadastro"><br>
                <label for="pass" style="color: darkred;">Digite sua senha</label>
                <input type="password" class="form-control" name="pass" minlength="6" placeholder="senha" required class="cadastro">
                <br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck" style="color: darkred;">
                    Remember me
                    </label>
                </div><br>
                <input type="submit" class="btn btn-outline-success" value="Enviar dados" class="cadastro">
                <input type="reset" class="btn btn-outline-danger" value="Apagar dados" class="cadastro">
                <hr>
                    <a class="dropdown-item" href="../paginas/cadastro.php" style="color: darkred;">Novo, por aqui? Regitre-se.</a>
                    <a class="dropdown-item" href="#" style="color: darkred;">Esqueceu a senha?</a>
            </div>


        </form> 

    </main>

<?php require_once "../src/view/footer.php"?>