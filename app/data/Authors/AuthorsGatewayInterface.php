<?php

namespace Newspaper\Data\Authors;

interface AuthorsGatewayInterface
{
    public function getAuthors();
    public function getAuthorById(int $id);
}