<?php

namespace Codilar\Demo\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProgressCommand extends Command
{

    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }




    protected function configure()
    {
     //   parent::configure();
        $this->setName('progress:command')
             ->setDescription('display progress bar');
    }



    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //parent::execute($input, $output);
        $progressBar = new ProgressBar($output,5);
        $counter = 0;
        for($i=0; $i < 5; $i++){
            $progressBar->advance(1);
            $counter ++;
            sleep(1);
        }
        $progressBar->finish();
        $output->writeln('');
        $output->writeln('Console count until '.$counter);
    }
}
