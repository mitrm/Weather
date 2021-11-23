<?php
declare(strict_types=1);

namespace App\Weather\Providers\Base;

use App\Weather\Providers\Dto\WeatherCityDto;

abstract class Weather
{
    abstract public function getWeatherByCity(string $cityName): WeatherCityDto;

    protected function request(string $url)
    {

    }
}