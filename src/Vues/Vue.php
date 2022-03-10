<?php 

namespace custumbox\Vues;

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

        $accueil =  $container->router->pathFor( 'accueil' ) ;
        $creation =  $container->router->pathFor( 'creerboite' ) ;

        $base = $this->requete->getUri()->getBasePath() ;


        return <<<HTML
            <!DOCTYPE html> 
            
            <html>
                <head>
                    <meta charset="utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                    <meta name="description" content="" />
                    <meta name="author" content="" />
                    <title>Custom Box</title>
                    <!-- Favicon-->
                    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
                    <!-- Bootstrap Icons-->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
                    <!-- Google fonts-->
                    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
                    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
                    <!-- SimpleLightbox plugin CSS-->
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
                    <!-- Core theme CSS (includes Bootstrap)-->
                    <link href="$base/css/styles.css" rel="stylesheet" />
                    $css
                </head>
                <header> 
                </header>
                <body>
                    <!-- Navigation-->
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
                        <div class="container px-4 px-lg-5">
                            <a class="navbar-brand" href="#page-top">L'Atelier</a>
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                                    <li class="nav-item"><a class="nav-link" href="#about">A propos</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="content">
                        $this->content
                    </div>
                    <!-- Footer-->
                    <footer class="bg-light py-5">
                        <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; Atelier 17.91 2022</div></div>
                    </footer>
                    <!-- Bootstrap core JS-->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                    <!-- SimpleLightbox plugin JS-->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
                    <!-- Core theme JS-->
                    <script src="js/scripts.js"></script>
                    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                    <!-- * *                               SB Forms JS                               * *-->
                    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
                    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
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