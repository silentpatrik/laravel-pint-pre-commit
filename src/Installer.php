<?php

namespace AmphiBee\LaravelPintPreCommit;

class Installer
{
    const FETCH_URL = "https://gist.githubusercontent.com/ogorzalka/2d355e35c9308cd274ce3232de4cd19c/raw/570166574382b71c59e8803d7343143979d13c61/pre-commit.sh";
    protected mixed $fetchUrl; // mixed so we can have an array in future when multiple pre-commit scripts should be runned.

    public function setFetchUrl()
    {
        $fetchUrl = getenv('PRE_COMMIT_FETCH_URL')!== false ? getenv('LARAVEL_PRE_COMMIT_FETCH_URL') : Installer::FETCH_URL;
    }
    
    public function validateFetchUrl($url) : bool 
    {
       // i will move this to its own file when not coding in github, text editor
        class FetchUrlRule implements Illuminate\Contracts\Validation\Rule
        {
             protected mixed $urlWhiteList = ['https://gist.githubusercontent.com/'];
            public function __construct(mixed $urlWhiteList=null)
            {
                if(!is_null($urlWhiteList))
                {
                    $this->urlWhiteList = $urlWhiteList;
                }
            }
        
            public function passes( $attribute, $value ) 
            {
                $whiteListed=false;
                 foreach($this->urlWhiteList as $url) {
                     if(strpos($url, $value)!==false){
                         $whiteListed=true;
                         break;
                     }
                 }   
    	        return ($whiteListed && filter_var($value, FILTER_VALIDATE_URL)) ? true : false;
    	    }

    	    public function message() {
    		    return ':attribute must be a valid url and the url must be whitelisted.';
            }
        }
        $validator = new FetchUrlRule();
    }
    
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
