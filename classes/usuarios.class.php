<?php

/**
 * Manipulation class of users
 *
 * @author Junior Falcao
 */
class usuarios {
    public function cadastrar($nome,$email, $senha, $telefone){
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() == 0){
            $sql = $pdo->prepare("INSERT INTO usuarios SET nome=:nome, senha=:senha, email=:email, telefone=:telefone");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->bindValue(':telefone', $telefone);
            $sql->execute();
            return true;
        }else{
            return FALSE;
        }  
    }
    
    public function logar($email, $senha) {
        global $pdo;
        $array = [];
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', md5($senha));
        $sql->execute();
            
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            return $array;
        }
    }
}
