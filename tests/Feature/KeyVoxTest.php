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
});

test('articles.list', function () use ($kv) {
    $articles = $kv->articles->list(
        [
            'page' => 1,
            'items_per_page' => 2
        ]
    );
    expect($articles)->toHaveKey('data');
});

test('articles.retrieve', function () use ($kv) {
    $articleId = $_ENV['ARTICLE_ID'];
    $article = $kv->articles->retrieve($articleId);
    expect($article)->toHaveKey('data');
});

test('tags.list', function () use ($kv) {
    $tags = $kv->tags->list();
    expect($tags)->toHaveKey('data');
});

test('tags.retrieve.id', function () use ($kv) {
    $id = $_ENV['TAG_ID'];
    $tag = $kv->tags->retrieve($id);
    expect($tag)->toHaveKey('data');
});

test('tags.retrieve.slug', function () use ($kv) {
    $slug = $_ENV['TAG_SLUG'];
    $tag = $kv->tags->retrieve($slug);
    expect($tag)->toHaveKey('data');
});

test('authors.list', function () use ($kv) {
    $authors = $kv->authors->list();
    expect($authors)->toHaveKey('data');
});

test('authors.retrieve.id', function () use ($kv) {
    $id = $_ENV['AUTHOR_ID'];
    $author = $kv->authors->retrieve($id);
    expect($author)->toHaveKey('data');
});

test('authors.retrieve.slug', function () use ($kv) {
    $slug = $_ENV['AUTHOR_SLUG'];
    $author = $kv->authors->retrieve($slug);
    expect($author)->toHaveKey('data');
});
