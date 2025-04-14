<?php    
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=serenatto', 'root', 'Senhadificil123$');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
        
        $repository = new \Alura\Mvc\Repository\VideoRepository($pdo);
        $repository->add(new \Alura\Mvc\Entity\Video($url, $titulo));

        if ($repository->add(new \Alura\Mvc\Entity\Video($url, $titulo)) === false) {
            header(header:'Location: /?sucesso=0');
        } else {
            header(header:'Location: /?sucesso=1');
        }

        
    } catch (\Throwable $err) {
        echo "Erro " . $err->getMessage();
    }