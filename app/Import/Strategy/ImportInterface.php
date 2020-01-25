<?php

namespace App\Import\Strategy;

interface ImportInterface
{
    public function import (string $file): array;
}
