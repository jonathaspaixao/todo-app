<?php
include 'conexao.php';

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO tarefas (nome) VALUES ('$nome')";
    $conn->query($sql);
}

header("Location: index.php");
?>