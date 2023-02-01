<?php

namespace App\Enum;

class WeatherSymbol
{
    const Error = 0;
    const Sun = 1;
    const LightCloud = 2;
    const PartlyCloud = 3;
    const Cloud = 4;
    const LightRainSun = 5;
    const LightRainThunderSun = 6;
    const SleetSun = 7;
    const nowSun = 8;
    const LightRain = 9;
    const Rain = 10;
    const RainThunder = 11;
    const Sleet = 12;
    const Snow = 13;
    const SnowThunder = 14;
    const Fog = 15;
    const SleetSunThunder = 20;
    const SnowSunThunder = 21;
    const LightRainThunder = 22;
    const SleetThunder = 23;
    const DrizzleThunderSun = 24;
    const RainThunderSun = 25;
    const LightSleetThunderSun = 26;
    const HeavySleetThunderSun = 27;
    const LightSnowThunderSun = 28;
    const HeavySnowThunderSun = 29;
    const DrizzleThunder = 30;
    const LightSleetThunder = 31;
    const HeavySleetThunder = 32;
    const LightSnowThunder = 33;
    const HeavySnowThunder = 34;
    const DrizzleSun = 40;
    const RainSun = 41;
    const LightSleetSun = 42;
    const HeavySleetSun = 43;
    const LightSnowSun = 44;
    const HeavySnowSun = 45;
    const Drizzle = 46;
    const LightSleet = 47;
    const HeavySleet = 48;
    const LightSnow = 49;
    const HeavySnow = 50;

    // Modified symbols when sun is below horizo
    const Dark_Sun = 101;
    const Dark_LightCloud = 102;
    const Dark_PartlyCloud = 103;
    const Dark_LightRainSun = 105;
    const Dark_LightRainThunderSun = 106;
    const Dark_SleetSun = 107;
    const Dark_SnowSun = 108;
    const Dark_SleetSunThunder = 120;
    const Dark_SnowSunThunder = 121;
    const Dark_DrizzleThunderSun = 124;
    const Dark_RainThunderSun = 125;
    const Dark_LightSleetThunderSun = 126;
    const Dark_HeavySleetThunderSun = 127;
    const Dark_LightSnowThunderSun = 128;
    const Dark_HeavySnowThunderSun = 129;
    const Dark_DrizzleSun = 140;
    const Dark_RainSun = 141;
    const Dark_LightSleetSun = 142;
    const Dark_HeavySleetSun = 143;
    const Dark_LightSnowSun = 144;
    const Dark_HeavySnowSun = 145;
}