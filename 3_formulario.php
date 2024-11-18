<!-- USANDO O MÉTODO POST -->
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de formulário de Cadastro</title>
 </head>
 <body>
    <!-- método pode ser POST ou GET -->
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" require><br>

        <label for="email">Emial:</label>
        <input type="email" name="email" require><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" require><br>
        <button type="submit">Enviar</button>    
    </form>
    

    <!-- PHP -->
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Recebe os valores enviados pelos formularios
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            // exibir valores recebidos
            echo "<h2>Dados recebidos:</h2>";
            echo "Nome: $nome <br>";
            echo "emial: $email <br>";
            echo "telefone: $telefone <br>";
        }
    ?>
 </body>
 </html>
 