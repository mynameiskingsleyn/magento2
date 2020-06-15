<?php

namespace Mastering\SampleModule\Plugin;

use Mastering\SampleModule\Console\Command\AddItem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Logger
{
    /**
     * @var OutputInterface
     */
    private $output;

    public function beforeRun(AddItem $command, InputInterface $input, OutputInterface $output)//executed before run method is called
    {
        $output->writeln('before Execute'); // before run takes 3 arguments, first is command and the others are inputs
    }

    public function aroundRun(AddItem $command, \Closure $proceed, InputInterface $input, OutputInterface $output)// executed instead of run method
    {
        $output->writeln('around execution before call');
        $proceed->call($command, $input, $output);
        $output->writeln('aroundExecute after call');
        $this->output = $output;
    }

    public function afterRun(AddItem $command) // executed after second parameter would be the result but not used.
    {
        $this->output->writeln('afterExecute');
    }

}