<?php

namespace Codilar\Demo\Console;

use Composer\Console\Input\InputOption;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Demo extends Command
{

    protected function configure()
    {
//        parent::configure(); //
        $this->setName('codilar:demo')
             ->setDescription('demo command do nothing');
        $options = [
            new InputOption('name','N',InputOption::VALUE_OPTIONAL,'greeter name','jon'),
        ];
        $this->setDefinition($options);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
//        parent::execute($input, $output);
        $name = $input->getOption('name');
        $output->writeln('<question>My command is alive '.$name .'<question>');
    }

}
