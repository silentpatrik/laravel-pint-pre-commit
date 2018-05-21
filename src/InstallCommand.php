<?php

namespace Qiaweicom\LaravelPHPCSPreCommit;

use Illuminate\Console\Command;

class InstallCommand extends Command
{

    protected $signature = 'php-cs:install';

    protected $description = 'Install and integrate PHP_CodeSniffer to git hook';

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