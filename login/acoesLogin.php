<?php

session_start();

require("../database/conexao.php");





function realizarLogin ($usuario, $senha, $conexao){
    
    $sql = "SELECT * FROM tbl_administrador WHERE usuario = '$usuario'";
    
    $resultado = mysqli_query($conexao, $sql);
    
    $dadosUsuario = mysqli_fetch_array($resultado);

    if(isset($dadosUsuario["usuario"]) && isset($dadosUsuario["senha"]) && password_verify($senha, $dadosUsuario['senha'])){

       
       echo "LOGADO";
       $_SESSION["usuarioId"] = $dadosUsuario["idAdministrador"];
       $_SESSION["nome"] = $dadosUsuario["nome"];

        header("location: ../listagem/index.php");

    }else{
        echo 'DEU ERRO OTARIO';
    }

}

switch ($_POST['acao']) {
    case 'login':
        
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        realizarLogin($usuario, $senha, $conexao);

        break;
    
    case 'logout':
        
       session_destroy();

       header("location: ../../produtos/index.php");

        break;
    
    default:
        # code...
        break;
}



