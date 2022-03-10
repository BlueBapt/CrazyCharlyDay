<?php 

namespace App\Vues; 

abstract class Vue{

    private $content; 

    private $container; 

    private $requete; 

    protected $css; 

    public function __construct($content, $container, $req){
        $this->content = $content; 
        $this->container = $container; 
        $this->requete = $req; 
    }

    public abstract function createContent() : string; 

    public abstract function linkCss() : string; 
    

    public function render(){ 
        $this->content = $this->createContent(); 
        $css = $this->linkCss(); 

        $container = $this->container ;

        return <<<HTML
            <!DOCTYPE html> 
            <html>
                <head>
                    $css
                </head>
                <header> 
                </header>
                <body>
                </body>
            <html>
        HTML;
    } 

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }   
}