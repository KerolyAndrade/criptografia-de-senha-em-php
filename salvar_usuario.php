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
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Criptografar a senha
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

// Inserir os dados no banco de dados
$query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaCriptografada')";
$resultado = mysqli_query($conexao, $query);

if ($resultado) {
  echo "Usuário cadastrado com sucesso!";
} else {
  echo "Erro ao cadastrar o usuário: " . mysqli_error($conexao);
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>
