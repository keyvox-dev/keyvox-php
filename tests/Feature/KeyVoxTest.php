<?php

use Dotenv\Dotenv;
use KeyVox\KeyVox;

$dotenv = Dotenv::createImmutable(__DIR__ . '\..\..');
$dotenv->load();

$kv = new KeyVox(
    $_ENV['API_KEY'],
    [
        'base_url' => $_ENV['BASE_URL'],
    ]
);

test('class is loaded and initialized', function () use ($kv) {
    expect($kv->getApiKey())->toBeString();
    expect($kv->getBaseURL())->toBeString();
})->skip();

test('articles.list', function () use ($kv) {
    $articles = $kv->articles->list(
        [
            'page' => 1,
            'items_per_page' => 2
        ]
    );
    expect($articles)->toHaveKey('data');
})->skip();

test('articles.retrieve', function () use ($kv) {
    $articleId = $_ENV['ARTICLE_ID'];
    $article = $kv->articles->retrieve($articleId);
    expect($article)->toHaveKey('data');
});

