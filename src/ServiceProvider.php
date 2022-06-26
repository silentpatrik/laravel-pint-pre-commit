<?php

namespace AmphiBee\LaravelPintPreCommit;

use Illuminate\Support\ServiceProvider as Base;

class ServiceProvider extends Base
{

    public function register()
    {
        $this->commands([
            InstallCommand::class,
        ]);
    }

}