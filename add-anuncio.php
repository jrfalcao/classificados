<?php require_once 'pages/header.php';

if(empty($_SESSION['login'])){ 
    header("Location: /");
    exit;
}
require_once 'classes/categorias.class.php';
$c = new categorias();
$categorias = $c->getCategorias();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
    require_once 'classes/anuncios.class.php';
    $a = new Anuncios();
    $titulo = addslashes(filter_input(INPUT_POST, 'titulo'));
    $categoria = addslashes(filter_input(INPUT_POST, 'categoria'));
    $valor = addslashes(filter_input(INPUT_POST, 'valor'));
    $descricao = addslashes(filter_input(INPUT_POST, 'descricao'));
    $estado = addslashes(filter_input(INPUT_POST, 'estado'));
    $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
    ?>
    <div class="alert alert-success">
        Produto adicionado com sucesso!
    </div>
<?php
}
?>
<div class="container">
    <h1>Meus Anúncios - Adicionar Anúncio</h1>
    
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php foreach($categorias as $categoria): ?>
                <option value="<?= $categoria['id'] ?>"><?= utf8_encode($categoria['nome']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="0">Ruím</option>
                <option value="1">Bom</option>
                <option value="2">Excelente</option>
            </select>
        </div>
        <input type="submit" value="Adicionar" class="btn btn-default">
    </form>
</div>

<?php require_once 'pages/footer.php';?>