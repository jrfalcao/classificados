<?php
/**
 * Description of anuncios
 *
 * @author jcfalcao
 */
class Anuncios 
{
    public function getMeusAnuncios() {
        global $pdo;
        $sql = $pdo->prepare("SELECT *, "
            . "(select imagem_anuncio.url from imagem_anuncio where imagem_anuncio.id_anuncio = anuncios.id) as foto "
            . "FROM anuncios WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['login']);
        $sql->execute();
        
        $array = [];
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado) {
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO anuncios SET id_usuario = :id_usuario, id_categoria = :id_cat, "
            . "titulo = :titulo, valor = :valor, descricao = :descricao, estado = :estado");
        $sql->bindValue(":id_usuario", $_SESSION['login']);
        $sql->bindValue(":id_cat", $categoria);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":estado", $estado);
        $sql->execute();
    }
    
    public function getAnuncio($id) {
        global $pdo;
        $array = [];
        $sql = $pdo->prepare("SELECT * FROM anuncios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $array;
    }
    
    public function excluir($id) {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM imagem_anuncio WHERE id_anuncio = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        $sql = $pdo->prepare("DELETE FROM anuncios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
    public function editar($id, $titulo, $categoria, $valor, $descricao, $estado) {
        global $pdo;
        $sql = $pdo->prepare("UPDATE anuncios SET id_categoria = :id_cat, "
            . "titulo = :titulo, valor = :valor, descricao = :descricao, estado = :estado WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_cat", $categoria);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":estado", $estado);
        $sql->execute();
    }
}
