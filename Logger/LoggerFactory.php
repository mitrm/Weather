<?php
declare(strict_types=1);

namespace App\Logger;

use App\Contract\FormatConst;
use App\Logger\Drivers\Driver;
use App\Logger\Drivers\JsonDriver;
use App\Logger\Drivers\XMLDriver;

class LoggerFactory
{
    public function __construct(
        protected JsonDriver $jsonDriver,
        protected XMLDriver $XMLDriver
    )
    {
    }

    public static function getLogger(string $driver): Driver
    {
        if ($driver === FormatConst::DRIVER_JSON) {
            return new JsonDriver();
        } elseif ($driver === FormatConst::DRIVER_XML) {
            return new XMLDriver();
        }
        throw new \Exception('Driver not found: ' . $driver);
    }
}