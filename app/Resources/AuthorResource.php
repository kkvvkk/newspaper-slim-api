<?php 

namespace Newspaper\Resources;

use Newspaper\Data\Authors\Author;

class AuthorResource
{
    public $firstName;
    public $lastName;

    public function __construct(Author $author)
    {
        $this->firstName = $author->firstName;
        $this->lastName = $author->lastName;
    }

}