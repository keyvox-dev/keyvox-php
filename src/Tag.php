<?php

namespace KeyVox;

class Tag implements FetchDataInterface {

    private string $baseURL;

    private array $fetchDataMethod;

    public function __construct($baseURL, $fetchDataMethod)
    {
        $this->baseURL = $baseURL;
        $this->fetchDataMethod = $fetchDataMethod;
    }

    public function list($options = [])
    {
        $url = "{$this->baseURL}/tags";
        return call_user_func($this->fetchDataMethod, $url, $options);
    }

    public function retrieve($id_or_slug, $options = [])
    {
        $url = "{$this->baseURL}/tags/{$id_or_slug}";
        return call_user_func($this->fetchDataMethod, $url, $options);
    }
}