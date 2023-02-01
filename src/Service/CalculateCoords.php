<?php

namespace App\Service;

class CalculateCoords
{
    public function getPoints(string $lat, string $lon): array
    {
        $lat = number_format($lat, 2);
        $lon = number_format($lon, 2);

        $explodePointLat = explode('.', $lat);
        $decimalesLat = $explodePointLat[1];

        $explodePointLon = explode('.', $lon);
        $decimalesLon = $explodePointLon[1];

        $latPoint = $this->getMaille($explodePointLat[0], $decimalesLat);
        $lonPoint = $this->getMaille($explodePointLon[0], $decimalesLon);

        return [
            'lat' => $latPoint,
            'lon' => $lonPoint
        ];
    }

    private function getMaille($value, string $decimales)
    {
        if ($decimales <= 12.5) {
            return $value;
        } else if($decimales <= 37.5) {
            return $value . ".25";
        } else if($decimales <= 62.5) {
            return $value . ".5";
        } else if($decimales <= 87.5) {
            return $value . ".75";
        } else {
            return $value + 1;
        }
    }
}
