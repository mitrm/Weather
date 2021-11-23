<?php
declare(strict_types=1);

namespace App\Formatter;


use App\Weather\Providers\Dto\WeatherCityDto;

interface Decorator
{
    public function getData(WeatherCityDto $weatherCityDto): array;
}