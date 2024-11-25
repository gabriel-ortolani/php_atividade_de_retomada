# Básico sobre PHP
* 1:
  Na atividade número1 mostra como efetuar um hello word.
* 2:
  Na atividade número2 mostra como criar e efetuar operações matematicas com variáveis.
* 3:
  Na atividade número3 mostra como pegar as informações colocadas no site pelo usuario como nesse mesmo exemplo desenvolvemos um formulario e com axulio do metodo "_POST" e colocarmos em variáveis para utilizarmos no proprio site ou em um banco de dados
* 4:
  Na atividade número4 mostra como usar condicionais como o if e o else, nesse exemplo fisemos uma pagina onde o usuario deve colocar uma senha pre-determinador para logar
  ```PHP
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $senha = $_POST['senha'];

    if($senha === '1234567'){
        //redireciona para a pagina de 'boas vindas'
        header("Location:4b_bem_vindo.php");
        
        exit();
    }else{
        
        // mensagem de erro
        $erro = "Senha incorreta. Tente novamente!";
    }
  }
  ```
* 5:
  Na atividade número5 ira cadastrar um usuario e uma senha para o mesmo em um arquivo .txt(caso ele não exista sera criado automaticamento)<br>
  ```PHP
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
  ```
* 6:
  Na atividade número6 com o codastro efetuado na atividade anterior será possivel logar nesta pagina usando os dados cadastrados no arquivo .txt
   ```PHP
   // Verificar se o formulario foi enviado
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Recebe os valores enviados pelo formulario
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        // Abre o arquivo usuarios.txt para leitura
        $arquivo = fopen('usuarios.txt','r');
        $login_sucesso = false;

        // lê cada linha do arquivo
        while(($linha = fgets($arquivo)) !== false){
            // divide a linha pelo delimitador ";"
            list($usuario_arquivo, $senha_arquivo) = explode(';', trim($linha));

            // Verifica se o nome e a senha correspondem aos valores no arquivo
            if($nome == $usuario_arquivo && $senha == $senha_arquivo){
                $login_sucesso = true;
                break;
            }
        }

        // Fecha o arquivo
        fclose($arquivo);

        // Exibe a mensagem de sucesso ou erro
        if($login_sucesso){
            echo "<h3>Login realizado com sucesso! Bem-vindo, $nome!</h3>";
        }else{
            echo "<h3 style='color: red;'>Usúario ou senha incorretos.</h3>";
        }
  }
* 7:
  Na atividade número7 foi criador apenas uma variável com os nomes preços e informações dos produtos e depois os exíbindo
  ```PHP
  // Array associativo contendo informações de produtos
  $produtos = [
    ["nome" => "camiseta", "preco" => 50.00, "quantidade" => 10],
    ["nome" => "Calça Jeans", "preco" => 100.00, "quantidade" => 5],
    ["nome" => "Tênis", "preco" => 150.00, "quantidade" =>7],
    ["nome" => "Anão", "preco" => 45.50, "quantidade" => 20],
    ["nome" => "pokebola", "preco" => 200, "quantidade" =>999],
  ];
  // Exibe os produtos em formato de tabela
  echo "<table border='1'>";

    // Título da tabela
    echo "<tr><th>Nome</th><th>Preço</th><th>Quantidade</th></tr>";

    // para cada 'produto' do vetor 'produtos'
    foreach($produtos as $produto){
        echo "<tr>";
        echo "<td>" . $produto['nome'] . "</td>";
        echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
        echo "<td>" . $produto ['quantidade'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
  ```
* 8:
  Na atividade número8 foi feito um formulario que inpede a envio com informações que estão incorretas como por exemplo o emila que não pode ser enviado caso não possia '.com' no final
  ```PHP
        //Verifica se o formulario foi enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recebe os valores enviados pelo formulário 
            $nome = $_POST['nome'];
            $email = $_POST['email']; 
            $mensagem = $_POST['mensagem'];

            // Valida se os campos não estão vazios e o email é válido
            if (!empty($nome) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($mensagem)) { 
                echo "<p style='color: green; '>Feedback enviado com sucesso!</p>";
            } 
            else {
                echo "<p style='color: red; '>Por favor, preencha todos os campos corretamente.</p>";
            }
        }
  ```
* 9:
  Na atividade número9 estabelecemos a conexão com o banco de dados
  ```PHP
    //ALTERAR de acordo com o número da porta
    // verificar conexão com o XAMPP
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "exercicio";
    try {
        // Tenta criar uma conexão com o banco de dados
        // Confere se as informações estão corretas
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica se houve algum erro na conexão
        if ($conn->connect_error) {
            throw new Exception("Falha na conexão:" . $conn->connect_error);
        }

        echo "Conexão realizada com sucesso!";

    } catch (Exception $e) {
        // Exibe uma mensagem de erro amigável
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
  ```
* 10:
  Na atividade10 fizemos com que sejá possivel cadastrar usuarios e senhas no site e elas vão para o banco de dados
  ```PHP
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os valores enviados pelo formulário 
        $nome = $_POST['nome'];
        $email = $_POST['email']; 

        // Valida se os campos não estão vazios e o email é válido
        if (!empty($nome) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            echo "";
        } 
        else {
            echo "<p style='color: red; '>Por favor, preencha todos os campos corretamente.</p>";
        }
    }
    if(!empty($nome) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        // Verifica se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recebe os valores enviados pelo formulário
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            // Conecta ao banco de dados
            $servername = "localhost:3306";
            $username = "root";
            $password = "";
            $dbname = "exercicio";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }


            // Digitar PHP + SQL (1º Aqui)

            // Insere a registro no banco de dados
            // Insere na tabela clientes os seguintes valores
            $sql = "INSERT INTO clientes (nome, email) VALUES ('$nome', '$email')";

            // confere se a variável 'sql' esta correta
            if ($conn->query($sql) === TRUE) {

            //exibe a mensagem
            echo "<p style='color: green; '>Cliente cadastrado com sucesso!</p>";
            } else {

            // exibe a mensagem
            echo "<p style='color: red;' >Erro ao cadastrar: " .$conn->error. "</p>";

            }

            // Encerra a conexão
            $conn->close();

        }
    }
  ```
* 11:
  Na atividade número11 foi feito uma lista com os nomes, ids e etc dos usuarios cadastrados no exercicios anterior
  ```PHP
  // Conecta ao banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "exercicio";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verifica a conexão
  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }

  // Consulta os dados da tabela clientes
  $sql = "SELECT id, nome, email, telefone FROM clientes"; $result = $conn->query($sql);

  // Verifica se existem registros e os exibe em formato de tabela 
  if ($result->num_rows > 0) { 
    echo "<h2>Lista de clientes cadastrados</h2>";

    // define formato da tabela 
    echo "<table border='2'>";

        // define cabeçalho da tabela 
        echo "<tr><th>Nome</th><th>Email</th><th>Telefone</th></tr>";

        // enquando tiver dados preenchidos no BD
        // listar e exibir em formato de tabela 
        while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['telefone']."</td>";
        echo "</tr>";
    }
    echo "</table>";
  } else {
  echo "Nenhum cliente encontrado.";
  }
  $conn->close();
  ```
* 12:
  Na atividade número12 é possivel atuzaliar as informações já cadastradas na atividade 10
  ```PHP
  // Conecta ao banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "exercicio";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verifica a conexão
  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }

  // Inicializa a variável $cliente como null
  $cliente = null;

  // Verifica se um ID foi passado via URL para edição
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id='$id'";
    $result = $conn->query($sql);

    // Verifica se encontrou um registro no banco de dados
    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        echo "Cliente não encontrado.";
        exit();
    }
  }
  // Verifica se o formulário foi enviado para atualizar o cliente 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sql = "UPDATE clientes SET nome='$nome', email='$email' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
    echo "<p>Cliente atualizado com sucesso!</p>";
    } else {
    echo "<p>Erro ao atualizar cliente: " . $conn->error. "</p>";
    }
     }
  ```
* 13:
  
* 14:
  
* 15:
  
