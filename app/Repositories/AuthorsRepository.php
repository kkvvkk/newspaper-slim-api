<?php 

namespace Newspaper\Repositories;

use Newspaper\Data\Authors\Author;
use Newspaper\Data\Authors\AuthorsGatewayInterface;
use Newspaper\Data\ConverterInterface;

class AuthorsRepository
{
    private $authorsGateway;
    private $converter;

    public function __construct(AuthorsGatewayInterface $authorsGateway, ConverterInterface $converter)
    {
        $this->authorsGateway = $authorsGateway;
        $this->converter = $converter;
    }

    /**
     * Get author by id.
     *
     * @param  int  $authorId
     * @return Author
     */
    public function getAuthorById(int $authorId) : ?Author
    {
        $authorFields = $this->authorsGateway->getAuthorById($authorId);
        if ($authorFields) {
            $author = $this->converter->convert($authorFields);
            return $author;
        } else {
            return null;
        }
    }

    /**
     * Get all Authors.
     *
     * @return array
     */
    public function getAuthors() 
    {
        $authorsArray = $this->authorsGateway->getAuthors();
        $authors = array();
        foreach($authorsArray as $author) {
            array_push($authors, $this->converter->convert($author));
        }
        return $authors;
    }
}