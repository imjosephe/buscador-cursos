<?php
    $pdo = new PDO('mysql:host=localhost;dbname=serenatto', 'root', 'Senhadificil123$');
    $repository = new \Alura\Mvc\Repository\VideoRepository($pdo);
    $videoList = $repository->all();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php require_once 'inicio-html.php'; ?>
    <ul class="videos__container" alt="videos alura">
    <?php foreach ($videoList as $video): ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?= $video['url']; ?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="descricao-video">
                <h3><?= $video['title']; ?></h3>
                <div class="acoes-video">
                    <a href="/editar-video?id=<?= $video['id']; ?>">Editar</a>
                    <a href="/remover-video?id=<?= $video['id']; ?>">Excluir</a>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
<?php require_once 'fim-html.php'; ?>