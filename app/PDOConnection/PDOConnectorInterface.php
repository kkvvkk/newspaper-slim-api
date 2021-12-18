<?php

namespace Newspaper\PDOConnection;

interface PDOConnectorInterface
{
    public function getConnection() : \PDO;
}