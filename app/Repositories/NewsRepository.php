<?php 

namespace Newspaper\Repositories;

use Newspaper\Data\News\News;
use Newspaper\Data\News\NewsGatewayInterface;
use Newspaper\Data\ConverterInterface;

class NewsRepository
{
    private $newsGateway;
    private $converter;

    public function __construct(NewsGatewayInterface $newsGateway, ConverterInterface $converter)
    {
        $this->newsGateway = $newsGateway;
        $this->converter = $converter;
    }

    /**
     * Get news by id.
     *
     * @param  int  $id
     * @return News
     */
    public function getById(int $id)
    {
        $newsFields = $this->newsGateway->getById($id);
        return $this->convertFieldsToNews($newsFields); 
    }

    /**
     * Get news by rubric id.
     *
     * @param  int  $rubricId
     * @return News
     */
    public function getByRubric(int $rubricId)
    {
        $newsFields = $this->newsGateway->getByRubric($rubricId);
        return $this->convertFieldsToNews($newsFields); 
    }

    /**
     * Get news by author id.
     *
     * @param  int  $authorId
     * @return News
     */
    public function getByAuthor(int $authorId)
    {
        $newsFields = $this->newsGateway->getByAuthor($authorId);
        return $this->convertFieldsToNews($newsFields); 
    }

    /**
     * Convert array fields to News object
     *
     * @param  array $newsFields
     * @return News
     */
    protected function convertFieldsToNews($fieldsArray) 
    {
        if ($fieldsArray == null) {
            return null;
        }
        else {
            $news = $this->converter->convert($fieldsArray);
            return $news;
        }  
    }

}