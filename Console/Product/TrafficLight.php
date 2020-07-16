<?php
declare(strict_types=1);
namespace Rojas\ProductTrafficLight\Console\Product;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TrafficLight extends Command
{
    const SKU = 'sku';
    const COLOR = 'color';

    public function __construct(
        \Rojas\ProductTrafficLight\Helper\Data $helper
    )
    {
        $this->helper = $helper;
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('catalog:product:semaforo');
        $this->setDescription('Set Semaforo');
        $this->addOption(
            self::SKU,
            null,
            InputOption::VALUE_OPTIONAL,
            ''
        );
        $this->addOption(
            self::COLOR,
            null,
            InputOption::VALUE_OPTIONAL,
            ''
        );

        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sku = $input->getOption(self::SKU);
        $color = $input->getOption(self::COLOR);
        $timeStart = microtime(true);
        $output->writeln("<comment>Traffic Light saving...</comment>");

        $response = $this->helper->semaforo($sku, $color);
        if ($response === true) {
            $output->writeln("<info>Integration is ready</info>");
        } else {
            $output->writeln("<error>Integration Error: " . $response . "</error>");
            $output->writeln("<info>Check logs</info>");
        }
        $timeEnd = microtime(true);
        $executionTime = ($timeEnd - $timeStart);
        $processTime = "Time: " . $executionTime . " seconds";
        $output->writeln("<info>" . $processTime . "</info>");
    }
}
