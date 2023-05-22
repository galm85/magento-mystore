<?php

namespace Codilar\Demo\Console;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductCount extends Command
{

    private CollectionFactory $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory, string $name = null)
    {
        parent::__construct($name);
        $this->collectionFactory = $collectionFactory;
    }

    protected  function configure()
    {
//        parent::configure(); //
        $this->setName('product:count')
             ->setDescription('Display the count of a product');
    }


    public function execute(InputInterface $input, OutputInterface $output)
    {
//        parent::execute($input, $output);
        $count = $this->collectionFactory->create()->count();
        $output->writeln(sprintf('You have <info>%s</info> products',$count));
    }
}
