<?php

namespace Newspaper\Data;

interface ConverterInterface
{
    public function convert(array $fieldData);
}