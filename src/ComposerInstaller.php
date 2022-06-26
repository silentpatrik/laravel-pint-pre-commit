<?php

namespace AmphiBee\LaravelPintPreCommit;

use Composer\Script\Event;

class ComposerInstaller 
{

    public static function install(Event $event)
    {
        $installer = new Installer();
        $installer->install();

        echo "Pint Pre-hook installed!\n";
    }

}
