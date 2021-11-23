<?php
declare(strict_types=1);

namespace App\Weather;


use App\Weather\Providers\Base\Weather;
use App\Weather\Providers\Dto\WeatherCityDto;

class WeatherManager
{

    public function __construct(private Weather $weather)
    {
    }

    public function getWeatherCity(string $city): ?WeatherCityDto
    {
        try {
            return $this->weather->getWeatherByCity($city);
        } catch (\Throwable) {
            // Log error
        }
        return null;
    }
}