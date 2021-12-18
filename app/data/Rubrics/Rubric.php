<?php

namespace Newspaper\Data\Rubrics;

class Rubric
{
    public $id;
    public $name;
    public $headRubric;

    public function __construct($id, $name, $headRubric)
    {
        $this->id = $id;
        $this->name = $name;
        $this->headRubric = $headRubric;
    }
}