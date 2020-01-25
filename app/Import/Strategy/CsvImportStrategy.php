<?php

namespace App\Import\Strategy;

class CsvImportStrategy implements ImportInterface
{
    public const TYPE = 'csv';

    public function import(string $file): array
    {
        return [
            'type'          => static::TYPE,
            'fileName'      => $file,
            'success'       => rand(0, 100),
            'error'         => rand(0, 100),
            'errorMessages' => [
                'Not valid data',
            ],
        ];
    }

}
