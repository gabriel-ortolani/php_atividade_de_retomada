<!-- O programa exibe os dados recebidos em lista no formato de tabela -->
 <?php
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
?>