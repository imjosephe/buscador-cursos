<?php    
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=serenatto', 'root', 'Senhadificil123$');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if ($url === false) {
            header('Location: /index.php?sucesso=0');
            exit();
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if ($titulo === false) {
            header('Location: /index.php?sucesso=0');
            exit();
        }
        
        $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_POST['url']);
        $statement->bindValue(2, $_POST['titulo']);

        if ($statement->execute() === false) {
            header('Location: /index.php?sucesso=0');
        } else {
            header('Location: /index.php?sucesso=1');
        };

        
    } catch (\Throwable $err) {
        echo "Erro " . $err->getMessage();
    }