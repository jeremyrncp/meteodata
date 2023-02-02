<?php

namespace App\Service;

use App\Enum\WeatherSymbol;

class CalculateWeatherSymbol
{
    public function getSymbol(
        $temperature,
        $precipitations,
        $snow,
        $rain,
        $cape,
        $cin,
        $lowLevelCLoud,
        $middleLevelCloud,
        $hightLevelCloud,
        $totalCloud
    ): int
    {
        if ($snow === 1) {
            /** Thunder */
            if($this->getThunder($cape, $cin)) {
                return WeatherSymbol::SnowThunder;
            }

            if ($precipitations >= 5) {
                return WeatherSymbol::HeavySnow;
            } else if ($precipitations >= 2) {

            } else {
                return WeatherSymbol::Snow;
            }

            return WeatherSymbol::LightSnow;
        }

        /** Thunder */
        if($this->getThunder($cape, $cin)) {
            return WeatherSymbol::RainThunder;
        }

        if ($precipitations >= 5) {
            return WeatherSymbol::HeavyRain;
        } else if ($precipitations >= 3) {
            return WeatherSymbol::Rain;
        } elseif ($precipitations !== 0) {
            return WeatherSymbol::LightRain;
        }

        if ($lowLevelCLoud >= 20) {
            return WeatherSymbol::Fog;
        }

        if ($middleLevelCloud >= 20) {
            return WeatherSymbol::PartlyCloud;
        }

        if ($totalCloud >= 20 && $totalCloud <= 40) {
            return WeatherSymbol::LightCloud;
        } else if ($totalCloud >= 40) {
            return WeatherSymbol::Cloud;
        }

        return WeatherSymbol::Sun;
    }

    private function getThunder($cape, $cin): bool
    {
        if ($cape >= 900 and $cin >= 200) {
            return true;
        }

        return false;
    }
}