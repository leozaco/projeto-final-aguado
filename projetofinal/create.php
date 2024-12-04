<?php
session_start();
require_once 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recebe os dados do formulário
    $id = $_POST["id"];
    $nome = $_POST["nome"];

    // Prepara a consulta SQL para inserir a música no banco
    $sql = "INSERT INTO musicas (id, nome) VALUES ('$id', '$nome')";

    // Executa a consulta e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Música adicionada com sucesso!";
        header("Location: index.php");
        exit(0);
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inserir Música</title>
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Adicionar Música
                <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
            </h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <!-- Campo para ID da música -->
                <div class="mb-3">
                    <label for="id">ID</label>
                    <input type="text" name="id" id="id" class="form-control" required>
                </div>
                
                <!-- Campo para o nome da música -->
                <div class="mb-3">
                    <label for="nome">Nome da Música</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>

                <!-- Botão de envio -->
                <div class="mb-3">
                    <button type="submit" name="salvar_musica" class="btn btn-primary">Salvar Música</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
