<?php

namespace Newspaper\Data\Authors;

use Newspaper\PDOConnection\PDOConnectorInterface;

class AuthorsGateway implements AuthorsGatewayInterface
{
    private $connection;

    public function __construct(PDOConnectorInterface $connector)
    {
        $this->connection = $connector->getConnection();
    }

    /**
     * Get all Authors rows from database.
     *
     * @return array
     */
    public function getAuthors() 
    {
        $query = $this->connection->query("SELECT * FROM authors");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * Get author fields from database by id.
     *
     * @param  int  $authorId
     * @return array
     */
    public function getAuthorById(int $id) 
    {
        $stmt = $this->connection->prepare("SELECT * FROM authors WHERE id = :id");
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->execute(array(':id' => $id));
        $result = $stmt->fetch();
        return $result;
    }
}
