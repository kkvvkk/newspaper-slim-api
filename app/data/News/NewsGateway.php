<?php

namespace Newspaper\Data\News;

use Newspaper\PDOConnection\PDOConnectorInterface;

class NewsGateway implements NewsGatewayInterface
{
    private $connection;

    public function __construct(PDOConnectorInterface $connector)
    {
        $this->connection = $connector->getConnection();
    }

    /**
     * Query to database
     *
     * @param string $query
     * @param array $parameters query parameters
     * @return array
     */
    private function assocQuery(string $query, array $parameters)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->execute($parameters);
        $result = $stmt->fetchAll();
        return $result;
    }    

    /**
     * Get news fields array from database by id.
     *
     * @param int $newsId
     * @return array
     */
    public function getById(int $newsId)
    {
        $query = "SELECT * FROM news WHERE id = :id";
        $parametersArray = array(':id' => $newsId);
        return $this->assocQuery($query, $parametersArray);
    }

    /**
     * Get news fields array from database by rubric id.
     *
     * @param int $rubricId
     * @return array
     */
    public function getByRubric(int $rubricId)
    {
        $query = "SELECT * FROM news WHERE rubric_id = :id";
        $parametersArray = array(':id' => $rubricId);
        return $this->assocQuery($query, $parametersArray);
    }

    /**
     * Get news fields array from database by author id.
     *
     * @param int $authorId
     * @return array
     */
    public function getByAuthor(int $authorId)
    {
        $query = "SELECT * FROM news WHERE authorId = :id";
        $parametersArray = array(':id' => $authorId);
        return $this->assocQuery($query, $parametersArray);
    }
}
