<?php

namespace App\Command;

use App\Entity\City;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'ImportInseeCommand',
    description: 'Add a short description for your command',
)]
class ImportInseeCommand extends Command
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct("importInseeCommand");
        $this->entityManager = $entityManager;
    }

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

        $file = fopen(__DIR__ . '/Util/communes-departement-region.csv', 'r');

        while ($data = fgetcsv($file, 0, ',')) {
            $city = new City();
            $city->setName($data[9]);
            $city->setCodeInsee((int) $data[0]);
            $city->setLatitude($data[5]);
            $city->setLongitude($data[6]);
            $city->setNomDepartemement($data[12]);
            $city->setRegion($data[14]);

            $this->entityManager->persist($city);
            $this->entityManager->flush();
        }


        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
