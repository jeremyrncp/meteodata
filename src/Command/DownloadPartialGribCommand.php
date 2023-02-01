<?php

namespace App\Command;

use App\Enum\Run;
use App\Enum\Term;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'DownloadPartialGribCommand',
    description: 'Download Partial Grib',
)]

class DownloadPartialGribCommand extends Command
{
    const GRIB_PARAMS = [':CIN:255-0 mb above ground:', ':CAPE:90-0 mb above ground:', ':TCDC:entire atmosphere:', ':HCDC:high cloud layer:',
        ':MCDC:middle cloud layer:', ':LCDC:low cloud layer:', ':TMP:2 m above ground:', ':RH:2 m above ground:', ':TMAX:2 m above ground:',
        ':TMIN:2 m above ground:', ':UGRD:10 m above ground:', ':VGRD:10 m above ground:', ':APCP:surface:', ':ACPCP:surface:', ':CSNOW:surface:',
        ':CICEP:surface:', ':CFRZR:surface:', ':CRAIN:surface:'
    ];

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $date = date('Ymd');
        $run = (new Run())->getRunByHour(date('H'));

        foreach ((new Term())->getTerm() as $term) {
            $inv = "https://nomads.ncep.noaa.gov/pub/data/nccf/com/gfs/prod/gfs." . $date . "/". $run ."/atmos/gfs.t". $run ."z.pgrb2.0p25.f". $term .".idx";
            $grib = "https://nomads.ncep.noaa.gov/pub/data/nccf/com/gfs/prod/gfs." . $date . "/". $run . "/atmos/gfs.t". $run ."z.pgrb2.0p25.f". $term;

            if ($_ENV['APP_OS'] === 'windows') {
                $minigrib = __DIR__. "\..\..\public\grib\gfs.pgrb2.0p25.f". $term;
                shell_exec( 'perl ' . __DIR__. '\Util\get_inv.pl  '. $inv .' | grep "(' . implode('|', self::GRIB_PARAMS) . ')" | perl ' . __DIR__. '\Util\get_grib.pl ' . $grib . ' ' . $minigrib);
            } else if ($_ENV['APP_OS'] === 'linux') {
                $minigrib = __DIR__. "/../../public/grib/gfs.pgrb2.0p25.f". $term;
                shell_exec( __DIR__. '/Util/get_inv.pl  '. $inv .' | egrep "(' . implode('|', self::GRIB_PARAMS) . ')" |  ' . __DIR__. '/Util/get_grib.pl ' . $grib . ' ' . $minigrib);
            }

            $io->success("Download " . $term);
        }

        if ($_ENV['APP_OS'] === 'linux') {
            shell_exec('cat ' . __DIR__. '/../../public/grib/gfs.pgrb2.0p25.f* > ' . __DIR__. '/../../public/grib/gfs.pgrb');
        }

        return Command::SUCCESS;
    }
}
