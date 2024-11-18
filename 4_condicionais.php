<?php

// Verificar os dados do formulario 
// Utilizando o metodo POST

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $senha = $_POST['senha'];

    if($senha === '12345'){
        // redireciona para a pagina de 'boas vindas'
        header("Location:4b_bem_vindo.php");
        exit();
    }
}else{
    $erro = "senha ta errada man👍";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página de Login</title>
</head>
<body>
    <h2>Digite a senha para continuar:</h2>
    <form method="post" action="">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
        <button type="submit">Entrar</button>
    </form>

    <?php

    // Exibe a mensagem de erro
    if(isset($erro)){
        echo "<p style='color: red;'>$erro</p>";
    }

    ?>
</body>
</html>


