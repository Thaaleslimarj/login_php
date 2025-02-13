<?php  
$host = "localhost";  
$usuario = "root";  
$senha = "";     
$banco = "login_php";  

$conn = mysqli_connect($host, $usuario, $senha, $banco);  

if (!$conn) {  
    die("Conexão falhou");  
} 
?>