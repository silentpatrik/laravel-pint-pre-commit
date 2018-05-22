<?php

namespace Qiaweicom\LaravelPHPCSPreCommit;

use Composer\Script\Event;

class ComposerInstaller 
{

    public static function install(Event $event)
    {
        $installer = new Installer();
        $installer->install();

        echo "Installed!\n";
    }

}
