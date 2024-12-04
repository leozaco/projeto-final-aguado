<?php
session_start();
require 'db_conn.php';


if (!isset($_GET['id'])) {
    echo "ID não fornecido.";
    exit;
}

$id = $_GET['id'];


$query = "DELETE FROM musicas WHERE id = '$id'";
if (mysqli_query($conn, $query)) {
    header("Location: index.php");
    exit(0);
} else {
    echo "Erro ao excluir musica: " . mysqli_error($conn);
}
?>