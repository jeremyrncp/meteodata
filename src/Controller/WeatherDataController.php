<?php

namespace App\Controller;

use App\Service\CalculateCoords;
use App\Service\WeatherService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class WeatherDataController extends AbstractController
{
    #[Route('/weather/data', name: 'app_weather_data')]
    public function index(Request $request, CalculateCoords $calculateCoords, WeatherService $weatherService): JsonResponse
    {
        if ($request->get('lat') === null || $request->get('lon') === null) {
            return $this->json(['error' => 'lat and lon must be defined']);
        }
        $latLon = $calculateCoords->getPoints($request->get('lat'), $request->get('lon'));
        $dataPath = __DIR__ . '/../../public/json/' . $latLon['lat'] . '_' . $latLon['lon'] . '.json';

        $jsonData = json_decode(file_get_contents($dataPath), true);


        return JsonResponse::fromJsonString(json_encode($this->transformData($weatherService->addPictogrammeToWeatherData($jsonData))));
    }

    private function transformData(array $data): array
    {
        $dataReturn = [];

        foreach($data as $date => $parametersData) {
            $tableParameter = [];
            $tableParameter['date'] = $date;
            foreach($parametersData as $parameter => $dataByParameter) {
                $tableParameter[$parameter] = is_array($dataByParameter) ? reset($dataByParameter) : $dataByParameter;
            }
            $dataReturn[] = $tableParameter;
        }

        return $dataReturn;
    }
}
