<?php

use PHPUnit\Framework\TestCase;
use Newspaper\Data\Authors;

class FieldToAuthorConverterTest extends TestCase
{
    public function testFieldToAuthorConvert()
    {
        // generate fields
        $id = rand(1, 20);
        $firstName = bin2hex(random_bytes(10));
        $lastName = bin2hex(random_bytes(10));


        // generate objects
        $author = new Authors\Author($id, $firstName, $lastName);

        $fieldData = array(
            'id' => $id,
            'firstname' => $firstName,
            'lastname' => $lastName
        );
        $converter = new Authors\FieldToAuthorConverter();
        $convertAuthor = $converter->convert($fieldData);
        
        
        $this->assertEquals($author->id, $convertAuthor->id);
        $this->assertEquals($author->firstName, $convertAuthor->firstName);
        $this->assertEquals($author->lastName, $convertAuthor->lastName);
    }
}