<?php

$builder = new \DI\ContainerBuilder();
$builder->addDefinitions([
    PDO::class => function (): PDO {
        $dbPath = __DIR__ . '/../banco.sqlite';
        return new PDO('mysql:host=localhost;dbname=serenatto', 'root', 'Senhadificil123$');
    },
    \League\Plates\Engine::class => function () {
        $templatePath = __DIR__ . '/../views';
        return new League\Plates\Engine($templatePath);
    }
]);

/** @var \Psr\Container\ContainerInterface $container */
$container = $builder->build();

return $container;
