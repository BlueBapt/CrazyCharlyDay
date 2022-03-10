<?php

namespace custumbox\Vues;

class VueAccueil extends Vue{

    public function __construct($c, $rq){
        parent::__construct("", $c, $rq);
    }

    public function linkCss() : string{
        return "";
    }

    public function createContent() : string{
        $html = <<<HTML
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-jaune-atelier font-weight-bold"> <br> </h1>
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5"> <br><br> </p>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Atelier 17.91</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Pour un quotidien naturel et respectueux de la 🌍 <br> Astuces 100% Green <br> Upcycling vêtements | bijoux <br> Tutos beauté & produits ménagers <br> Décoration </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">A votre service</h2>
                <hr class="divider" />
            </div>
        <!-- Portfolio-->
            <div id="portfolio">
                <div class="container-fluid p-0">
                    <div class="row g-0">
                        <div class="col-lg-4 col-sm-6">
                            <a class="portfolio-box" title="Project Name">
                                <img class="img-fluid" src="assets/img/conseil2.png" width="500em" height="500em" alt="..." />
                                <div class="portfolio-box-caption">
                                    <div class="project-category text-white-50"></div>
                                    <div class="project-name">Conseil</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a class="portfolio-box" title="Project Name">
                                <img class="img-fluid" src="assets/img/beaute2.png" width="500em" height="500em" alt="..." />
                                <div class="portfolio-box-caption">
                                    <div class="project-category text-white-50"></div>
                                    <div class="project-name">Beauté</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a class="portfolio-box" title="Project Name">
                                <img class="img-fluid" src="assets/img/upcycling2.png" width="500em" height="500em" alt="..." />
                                <div class="portfolio-box-caption p-3">
                                    <div class="project-category text-white-50"></div>
                                    <div class="project-name">Upcycling</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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


        HTML;
        return $html;
    }
}