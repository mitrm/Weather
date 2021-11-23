<?php
declare(strict_types=1);

namespace App\Weather\Providers;

use App\Weather\Providers\Base\Weather;
use App\Weather\Providers\Dto\WeatherCityDto;

class Weatherapi extends Weather
{
    public function getWeatherByCity(string $cityName): WeatherCityDto
    {
        $data = $this->getData();
        if ($data === null) {
            throw new \Exception('Data request error weatherapi');
        }
        return new WeatherCityDto(new \DateTime(), $cityName, $data['temp_c'], $data['wind_kph'], $data['wind_dir']);
    }

    protected function getData()
    {
        return [
            'temp_c' => rand(10, 30),
            'wind_kph' => rand(1, 6),
            'wind_dir' => 'SSW',
        ];
    }
}