<?php
    $pdo = new PDO('mysql:host=localhost;dbname=serenatto', 'root', 'Senhadificil123$');
    $id = $_GET['id'];

    $repository = new \Alura\Mvc\Repository\VideoRepository($pdo);
    $repository->remove($id);

    if ($statement->execute() === false) {
        header('Location: /?sucesso=0');
    } else {
        header('Location: /?sucesso=1');
    }