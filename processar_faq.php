<?php
// Configuração da base de dados
$host = "localhost";
$user = "root"; // Nome de utilizador do MySQL (por padrão, é "root" no XAMPP)
$pass = ""; // Senha do MySQL (por padrão, no XAMPP é vazio)
$dbname = "faq_db"; // Nome da base de dados

// Criar conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar os dados do formulário e evitar SQL Injection
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefone = $conn->real_escape_string($_POST['telefone']);
    $mensagem = $conn->real_escape_string($_POST['mensagem']);

    // Inserir os dados na base de dados
    $sql = "INSERT INTO perguntas (nome, email, telefone, mensagem) 
            VALUES ('$nome', '$email', '$telefone', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Mensagem enviada com sucesso!');
                window.location.href = 'index.html'; // Redireciona para a página inicial
              </script>";
    } else {
        echo "Erro ao enviar: " . $conn->error;
    }
}

// Fechar conexão
$conn->close();
?>
