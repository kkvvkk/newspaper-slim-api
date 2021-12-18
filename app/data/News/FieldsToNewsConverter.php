<?php

namespace Newspaper\Data\News;

use Newspaper\Data\ConverterInterface;
use Newspaper\Data\News\News;

class FieldsToNewsConverter implements ConverterInterface
{
    /**
     * Convert fields data to News object
     *
     * @param  array  $fieldData
     * @return News
     */
    public function convertField(array $fieldData) : ?News
    {
        $news = new News(   $fieldData['id'], 
                            $fieldData['title'], 
                            $fieldData['anons'], 
                            $fieldData['text'], 
                            $fieldData['author_id'], 
                            $fieldData['rubric_id'], 
                            $fieldData['created_at'], 
                            $fieldData['updated_at']
                        );
        return $news;
    }

    /**
     * Convert fields data to News objects array
     *
     * @param  array  $fieldData
     * @return array
     */
    public function convert(array $fieldData) 
    {
        $newsArray = array();
        foreach ($fieldData as $field) {
            array_push($newsArray, $this->convertField($field));
        }
        return $newsArray;
    }
}