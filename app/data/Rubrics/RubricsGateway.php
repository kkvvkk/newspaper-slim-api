<?php

namespace Newspaper\Data\Rubrics;

use Newspaper\PDOConnection;

class RubricsGateway implements RubricsGatewayInterface
{
    private $connection;

    public function __construct(PDOConnection\PDOConnectorInterface $connector)
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
        $result = $stmt->fetch();
        return $result; 
    }

    /**
     * Get rubric by id.
     *
     * @param  int  $rubricId
     * @return array
     */
    public function getById(int $rubricId) 
    {
        $query = "SELECT * FROM rubrics WHERE id = :id";
        $parametersArray = array(':id' => $rubricId);
        return $this->assocQuery($query, $parametersArray);    
    }

    /**
     * Get head rubric by id.
     *
     * @param  int  $rubricId
     * @return array
     */
    public function getHeadRubric(int $rubricId) 
    {
        $query = "SELECT * FROM rubrics WHERE id IN (SELECT head_rubric FROM rubrics WHERE id = :id)";
        $parametersArray = array(':id' => $rubricId);
        return $this->assocQuery($query, $parametersArray);
    }
}
