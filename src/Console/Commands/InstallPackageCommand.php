<?php

namespace Laravelir\Filterable\Console\Commands;

use Illuminate\Console\Command;

class InstallPackageCommand extends Command
{
    protected $signature = 'filterable:install';

    protected $description = 'Install the filterable Package';

    public function handle()
    {
        $this->line("\t... Welcome To filterable Installer ...");


        //config
        if (File::exists(config_path('filterable.php'))) {
            $confirm = $this->confirm("filterable.php already exist. Do you want to overwrite?");
            if ($confirm) {
                $this->publishConfig();
                $this->info("config overwrite finished");
            } else {
                $this->info("skipped config publish");
            }
        } else {
            $this->publishConfig();
            $this->info("config published");
        }


        $this->info("Package Successfully Installed.\n");
        $this->info("\t\tGood Luck.");
    }

    private function publishConfig()
    {
        $this->call('vendor:publish', [
            '--provider' => "Laravelir\\Filterable\\Providers\\FilterableServiceProvider",
            '--tag'      => 'filterable-config',
            '--force'    => true
        ]);
    }
}
