<?php

namespace KeyVox;

class KeyVox {
    private string $apiKey;

    private string $baseURL;

    public function __construct($apiKey, $options = [])
    {
        $this->apiKey = $apiKey;
        $this->baseURL = $options['base_url'] ?? 'https://keyvox.dev/api';
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getBaseURL(): string
    {
        return $this->baseURL;
    }
}