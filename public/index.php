<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Newspaper\Data\Authors;
use Newspaper\Data\News;
use Newspaper\Data\Rubrics;
use Newspaper\PDOConnection;
use Newspaper\Controllers;
use Newspaper\Repositories;

require __DIR__ . '/../vendor/autoload.php';

/// DI container init
$container = new League\Container\Container();

AppFactory::setContainer($container);
$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->setBasePath("/newspaper-slim-api");

// authors DI init
$container->add('fieldToAuthorConverter', Authors\FieldToAuthorConverter::class);
$container->add('authorsGateway', Authors\AuthorsGateway::class)->addArgument(PDOConnection\PDOConnectorInterface::class);
$container->add('authorsRepository', Repositories\AuthorsRepository::class)->addArgument('authorsGateway')->addArgument('fieldToAuthorConverter');
$container->add('authorsController', Controllers\AuthorsController::class)->addArgument('authorsRepository');

// rubrics DI init
$container->add('fieldToRubricConverter', Rubrics\FieldToRubricConverter::class);
$container->add('rubricsGateway', Rubrics\RubricsGateway::class)->addArgument(PDOConnection\PDOConnectorInterface::class);
$container->add('rubricsRepository', Repositories\RubricsRepository::class)->addArgument('rubricsGateway')->addArgument('fieldToRubricConverter');
$container->add('rubricsController', Controllers\RubricsController::class)->addArgument('rubricsRepository');

// news DI init
$container->add('fieldToNewsConverter', News\FieldsToNewsConverter::class);
$container->add('newsGateway', News\NewsGateway::class)->addArgument(PDOConnection\PDOConnectorInterface::class);
$container->add('newsRepository', Repositories\NewsRepository::class)->addArgument('newsGateway')->addArgument('fieldToNewsConverter');
$container->add('newsController', Controllers\NewsController::class)->addArgument('newsRepository')->addArgument('authorsRepository')->addArgument('rubricsRepository');

// database connection interface implementation
$container->add(PDOConnection\PDOConnectorInterface::class, PDOConnection\MySqlConnector::class);


/// authors routes
$app->get('/authors', function (Request $request, Response $response) {
    return $this->get('authorsController')->getAuthors($response);
});
$app->get('/author/{id:[0-9]+}', function (Request $request, Response $response, array $args) {
    return $this->get('authorsController')->getAuthorById($response, (int)$args['id']);
});


/// news routes
$app->group('/news', function (RouteCollectorProxy $group) {
    $group->get('/byId/{id:[0-9]+}', function (Request $request, Response $response, array $args) {
        return $this->get('newsController')->getById($response, (int)$args['id']);
    });
    
    $group->get('/byRubric/{rubricId:[0-9]+}', function (Request $request, Response $response, array $args) {
        return $this->get('newsController')->getByRubric($response, (int)$args['rubricId']);
    });
    
    $group->get('/byAuthor/{authorId:[0-9]+}', function (Request $request, Response $response, array $args) {
        return $this->get('newsController')->getByAuthor($response, (int)$args['authorId']);
    });
});

/// rubrics routes
$app->group('/rubric', function (RouteCollectorProxy $group) {
    $group->get('/byId/{rubricsId:[0-9]+}', function (Request $request, Response $response, array $args) {
        return $this->get('rubricsController')->getRubricById($response, (int)$args['rubricsId']);
    });
    
    $group->get('/head/byId/{rubricsId:[0-9]+}', function (Request $request, Response $response, array $args) {
        return $this->get('rubricsController')->getHeadRubricById($response, (int)$args['rubricsId']);
    });
});

$app->run();