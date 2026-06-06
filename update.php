<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE tarefas SET status = 1 WHERE id = $id";
    $conn->query($sql);
}

header("Location: index.php");
?>