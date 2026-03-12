<?php
// O cabeçalho e configurações devem vir ANTES de qualquer HTML!
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');
?>
<html>
<head>
<title>Exemplo PHP com Docker</title>
</head>
<body>

<?php
echo 'Versão Atual do PHP: ' . phpversion() . '<br><br>';

// Boas práticas: Utilizar variáveis de ambiente em vez de credenciais hardcoded
$servername = getenv('DB_HOST') ?: "db";
$username = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASS') ?: "Senha123";
$database = getenv('DB_NAME') ?: "meubanco";

// Criar ligação
$link = new mysqli($servername, $username, $password, $database);

/* verificar ligação */
if (mysqli_connect_errno()) {
    printf("Falha na ligação: %s\n", mysqli_connect_error());
    exit();
}

$valor_rand1 =  rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname(); // Identifica qual container atendeu o pedido

$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valor_rand1' , '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2','$host_name')";

if ($link->query($query) === TRUE) {
  echo "Novo registo criado com sucesso pelo container: <strong>" . $host_name . "</strong>";
} else {
  echo "Erro: " . $link->error;
}

$link->close();
?>
</body>
</html>