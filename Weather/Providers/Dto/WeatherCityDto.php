<?php
declare(strict_types=1);

namespace App\Weather\Providers\Dto;

use DateTime;

class WeatherCityDto
{
    public function __construct(private DateTime $date, private string $city, private float $tempC, private float $windKph, private string $windDir)
    {
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getTempC(): float
    {
        return $this->tempC;
    }

    public function getWindKph(): float
    {
        return $this->windKph;
    }

    public function getWindDir(): string
    {
        return $this->windDir;
    }
}