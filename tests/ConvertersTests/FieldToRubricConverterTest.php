<?php

use PHPUnit\Framework\TestCase;
use Newspaper\Data\Rubrics;

class FieldToRubricConverterTest extends TestCase
{
    public function testFieldToRubricConvert()
    {
        // generate fields
        $id = rand(1, 20);
        $name = bin2hex(random_bytes(10));
        $headRubric = rand(1, 20);


        // generate objects
        $rubric = new Rubrics\Rubric($id, $name, $headRubric);

        $fieldData = array(
            'id' => $id,
            'name' => $name,
            'head_rubric' => $headRubric
        );
        $converter = new Rubrics\FieldToRubricConverter();
        $convertRubric = $converter->convert($fieldData);

        
        $this->assertEquals($rubric->id, $convertRubric->id);
        $this->assertEquals($rubric->name, $convertRubric->name);
        $this->assertEquals($rubric->headRubric, $convertRubric->headRubric);
    }
}