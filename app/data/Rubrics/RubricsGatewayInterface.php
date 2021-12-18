<?php

namespace Newspaper\Data\Rubrics;

interface RubricsGatewayInterface
{
    public function getById(int $rubricId);
    public function getHeadRubric(int $rubricId);
}