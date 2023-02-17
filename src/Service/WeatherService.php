<?php

namespace App\Service;

use App\Enum\WeatherSymbol;

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
           $data[$date]['temps_sensible'] = WeatherSymbol::getIconName($data[$date]['icon']);
        }

        return $data;
    }

    public function getDataByDay(array $data): array
    {
        $dataReturn = [];

        foreach ($data as $date => $hourlyData) {
            if (!key_exists(substr($date, 0, 8), $dataReturn)) {
                $dataReturn[substr($date, 0, 8)] = [];
            }

            $dataReturn[substr($date, 0, 8)][substr($date, -2, 2)] = $hourlyData;
        }

        return $dataReturn;
    }

    public function getTmpMoyByDay(array $dailyData)
    {
        $dailyTmp = [];
        foreach ($dailyData as $date => $hourlyData) {
            $dailyTmp[$date] = [];
            foreach ($hourlyData as $hour => $data) {
                array_push($dailyTmp[$date], $data['TMP']['2 m above ground']);
            }

            $dailyTmp[$date] = array_sum($dailyTmp[$date]) / count($dailyTmp[$date]);

        }

        return $dailyTmp;
    }

    public function getIconByDay(array $dailyData)
    {
        $dailyIcon = [];
        foreach ($dailyData as $date => $hourlyData) {
            $dailyIcon[$date] = [];
            foreach ($hourlyData as $hour => $data) {
                array_push($dailyIcon[$date], $data['icon']);
            }
        }

        $iconByDay = [];
        $iconsByDay = [];
        foreach ($dailyIcon as $date => $icons) {
            $iconByDay[$date] = [];
            foreach ($icons as $key => $icon) {
                if (!key_exists($icon, $iconByDay[$date])) {
                    $iconByDay[$date][$icon] = 0;
                }
                $iconByDay[$date][$icon] += 1;
            }

            ksort($iconByDay[$date]);

            $keys = array_keys($iconByDay[$date]);
            $iconsByDay[$date] = $keys[0];
        }

        return $iconsByDay;
    }
}
