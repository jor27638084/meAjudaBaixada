<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "usbw";
    $db = "meajudabaixada";
    $conexao = new mysqli($servidor, $usuario, $senha, $db);
    if(!$conexao) {     
            echo "Erro de conexão! {$conexao->error}";      
    }
    /********************** CATEGORIA *****************************/
    function CadastrarCategoria($nome){
        $sql = 'INSERT INTO tb_categoria VALUES("'.$nome.'")';
        $executa = $GLOBALS['conexao']->query($sql);
        if($executa){
            echo "Categoria cadastrada com sucesso!";
        }else{
            echo "Ocorreu um erro ao cadastrar Categoria";
        }
    }
    function ListarCategoria($cd_categoria){
        $sql = 'SELECT * FROM tb_categoria';
        if($cd_categoria > 0){
            $sql.= ' WHERE cd_categoria ='.$cd_categoria;
        }
        $resultado = $GLOBALS['conexao']->query($sql);
        return $resultado;
    }
    function ExcluirCategoria($cd_categoria){
        $sql = 'DELETE FROM tb_categoria WHERE cd_categoria='.$cd_categoria;
        $executa = $GLOBALS['conexao']->query($sql);
        if($executa){
            echo "Categoria excluída com sucesso!";
        }else{
            echo "Ocorreu um erro ao excluir Categoria";
        }
    }
    function AtualizarCategoria($cd_categoria, $nm_categoria){
        $sql = 'UPDATE tb_categoria SET nm_categoria="'.$nm_categoria.'" WHERE cd_categoria='.$cd_categoria;
        $executa = $GLOBALS['conexao']->query($sql);
        if($executa){
            echo "Categoria atualizada com sucesso!";
        }else{
            echo "Ocorreu um erro ao atualizar Categoria";
        }
    }



    /************************************************PEDIDO*********************************************************/

    function ListarPedido($cd_pedido, $id_solicitante){
        $sql = 'SELECT * FROM tb_pedido';
        if($cd_pedido > 0){
            $sql = 'WHERE cd_pedido =' .$cd_pedido;
        }elseif ($id_solicitante > 0) {
            $sql = 'WHERE id_solicitante =' .$id_solicitante;
        }
        $resultado = $GLOBALS['conexao']->query($sql);
        return $resultado;
    }

    
?>