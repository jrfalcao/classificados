<?php include_once 'config.php'; ?>
<html>
    <head>
        <title>Classificados</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">Classificados</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['login']) && !empty($_SESSION['login'])): ?>
                        <li><a href="meus-anuncios.php">Meus Anuncios</a></li>
                        <li><a href="sair.php">Sair</a></li>
                    <?php else: ?>
                        <li><a href="cadastro.php">Cadastre-se</a></li>
                        <li>
                            <a href="#" id="a_login">Login</a>
                            <div class="login">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="Seu Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-default btn-xs" id="btn_login">Logar</button>
                                <div id="LoadingImage" style="display: none">
                                    <img src="assets/images/circle-loading-animation.gif" alt="" width="40"/>
                                </div>
                                <span class="aviso_login">Erro ao logar!</span>
                            </div>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>            
        </nav>

