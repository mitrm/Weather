<?php
declare(strict_types=1);

namespace App\Formatter;

use App\Weather\Providers\Dto\WeatherCityDto;

class JsonFormater implements Decorator
{
    public function getData(WeatherCityDto $weatherCityDto): array
    {
        return [
            $weatherCityDto->getDate()->format('Y-m-d H:i:s'),
            $weatherCityDto->getTempC(),
            $weatherCityDto->getWindDir(),
            $weatherCityDto->getWindKph(),
            $weatherCityDto->getCity(),
        ];
    }
}