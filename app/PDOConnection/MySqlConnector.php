<?php

namespace Newspaper\PDOConnection;

class MySqlConnector implements PDOConnectorInterface
{
    /**
     * Get PDO connection.
     *
     * @return PDO
     */
    public function getConnection() : \PDO
    {
        $json = file_get_contents(dirname(__FILE__, 3) . "/settings.json");
        $settings = json_decode($json);
        $mysqlData = $settings->mysql; 
        $host = $mysqlData->host;
        $dbname = $mysqlData->dbname;
        $user = $mysqlData->user;
        $pass = $mysqlData->pass;
        
        return new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }
}