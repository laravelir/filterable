<?php

namespace Laravelir\Filterable\Console\Commands;

use Illuminate\Console\Command;

class MakeFilterCommand extends Command
{
    protected $signature = 'make:filter';

    protected $description = 'make new filter file';

    public function handle()
    {


        $this->info("Package Successfully Installed.\n");
        $this->info("\t\tGood Luck.");
    }
}
