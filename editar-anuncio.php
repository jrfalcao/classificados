<?php
require_once 'pages/header.php';
if(empty($_SESSION['login'])){ 
    header("Location: /");
    exit;
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once 'classes/anuncios.class.php';
    require_once 'classes/categorias.class.php';
    $a = new Anuncios();
    $c = new categorias();
    $id = addslashes(filter_input(INPUT_GET, "id"));
    $categorias = $c->getCategorias();
    $anuncio = $a->getAnuncio($id);
}

if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    require_once 'classes/anuncios.class.php';
    $a = new Anuncios();
    $id = addslashes(filter_input(INPUT_GET, "id"));
    $titulo = addslashes(filter_input(INPUT_POST, 'titulo'));
    $categoria = addslashes(filter_input(INPUT_POST, 'categoria'));
    $valor = addslashes(filter_input(INPUT_POST, 'valor'));
    $descricao = addslashes(filter_input(INPUT_POST, 'descricao'));
    $estado = addslashes(filter_input(INPUT_POST, 'estado'));
    $a->editar($id, $titulo, $categoria, $valor, $descricao, $estado);
?>
    <div class="alert alert-success">
        Produto modificado com sucesso!
    </div>
<?php
}
?>

<div class="container">
    <h1>Meus Anúncios - Editar Anúncio</h1>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php foreach($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>" 
                    <?php if($categoria['id'] === $anuncio['id_categoria']) echo ' selected="selected" '; ?> >  
                    <?= utf8_encode($categoria['nome']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" value="<?= $anuncio['titulo']?>" id="titulo" class="form-control">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" value="<?= $anuncio['valor']?>" id="valor" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" class="form-control"><?= $anuncio['descricao']?></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado" class="form-control">
                <option <?= ($anuncio['estado'] === '0')? ' selected ': ' ' ?> value="0">Ruím</option>
                <option <?= ($anuncio['estado'] === '1')? ' selected ': ' ' ?> value="1">Bom</option>
                <option <?= ($anuncio['estado'] === '2')? ' selected ': ' ' ?> value="2">Excelente</option>
            </select>
        </div>
        <input type="submit" value="Editar" class="btn btn-default">
    </form>
</div>

<?php require_once 'pages/footer.php';?>
