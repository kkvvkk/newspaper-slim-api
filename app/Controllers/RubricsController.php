<?php 

namespace Newspaper\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Newspaper\Data\Rubrics\Rubric;
use Newspaper\Repositories\RubricsRepository;
use Newspaper\Resources\RubricResource;

class RubricsController
{
    private $rubricsRepository;

    public function __construct(RubricsRepository $rubricsRepository)
    {
        $this->rubricsRepository = $rubricsRepository;
    }

    /**
     * Processing a request to get a rubric by id
     *
     * @param Response $response 
     * @param  int  $id
     * @return Response $response 
     * @return Content-Type application/json
     */
    public function getRubricById(Response $response, int $id) 
    {
        $this->response = $response;
        $rubric = $this->rubricsRepository->getRubricById($id);
        return $this->makeAnswer($rubric);
    }

    /**
     * Processing a request to get a head rubric by id
     *
     * @param Response $response 
     * @param  int  $id
     * @return Response $response 
     * @return Content-Type application/json
     */
    public function getHeadRubricById(Response $response, int $id) 
    {
        $this->response = $response;
        $rubric = $this->rubricsRepository->getHeadRubricById($id);
        return $this->makeAnswer($rubric);
    }

    /**
     * Create a json response
     *
     * @param  Rubric  $rubric
     * @return Response $response 
     * @return Content-Type application/json
     */
    private function makeAnswer($rubric)
    {   
        $rubric = $this->convertRubric($rubric);
        $answer = json_encode($rubric);
        $this->response->getBody()->write($answer);
        return $this->response->withHeader('Content-Type', 'application/json');
    }

    /**
     * Converting data from a database
     *
     * @param  Rubric  $rubric
     * @return RubricResource $rubricResource 
     */
    private function convertRubric($rubric)
    {
        if($rubric != null) {
            $rubricResource = new RubricResource($this->rubricsRepository, $rubric);
        }
        return $rubricResource;
    }
}