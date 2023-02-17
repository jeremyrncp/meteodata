<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'ExtractGribDataCommand',
    description: 'Add a short description for your command',
)]
class ExtractGribDataCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        for ($lon=-5;$lon<=10;$lon=$lon+0.25) {
            for ($lat=42;$lat<=52;$lat=$lat+0.25) {
                if ($_ENV['APP_OS'] === 'windows') {
                    $minigrib = __DIR__. "\..\..\public\grib\gfs.pgrb";
                    $outJson = __DIR__. "\..\..\public\json\\" . $lat . "_" . $lon .".json";
                    $outTxt = __DIR__. "\..\..\public\grib\\extract.txt";
                    //shell_exec( "wgrib2 -verf -lon " . $lon ." " .$lat. " ". $minigrib ." > " . $outTxt);

                    $dataArray = $this->extractDataFromOutputWgrib(file_get_contents($outTxt));
                    file_put_contents($outJson, json_encode($dataArray));
                } else if ($_ENV['APP_OS'] === 'linux') {
                    $minigrib = __DIR__. "/../../public/grib/gfs.pgrb";
                    $outJson = __DIR__. "/../../public/json/" . $lat . "_" . $lon .".json";
                    $outTxt = __DIR__. "/../../public/grib/extract.txt";
                    shell_exec( "wgrib2 -verf -lon " . $lon ." " .$lat. " ". $minigrib ." > " . $outTxt);

                    $dataArray = $this->extractDataFromOutputWgrib(file_get_contents($outTxt));
                    file_put_contents($outJson, json_encode($dataArray));
                }

                $io->success("Extract lat " . $lat . ", lon ". $lon);
            }
        }
    }

    private function extractDataFromOutputWgrib(string $data)
    {
        $explode = explode("\n", $data);
        $exportData = [];

        foreach ($explode as $item) {
            $explodeItem = explode(':', $item);

            if (key_exists(2, $explodeItem)) {
                $date = substr($explodeItem[2], 3 + -1 * strlen($explodeItem[2]), strlen($explodeItem[2]) - 3);
                $paramType = $explodeItem[3];
                $paramAltitude = $explodeItem[4];

                $explodeVal = explode('val=', $explodeItem[7]);
                $value = $explodeVal[1];

                if (!key_exists($date, $exportData)) {
                    $exportData[$date] = [];
                }
                if (!key_exists($paramType, $exportData[$date])) {
                    $exportData[$date][$paramType] = [];
                }
                if (!key_exists($paramAltitude, $exportData[$date][$paramType])) {
                    $exportData[$date][$paramType][$paramAltitude] = $this->processData($value, $paramType, $paramAltitude);
                }
            }
        }

        return $exportData;
    }

    private function processData($value, $paramType, $paramAltitude)
    {
        if (in_array($paramType, ['TMAX', 'TMP', 'TMIN'])) {
            return $value - 273.15;
        }

        return $value;
    }
}
