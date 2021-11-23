<?php
declare(strict_types=1);

use App\Contract\FormatConst;
use App\Formatter\FormatFactory;
use App\Logger\LoggerFactory;
use App\Weather\Providers\Weatherapi;
use App\Weather\WeatherManager;
use App\ConsoleParser;

require_once "vendor/autoload.php";

// default
$formatDefault = FormatConst::DRIVER_XML;
$cityDefault = 'Moscow';

// console arg
$console = new ConsoleParser();
$format = $console->getLogger($argv) ?? $formatDefault;
$city = $console->getCity($argv) ?? $cityDefault;

// factory logger
$logger = LoggerFactory::getLogger($format);

// get data weather
$weatherManager = new WeatherManager(new Weatherapi());
$weatherCityDto = $weatherManager->getWeatherCity($city);

// formatting and processing for different formats
$formatter = FormatFactory::create($format);

$logger->logWrite($formatter->getData($weatherCityDto), 'logs/weather');



