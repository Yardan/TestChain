<?php

namespace BarBundle\Command;

use ChainCommandBundle\Command\ChainCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BarCommand extends ChainCommand
{
    protected function configure()
    {
        $this->setName('bar:hi')
            ->setDescription('BarBundle for testing ChainCommandBundle');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hi from Bar!');
    }
}