<?php

namespace App\Controller;

use App\Service\CalculateCoords;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class WeatherDataController extends AbstractController
{
    #[Route('/weather/data', name: 'app_weather_data')]
    public function index(Request $request, CalculateCoords $calculateCoords): JsonResponse
    {
        if ($request->get('lat') === null || $request->get('lon') === null) {
            return $this->json(['error' => 'lat and lon must be defined']);
        }
        $latLon = $calculateCoords->getPoints($request->get('lat'), $request->get('lon'));
        $dataPath = __DIR__ . '/../../public/json/' . $latLon['lat'] . '_' . $latLon['lon'] . '.json';

        return JsonResponse::fromJsonString(file_get_contents($dataPath));
    }
}
