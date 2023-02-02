<?php

namespace App\Service;

class WeatherService
{
    /**
     * @var CalculateWeatherSymbol $calculateWeatherSymbol
     */
    private $calculateWeatherSymbol;

    public function __construct(CalculateWeatherSymbol $calculateWeatherSymbol)
    {
        $this->calculateWeatherSymbol = $calculateWeatherSymbol;
    }
    public function addPictogrammeToWeatherData(array $jsonData)
    {
        $data = [];

        foreach($jsonData as $date => $weatherData)
        {
            $data[$date] = $weatherData;
            $data[$date]['icon'] = $this->calculateWeatherSymbol->getSymbol(
                $weatherData['TMP']['2 m above ground'],
                $weatherData['APCP']['surface'],
                $weatherData['CSNOW']['surface'],
                $weatherData['CRAIN']['surface'],
                $weatherData['CAPE']['90-0 mb above ground'],
                $weatherData['CIN']['255-0 mb above ground'],
                $weatherData['LCDC']['low cloud layer'],
                $weatherData['MCDC']['middle cloud layer'],
                $weatherData['HCDC']['high cloud layer'],
                $weatherData['TCDC']['entire atmosphere']
            );
        }

        return $data;
    }
}
