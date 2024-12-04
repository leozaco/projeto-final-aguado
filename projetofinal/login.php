<?php
session_start();
require_once 'db_conn.php';  // Conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do formulário de login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara e executa a consulta para verificar o usuário no banco de dados
    $sql = "SELECT * FROM usuarios WHERE nome = ? AND senha = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se o usuário existe
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Salva o id do usuário e tipo (admin ou não) na sessão
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_type'] = $user['role']; // role pode ser 'admin' ou 'user'

            // Redireciona para a página principal
            header("Location: index.php");
            exit();
        } else {
            echo "Usuário ou senha inválidos!";
        }
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }

    $conn->close();
}
?>
