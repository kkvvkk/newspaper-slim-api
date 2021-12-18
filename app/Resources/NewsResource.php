<?php 

namespace Newspaper\Resources;

use Newspaper\Data\News\News;
use Newspaper\Repositories\AuthorsRepository;
use Newspaper\Repositories\RubricsRepository;

class NewsResource
{
    public $title;
    public $anons;
    public $text;
    public $author;
    public $rubric;
    public $createdAt;
    public $updatedAt;

    public function __construct(News $news, AuthorsRepository $authorsRepository, RubricsRepository $rubricsRepository)
    {
        $author = $authorsRepository->getAuthorById($news->authorId);
        $rubric = $rubricsRepository->getRubricById($news->rubricId);

        $this->title = $news->title;
        $this->anons = $news->anons;
        $this->text = $news->text;
        $this->author = $author->firstName . " " . $author->lastName;
        $this->rubric = $rubric->name;
        $this->createdAt = $news->createdAt;
        $this->updatedAt = $news->updatedAt;

    }

}