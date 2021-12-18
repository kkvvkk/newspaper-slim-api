<?php

use PHPUnit\Framework\TestCase;
use Newspaper\Data\News;

class FieldsToNewsConverterTest extends TestCase
{
    public function testFieldToNewsConvert()
    {
        // generate fields
        $id = rand(1, 20);
        $title = bin2hex(random_bytes(10));
        $anons = bin2hex(random_bytes(10));
        $text = bin2hex(random_bytes(10));
        $authorId = rand(1, 20);
        $rubricId = rand(1, 20);
        $createdAt = date("Y-m-d H:i:s");
        $updatedAt = $createdAt;


        // generate objects
        $news = new News\News($id, $title, $anons, $text, $authorId, $rubricId, $createdAt, $updatedAt);

        $fieldData = array(
            'id' => $id,
            'title' => $title,
            'anons' => $anons,
            'text' => $text,
            'author_id' => $authorId,
            'rubric_id' => $rubricId,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt
        );
        $converter = new News\FieldsToNewsConverter();
        $convertNews = $converter->convertField($fieldData);

        
        $this->assertEquals($news, $convertNews);
    }

    public function testFieldsToNewsConvert()
    {
        $fieldDataArray = array();
        $newsArray = array();

        for ($i = 0; $i < rand(5, 10); $i++) {
            // generate fields
            $id = rand(1, 20);
            $title = bin2hex(random_bytes(10));
            $anons = bin2hex(random_bytes(10));
            $text = bin2hex(random_bytes(10));
            $authorId = rand(1, 20);
            $rubricId = rand(1, 20);
            $createdAt = date("Y-m-d H:i:s");
            $updatedAt = $createdAt;


            // generate objects arrays
            $news = new News\News($id, $title, $anons, $text, $authorId, $rubricId, $createdAt, $updatedAt);
            array_push($newsArray, $news);

            $fieldData = array(
                'id' => $id,
                'title' => $title,
                'anons' => $anons,
                'text' => $text,
                'author_id' => $authorId,
                'rubric_id' => $rubricId,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            );
            array_push($fieldDataArray, $fieldData);
        }

        $converter = new News\FieldsToNewsConverter();
        $convertNewsArray = $converter->convert($fieldDataArray);

        $this->assertEquals($newsArray, $convertNewsArray);
    }
}