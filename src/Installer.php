<?php

namespace Qiaweicom\LaravelPHPCSPreCommit;

class Installer
{
    const FETCH_URL = "https://gist.githubusercontent.com/Sliverwing/8a434e44932c39e522bedc354b47d28e/raw/ffb4a97065f310ad1dc34395846cec3ad9f04b0a/pre-commit.sh";

    public function install()
    {

        if (!$this->checkGitHookDir())
        {
            throw new \Exception("Not a git repository");
        }
        else
        {
            copy(Installer::FETCH_URL, $this->getGitHookDir() . DIRECTORY_SEPARATOR . 'pre-commit');
            shell_exec("chmod +x " . $this->getGitHookDir() . DIRECTORY_SEPARATOR . 'pre-commit');
        }
    }

    private function getGitHookDir()
    {
        $currentDir = dirname(__FILE__);
        $projectDir = $currentDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'
            . DIRECTORY_SEPARATOR . '..';
        return $projectDir . DIRECTORY_SEPARATOR . '.git' . DIRECTORY_SEPARATOR . 'hooks';
    }

    private function checkGitHookDir()
    {
        return is_dir($this->getGitHookDir());
    }
}
