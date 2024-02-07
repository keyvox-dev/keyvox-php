<?php

namespace KeyVox;

use AllowDynamicProperties;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleClient;

#[AllowDynamicProperties] class KeyVox {
    private string $apiKey;

    private string $baseURL;

    private bool $associative;

    public function __construct($apiKey, $options = [])
    {
        $this->apiKey = $apiKey;
        $this->baseURL = $options['base_url'] ?? 'https://keyvox.dev/api';
        $this->associative = $options['associative'] ?? true;

        $this->articles = new Article($this->baseURL, [$this, 'fetchData']);
        $this->tags = new Tag($this->baseURL, [$this, 'fetchData']);
        $this->authors = new Author($this->baseURL, [$this, 'fetchData']);
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getBaseURL(): string
    {
        return $this->baseURL;
    }

    /**
     * @throws GuzzleException
     */
    public function fetchData($url, $options)
    {
        $client = new GuzzleClient([
            'headers' => [
                'key' => $this->apiKey
            ]
        ]);

        $response = $client->request('GET', $url, [
            'query' => $options
        ]);

        $content = $response->getBody()->getContents();

        return json_decode($content, $this->associative);
    }
}