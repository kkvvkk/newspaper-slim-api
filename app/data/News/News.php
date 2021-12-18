<?php

namespace Newspaper\Data\News;

class News
{
    public $id;
    public $title;
    public $anons;
    public $text;
    public $authorId;
    public $rubricId;
    public $createdAt;
    public $updatedAt;

    public function __construct($id, $title, $anons, $text, $authorId, $rubricId, $createdAt, $updatedAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->anons = $anons;
        $this->text = $text;
        $this->authorId = $authorId;
        $this->rubricId = $rubricId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}
