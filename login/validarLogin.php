<?php 
// validarLogin.php 
session_start();  
include('conexao.php'); // Arquivo com a conexão ao banco de dados  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    $email = $_POST['email'];  
    $senha = $_POST['senha'];  

    // Consulta ao banco para verificar usuário  
    $sql = "SELECT * FROM Usuarios WHERE email='$email'";  
    $resultado = mysqli_query($conn, $sql);  
    $usuario = mysqli_fetch_assoc($resultado);  

    if ($usuario && password_verify($senha, $usuario['senha'])) {  
        $_SESSION['usuario_id'] = $usuario['id'];  
        $_SESSION['nivel_acesso'] = $usuario['nivel_acesso'];  
        header('Location: dashboard.php'); // Redireciona para a página inicial  
    } else {  
        echo "Usuário ou senha incorretos.";  
    }  
}  

// dashboard.php  
session_start();  
if (!isset($_SESSION['usuario_id'])) {  
    header('Location: login.php');  
    exit();  
}  

// Verifica o nível de acesso  
$is_admin = $_SESSION['nivel_acesso'] === 'admin';  

// Exibição de funcionários para consulta  
$sql = "SELECT * FROM Funcionarios";  
$resultado = mysqli_query($conn, $sql);  
while ($funcionario = mysqli_fetch_assoc($resultado)) {  
    echo $funcionario['nome'] . " - " . $funcionario['status'];  
}  

// Formulário de cadastro apenas para administradores  
if ($is_admin) {  
    // Formulário para cadastrar novo funcionário  
}  

?>