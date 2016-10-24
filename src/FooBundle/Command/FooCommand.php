<?php

namespace FooBundle\Command;

use BarBundle\Command\BarCommand;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FooCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('foo:hello')
            ->setDescription('FooBundle for testing ChainCommandBundle');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $barCommand = $this->getContainer()->get('bar.command');
        $barCommand->execute($input, $output);

        $output->writeln('Hello from Foo!');
    }

    public function setBar(BarCommand $command)
    {
        var_dump($command);
    }
}