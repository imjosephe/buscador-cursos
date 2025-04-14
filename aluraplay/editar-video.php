<?php
    $pdo = new PDO('mysql:host=localhost;dbname=serenatto', 'root', 'Senhadificil123$');

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id === false || $id === null) {
        header('Location: /?sucesso=0');
        exit();
    }

    $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
    if ($url === false) {
        header('Location: /?sucesso=0');
        exit();
    }
    $titulo = filter_input(INPUT_POST, 'titulo');
    if ($titulo === false) {
        header('Location: /?sucesso=0');
        exit();
    }

    $video = new \Alura\Mvc\Entity\Video($url, $titulo);
    $video->setId($id);

    $repository = new \Alura\Mvc\Repository\VideoRepository($pdo);
    $repository->update($video);

    if ($statement->execute() === false) {
        header('Location: /?sucesso=0');
    } else {
        header('Location: /?sucesso=1');
    }