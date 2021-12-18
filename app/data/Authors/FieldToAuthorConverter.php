<?php

namespace Newspaper\Data\Authors;

use Newspaper\Data\ConverterInterface;

class FieldToAuthorConverter implements ConverterInterface
{
    /**
     * Convert fields data to Author object
     *
     * @param  array  $fieldData
     * @return Author
     */
    public function convert(array $fieldData)
    {
        $author = new Author($fieldData['id'], 
                            $fieldData['firstname'], 
                            $fieldData['lastname'] 
                        );
        return $author;
    }
}