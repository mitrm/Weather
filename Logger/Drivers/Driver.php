<?php
declare(strict_types=1);

namespace App\Logger\Drivers;

interface Driver
{
    public function logWrite(array $data, string $file): void;
}