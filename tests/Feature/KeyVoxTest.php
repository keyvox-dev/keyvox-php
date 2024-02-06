<?php

use Dotenv\Dotenv;
use KeyVox\KeyVox;

$dotenv = Dotenv::createImmutable(__DIR__ . '\..\..');
$dotenv->load();

$kv = new KeyVox(
    $_ENV['API_KEY'],
    [
        'base_url' => $_ENV['BASE_URL']
    ]
);

test('class is loaded and initialized', function () use ($kv) {
    expect($kv->getApiKey())->toBeString();
    expect($kv->getBaseURL())->toBeString();
});

test('articles.list()', function () use ($kv) {

});

