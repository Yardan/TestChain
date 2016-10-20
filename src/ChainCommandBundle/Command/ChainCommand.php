<?php

namespace ChainCommandBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ChainCommand extends Command
{
    protected $attachedTo = null;
    protected $registeredCommands = [];
    protected $chain = [];

    public function __construct()
    {
        $this->chain = [];
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('app:chain-command')
            ->setDescription('Command.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Whoa!');
    }

    public function attachTo($command)
    {
        $this->attachedTo = $command;
        return $this;
    }

    public function addToChain(ChainCommand $chain)
    {
        $this->chain[] = $chain;
    }

    public function register(ChainCommand $command)
    {
        $this->registeredCommands[] = $command;
        return $this;
    }

    public function run(InputInterface $input, OutputInterface $output)
    {
        //$command = $this->getApplication()->find('foo:hello');
        //parent::run($input, $output);
        //return $command->run($input, $output);

        return parent::run($input, $output);
    }
}