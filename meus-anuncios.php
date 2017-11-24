<?php require_once 'pages/header.php';

if(empty($_SESSION['login'])){ 
    header("Location: /");
    exit;
}
?>
<div class="container">
    <h1>Meus Anúncios</h1>
    
    <a href="add-anuncio.php" class="btn btn-default">Adicionar Anúncio</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Título</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php 
            require_once 'classes/anuncios.class.php';
            $a = new Anuncios();
            $anuncios = $a->getMeusAnuncios();
        ?>
        <?php foreach($anuncios as $anuncio): ?>
        <tr>
            <td>
                <?php if(empty($anuncio['foto'])): ?>
                    <img src="./assets/images/default.png" height="50" border="0">
                <?php else: ?>
                    <img src="./assets/images/<?=$anuncio['foto']?>" height="50" border="0">
                <?php endif; ?>
            </td>
            <td><?= $anuncio['titulo'] ?></td>
            <td><?= number_format($anuncio['valor'], 2) ?></td>
            <td>
                <a href="editar-anuncio.php?id=<?=$anuncio['id']?>" class="btn btn-default">Editar</a>
                <a href="excluir-anuncio.php?id=<?=$anuncio['id']?>" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require_once 'pages/footer.php';?>
