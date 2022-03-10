<?php

namespace custumbox\Vues;

class VueCreationBoite extends Vue{

    public function __construct($c, $rq){
        parent::__construct("", $c, $rq);
    }

    public function linkCss() : string {
        return '<link rel="stylesheet" href="css/boite.css" />';
    }

    public function createContent() : string{
        $html = <<<HTML
            <div class="choix">
                <div class="toolbar">
                  <div class="case beaute">
                    <img src="assets/img/categories/1.png">
                    <p>Les produit beauté</p>
                  </div>
            
                  <div class="case bijoux">
                    <img src="assets/img/categories/2.png">
                    <p>Les bijoux</p>
                  </div>
            
                  <div class="case decoration">
                    <img src="assets/img/categories/3.png">
                    <p>La décoration</p>
                  </div>
            
                  <div class="case produit_menager">
                    <img src="assets/img/categories/4.png">
                    <p>Les produit ménager</p>
                  </div>
            
                  <div class="case upcycling">
                    <img src="assets/img/categories/5.png">
                    <p>L'upcycling</p>
                  </div>
                </div>
            
                <div class="affichage">
                  <p id="textAffichage">Les choix possibles :</p>
                  <hr>
                  <div class="com"></div>
                </div>
            
              </div>
            
              <div class="commande">
                <p id="vcom">Votre commande :</p>
                <div class="box">
                <p class="textBox" style="margin-left: 30%">Placer sur ce text</p>
                </div>
              </div>
            
              <script>
              
                //important : post [taille de la boite]
                
                const commande = []
                commande.push("taille")
                
                const contenu = []
                
              
              
                const choix = document.querySelectorAll(".case")
                const com = document.querySelector(".com")
                const box = document.querySelector(".box")
                const textBox = document.querySelector(".textBox")
                
                let click = null
                
                function produit(nom, categorie, path) {
                    this.nom = nom
                    this.categorie = categorie
                    this.path = path
                }
                
                let p1 = []
                
                for (let i = 0; i < 10; i++) {
                    let j = i+1
                    p1.push(new produit(j, 1, "assets/img/produits/"+j+".jpg"))
                }
                p1.push(new produit(11, 2, "assets/img/produits/"+11+".jpg"))
                p1.push(new produit(12, 3, "assets/img/produits/"+12+".jpg"))
                p1.push(new produit(13, 4, "assets/img/produits/"+13+".jpg"))
                
                for (const a of choix) {
                    a.addEventListener('click', (e) => {
                        click = e
                        let categ = e.target.src
                        let a = categ.split("/")
                        a = a[a.length-1].split(".")
                        displayCategorie(a[0])
                    })
                }
                
                function displayCategorie(e) {
                    let a = e
                    com.innerHTML = " "
                    //let display = []
                    for (let i = 0; i < p1.length; i++) {
                        if (p1[i].categorie == a) {
                            /*
                            var div = document.createElement("div")
                            div.id = 'imageCateg'
                            div.draggable = 'true'
                            div.style.width = 8+"em"
                            div.style.height = 8+"em"
                            //div.style.backgroundImage = "url(" + p1[i].path + ")"
                            div.innerHTML += "<img src='" + p1[i].path+ "' id='" + p1[i].nom + "' draggable='true'>"
                            com.appendChild(div)
                            div.addEventListener("dragstart", gradStart)
                            div.addEventListener("dragend", gradEnd)
                            
                             */
                             var myImg = new Image(100, 100)
                             myImg.src = p1[i].path
                             myImg.id = 'imageCateg'
                             com.appendChild(myImg)
                             myImg.addEventListener("click", ajoutCommande)
                             
                            
                        }
                        
                    }
                    //console.log(display)
                }
                function ajoutCommande() {
                    
                }
                
              </script>
        HTML;
        return $html;
    }

    public function categorie() : int {
        return 0;
    }
}