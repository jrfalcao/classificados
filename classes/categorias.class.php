<?php
/**
 * Description of categorias
 *
 * @author jcfalcao
 */
class categorias {
    public function getCategorias() {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM categorias");
        $sql->execute();
        
        $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
}
