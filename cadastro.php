<?php include 'pages/header.php'; ?>
<?php include 'classes/usuarios.class.php'; ?>

<div class="container">
    
    <h1>Cadastre-se</h1>
    <?php
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = md5($_POST['senha']);
        $telefone = addslashes($_POST['telefone']);
        $u = new usuarios($pdo);
        if(!empty($_POST['email']) && !empty($_POST['senha'])){
            if($u->cadastrar($nome,$email, $senha, $telefone)){
                ?>
                <div class="alert alert-success">
                    <strong>Parabéns</strong> cadastro efetuado com sucesso <a href="login.php" class="alert-link">
                    faça login aqui!</a>
                </div>
                <?php
            }else{
                ?>
                <div class="alert alert-success">
                    Email já cadastrado <a href="login.php" class="alert-link">
                    faça login aqui!</a>
                </div>
                <?php
            }
        }else{
            ?>
            <div class="alert alert-warning">
                Preencha Todos os Campos
            </div>
            <?php
        }
    }
    ?>
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone: </label>
            <input type="text" name="telefone" id="telefone" class="form-control" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar!">
    </form>
</div>

<?php include 'pages/footer.php'; ?>

