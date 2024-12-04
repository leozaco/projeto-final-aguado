<?php
session_start();
require_once 'db_conn.php';

// Verifica se a música a ser editada foi informada via GET
if (isset($_GET['id'])) {
    $_SESSION['id_veio'] = $_GET['id'];
    $id = $_GET['id'];

    // Consulta para obter o nome da música com base no ID
    $query = "SELECT nome FROM musicas WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($nome);
        $stmt->fetch();
        $stmt->close();
    } else {
        echo "Erro ao buscar a música: " . $conn->error;
    }
}

// Processamento do formulário de atualização
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recebe os dados do formulário
    $id = isset($_POST["id"]) ? $_POST["id"] : '';
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
    $id_veio = isset($_SESSION['id_veio']) ? $_SESSION['id_veio'] : '';

    // Verifica se todos os campos necessários foram preenchidos
    if (isset($id) && isset($nome) && isset($id_veio)) {
        // Prepara a consulta para atualizar a música
        $sql = "UPDATE musicas SET id = ?, nome = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $id, $nome, $id_veio);

            // Executa a consulta de atualização
            if ($stmt->execute()) {
                $_SESSION['message'] = "Música atualizada com sucesso!";
                header("Location: index.php");
                exit(0);
            } else {
                echo "Erro ao atualizar: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conn->error;
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Atualizar Música</title>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Atualizar Música
                <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
            </h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="id">ID</label>
                    <input type="text" name="id" id="id" value="<?= isset($id) ? htmlspecialchars($id) : ''; ?>" class="form-control" required readonly>
                </div>
                <div class="mb-3">
                    <label for="nome">Nome da Música</label>
                    <input type="text" name="nome" id="nome" value="<?= isset($nome) ? htmlspecialchars($nome) : ''; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" name="atualizar_musica" class="btn btn-primary">Atualizar Música</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
