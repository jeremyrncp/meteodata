<?php

namespace App\Controller;

use App\Entity\City;
use App\Form\SearchCityType;
use App\Repository\CityRepository;
use App\Service\CalculateCoords;
use App\Service\WeatherService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    #[Route('/city/search', name: 'app_search_city')]
    public function search(Request $request, CityRepository $cityRepository): Response
    {
        $searchCityType = $this->createForm(SearchCityType::class);

        $searchCityType->handleRequest($request);

        if ($searchCityType->isSubmitted() && $searchCityType->isValid()) {
            /** @var City $city */
            $city = $searchCityType->getData();

            $searchCities = $cityRepository->createQueryBuilder('c')
                ->andWhere('c.name LIKE :name')
                ->setParameter('name', '%'. $city->getName() . '%')
                ->getQuery()
                ->getResult();
        }
        return $this->render('search_city.html.twig', [
            'form' => $searchCityType->createView(),
            'cities' => isset($searchCities) ? $searchCities : null,
            'search' => !is_null($searchCityType->getData()) ? $searchCityType->getData()->getName() : null
        ]);
    }

    #[Route('/city/{name}', name: 'app_city')]
    public function index($name, CityRepository $cityRepository, CalculateCoords $calculateCoords, WeatherService $weatherService): Response
    {
        $city = $cityRepository->findOneBy(['name' => $name]);

        $latLon = $calculateCoords->getPoints($city->getLatitude(), $city->getLongitude());
        $dataPath = __DIR__ . '/../../public/json/' . $latLon['lat'] . '_' . $latLon['lon'] . '.json';
        $dataWIthIcon = $weatherService->addPictogrammeToWeatherData(json_decode(file_get_contents($dataPath), true));
        $jsonData = $weatherService->getDataByDay($dataWIthIcon);

        return $this->render('weather_city.html.twig', [
            'city' => $city,
            'weatherData' => $jsonData,
            'tempAndIconByDay' => $this->mergeWeatherArray($weatherService->getIconByDay($jsonData), $weatherService->getTmpMoyByDay($jsonData)),
            'hourWeather' => $this->getHourWeather($dataWIthIcon)
        ]);
    }

    private function mergeWeatherArray($iconByDay, $tmpByDay)
    {
        $data = [];

        foreach ($iconByDay as $date => $icon) {
            $data[$date] = [
                'TMP' => $tmpByDay[$date],
                'ICON' => $icon,
                'DATE' => $date
            ];
        }

        return $data;
    }

    private function getHourWeather(array $data)
    {
        foreach ($data as $date => $weatherData) {
            if(date('YmdH') == $date) {
                return [
                    'date' => $date,
                    'data' => $weatherData
                ];
            }
        }
    }
}
