<?php

namespace KeyVox;

interface FetchDataInterface
{
    public function list();

    public function retrieve($id_or_slug);
}