<?php

namespace Newspaper\Data\Rubrics;

use Newspaper\Data\ConverterInterface;
use Newspaper\Data\Rubrics\Rubric;

class FieldToRubricConverter implements ConverterInterface
{
    /**
     * Convert fields data to Rubric object
     *
     * @param  array  $fieldData
     * @return Rubric
     */
    public function convert(array $fieldData)
    {
        $rubric = new Rubric($fieldData['id'], 
                            $fieldData['name'], 
                            $fieldData['head_rubric'] 
                        );
        return $rubric;
    }
}