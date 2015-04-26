<?php

require_once dirname(__DIR__) . '/vendor/twig/twig/lib/Twig/Autoloader.php';
require_once dirname(__DIR__) . '/vendor/twig/extensions/lib/Twig/Extensions/Autoloader.php';

class Twig{

    private $loader = '', $twig = '';

    public function __construct(){
    }

    public function getTwig($init = false){
        if($init){
            $this->init();
            return $this->twig;
        }
        else{
            return $this->twig;
        }
    }

    public function init(){
        Twig_Autoloader::register();
        $this->loader = new Twig_Loader_Filesystem(dirname(__DIR__));
		$this->loader->addPath(dirname(__DIR__).'/app/template');

        $this->twig = new Twig_Environment($this->loader, array(
            'cache' => dirname(__DIR__) . '/cache',
            'debug' => true,
        ));

        //Load Twig extension
        Twig_Extensions_Autoloader::register();
        $this->twig->addExtension(new Twig_Extensions_Extension_Intl());

		return;
    }

    function getLoader(){
        return $this->loader;
    }
}
?>