<?php
declare(strict_types=1);

namespace App\Logger\Drivers;


class JsonDriver implements Driver
{
    public function logWrite(array $data, string $fileName): void
    {
        $this->saveFile($data, $fileName . '.json');
    }

    private function saveFile(array $data, string $fileName): void
    {
        $fp = fopen($fileName, 'a');
        fputcsv($fp, $data);
        fclose($fp);
    }
}