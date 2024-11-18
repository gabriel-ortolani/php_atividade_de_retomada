<!-- O programa armazena os usuários em um documento externo com a extensão .txt -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Informe o nome e a senha que deseja cadastrar</h2>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <button type="submit">Cadastrar</button>
    </form>
    <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        //abre o arquivo 'usuario.txt' para escrita
        // adiciona dados ao final do arquivo
        $arquivo = fopen('usuarios.txt', 'a');
        
        // cria uma linha e seha separados
        $linha = $nome . ';' . $senha . "\n";

        // escreve no arquivo
        fwrite($arquivo,$linha);

        // fecha o arquivo
        fclose($arquivo);

        echo "<p>Usuário Cadastrado com sucesso!</p>";
    }
    
    ?>
</body>
</html>
