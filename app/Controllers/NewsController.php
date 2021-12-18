<?php 

namespace Newspaper\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Newspaper\Data\News\News;
use Newspaper\Resources\NewsResource;
use Newspaper\Repositories\NewsRepository;
use Newspaper\Repositories\AuthorsRepository;
use Newspaper\Repositories\RubricsRepository;

class NewsController
{
    private $newsRepository;
    private $authorsRepository;
    private $rubricsRepository;

    public function __construct(NewsRepository $newsRepository, AuthorsRepository $authorsRepository, RubricsRepository $rubricsRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->authorsRepository = $authorsRepository;
        $this->rubricsRepository = $rubricsRepository;
    }

    /**
     * Processing a request to get a news by id
     *
     * @param Response $response 
     * @param  int  $id
     * @return Response $response 
     * @return Content-Type application/json
     */
    public function getById(Response $response, int $id) 
    {
        $this->response = $response;
        $news = $this->newsRepository->getById($id);
        return $this->makeAnswer($news[0]);
    }

    /**
     * Processing a request to get a news by rubric id
     *
     * @param Response $response 
     * @param  int  $rubricId
     * @return Response $response 
     * @return Content-Type application/json
     */
    public function getByRubric(Response $response , int $rubricId) 
    {
        $this->response = $response;
        $news = $this->newsRepository->getByRubric($rubricId);
        return $this->makeAnswer($news);
    }

    /**
     * Processing a request to get a news by author id
     *
     * @param Response $response 
     * @param  int  $authorId
     * @return Response $response 
     * @return Content-Type application/json
     */
    public function getByAuthor(Response $response, int $authorId) 
    {
        $this->response = $response;
        $news = $this->newsRepository->getByAuthor($authorId);
        return $this->makeAnswer($news);
    }

    /**
     * Create a json response
     *
     * @param  News|array $news
     * @return Response $response 
     * @return Content-Type application/json
     */
    private function makeAnswer($news)
    {
        $news = $this->convert($news);
        $answer = json_encode($news);
        $this->response->getBody()->write($answer);
        return $this->response->withHeader('Content-Type', 'application/json');
    }

    /**
     * Converting data from a database
     *
     * @param  News|array $news
     * @return NewsResource|array $newsResource 
     */
    private function convert($news)
    {
        if($news != null) {
            if (is_array($news)) {
                $newsResource = array();
                foreach ($news as $n) {
                    array_push($newsResource, new NewsResource($n, $this->authorsRepository, $this->rubricsRepository));
                }
            } else {
                $newsResource = new NewsResource($news, $this->authorsRepository, $this->rubricsRepository);
            }
            
        }
        return $newsResource;
    }

}    