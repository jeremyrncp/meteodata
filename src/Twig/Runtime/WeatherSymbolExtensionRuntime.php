<?php

namespace App\Twig\Runtime;

use App\Enum\WeatherSymbol;
use Twig\Extension\RuntimeExtensionInterface;

class WeatherSymbolExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function doSomething($icon, $hour)
    {
        $weatherSymbol = new WeatherSymbol();

        return $weatherSymbol->getIcon($icon, $hour);
    }
}
