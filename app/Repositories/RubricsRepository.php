<?php 

namespace Newspaper\Repositories;

use Newspaper\Data\Rubrics\Rubric;
use Newspaper\Data\ConverterInterface;
use Newspaper\Data\Rubrics\RubricsGatewayInterface;

class RubricsRepository
{
    private $rubricsGateway;
    private $converter;

    public function __construct(RubricsGatewayInterface $rubricsGateway, ConverterInterface $converter)
    {
        $this->rubricsGateway = $rubricsGateway;
        $this->converter = $converter;
    }

    /**
     * Get rubric by id.
     *
     * @param  int  $rubricId
     * @return Rubric
     */
    public function getRubricById(int $rubricId) : ?Rubric
    {
        $rubric = $this->rubricsGateway->getById($rubricId);
        return $this->convertFieldsToRubric($rubric);
    }

    /**
     * Get head rubric by id.
     *
     * @param  int  $rubricId
     * @return Rubric
     */
    public function getHeadRubricById(int $rubricId) : ?Rubric
    {
        $rubric = $this->rubricsGateway->getHeadRubric($rubricId);
        return $this->convertFieldsToRubric($rubric);
    }

    /**
     * Convert array fields to Rubric object
     *
     * @param  array $rubricFields
     * @return Rubric
     */
    protected function convertFieldsToRubric($rubricFields) 
    {
        if($rubricFields != null) {
            $rubrics = $this->converter->convert($rubricFields);
            return $rubrics;
        } else {
            return null;
        }
    }
}