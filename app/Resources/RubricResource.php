<?php 

namespace Newspaper\Resources;

use Newspaper\Data\Rubrics\Rubric;
use Newspaper\Repositories\RubricsRepository;

class RubricResource
{
    public $name;
    public $headRubric;

    public function __construct(RubricsRepository $rubricsRepository, Rubric $rubric)
    {
        $this->name = $rubric->name;
        $this->headRubric = $rubricsRepository->getRubricById((int)$rubric->headRubric)->name;
    }

}