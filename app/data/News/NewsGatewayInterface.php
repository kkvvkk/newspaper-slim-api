<?php

namespace Newspaper\Data\News;

interface NewsGatewayInterface
{
    public function getById(int $newsId);
    public function getByRubric(int $rubricId);
    public function getByAuthor(int $authorId);
}