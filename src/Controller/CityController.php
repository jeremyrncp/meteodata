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
    #[Route('/', name: 'app_index')]
    public function index(CityRepository $cityRepository): Response
    {
        $searchCities = $cityRepository->createQueryBuilder('c')
            ->select('DISTINCT c.nomDepartemement')
            ->getQuery()
            ->getResult();

        $cities = [];

        /** @var City $city */
        foreach ($searchCities as $key => $city) {
             if ($city['nomDepartemement'] != '' && $city['nomDepartemement'] != 'nom_departement')  {
                $cities[] = $city;
            }
        }

        return $this->render('index.html.twig', [
            'cities' => $cities,
            'form' => ($this->createForm(SearchCityType::class))->createView()
        ]);
    }
    #[Route('/departement/{name}', name: 'app_search_departement')]
    public function departement(string $name, Request $request, CityRepository $cityRepository): Response
    {
        $searchCities = $cityRepository->createQueryBuilder('c')
            ->andWhere('c.nomDepartemement = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getResult();

        return $this->render('city_departement.html.twig', [
            'cities' => isset($searchCities) ? $searchCities : null,
            'departement' => $name,
            'form' => ($this->createForm(SearchCityType::class))->createView()
        ]);
    }

    #[Route('/city/search', name: 'app_search_city')]
    public function search(Request $request, CityRepository $cityRepository): Response
    {
        $searchCityType = $this->createForm(SearchCityType::class);

        $searchCityType->handleRequest($request);

        if ($searchCityType->isSubmitted()) {
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
            'search' => !is_null($searchCityType->getData()) ? $searchCityType->getData()->getName() : null,
        ]);
    }

    #[Route('/city/{name}', name: 'app_city')]
    public function weatherCity($name, CityRepository $cityRepository, CalculateCoords $calculateCoords, WeatherService $weatherService): Response
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
            'hourWeather' => $this->getHourWeather($dataWIthIcon),
            'form' => ($this->createForm(SearchCityType::class))->createView()
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
