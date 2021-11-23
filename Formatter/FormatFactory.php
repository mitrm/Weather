<?php
declare(strict_types=1);

namespace App\Formatter;

use App\Contract\FormatConst;

class FormatFactory
{
    public static function create(string $format): Decorator
    {
        if ($format === FormatConst::DRIVER_JSON) {
            return new JsonFormater();
        } elseif ($format === FormatConst::DRIVER_XML) {
            return new XmlFormatter();
        }
        throw new \Exception('Format not processed: ' . $format);
    }
}