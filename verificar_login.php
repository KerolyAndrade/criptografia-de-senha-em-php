<?php
// Conectar ao banco de dados
$host = "localhost";
$usuario = "seu_usuario";
$senha = "sua_senha";
$banco = "seu_banco";
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verificar a conexão
if (mysqli_connect_errno()) {
  die("Falha ao conectar ao banco de dados: " . mysqli_connect_error());
}

// Receber os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Buscar o usuário no banco de dados
$query = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conexao, $query);
$usuario = mysqli_fetch_assoc($resultado);

if ($usuario) {
  // Verificar a senha
  if (password_verify($senha, $usuario['senha'])) {
    echo "Login realizado com sucesso!";
  } else {
    echo "Senha incorreta!";
  }
} else {
  echo "Usuário não encontrado!";
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>
