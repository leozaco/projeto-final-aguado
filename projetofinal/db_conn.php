<?php
$servername = "127.0.0.1";
$username = "eu";
$password = "ifsp";
$dbname = "arrebenta";
// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>