<?php 

namespace Newspaper\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Newspaper\Data\Authors\Author;
use Newspaper\Repositories\AuthorsRepository;
use Newspaper\Resources\AuthorResource;

class AuthorsController 
{
    private $authorsRepository;

    public function __construct(AuthorsRepository $authorsRepository)
    {
        $this->authorsRepository = $authorsRepository;
    }

    /**
     * Processing a request to get all authors
     *
     * @param Response $response 
     * @return Response $response 
     * @return Content-Type application/json
     */
    public function getAuthors(Response $response)
    {
        $this->response = $response;
        $authors = $this->authorsRepository->getAuthors();
        return $this->makeAnswer($authors);
    }

    /**
     * Processing a request to get a author by id
     *
     * @param Response $response 
     * @param  int  $id
     * @return Response $response 
     * @return Content-Type application/json
     */
    public function getAuthorById(Response $response, int $id)
    {
        $this->response = $response;
        $author = $this->authorsRepository->getAuthorById($id);
        return $this->makeAnswer($author);
    }

    /**
     * Create a json response
     *
     * @param  Author|array  $author
     * @return Response $response 
     * @return Content-Type application/json
     */
    private function makeAnswer($author)
    {   
        $author = $this->convert($author);
        $answer = json_encode($author);
        $this->response->getBody()->write($answer);
        return $this->response->withHeader('Content-Type', 'application/json');
    }

    /**
     * Converting data from a database
     *
     * @param  Author|array  $author
     * @return AuthorResource|array $authorResource 
     */
    private function convert($author)
    {
        if ($author != null) {
            if (is_array($author)) {
                $authorResource = array();
                foreach ($author as $a) {
                    array_push($authorResource, new AuthorResource($a));
                }
            } else {
                $authorResource = new AuthorResource($author);
            }
            
        }
        return $authorResource;
    }

}    