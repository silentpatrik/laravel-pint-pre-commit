<?php

namespace AmphiBee\LaravelPintPreCommit;

use Illuminate\Console\Command;

class InstallCommand extends Command
{

    protected $signature = 'pint:install';

    protected $description = 'Install and integrate Pint to git hook';

    public function handle()
    {
        try
        {
            $installer = new Installer();
            $installer->install();
        }
        catch (\Exception $e)
        {
            $this->error($e->getMessage());
        }
    }

}