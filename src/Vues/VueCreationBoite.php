<?php

namespace custumbox\Vues;

class VueCreationBoite extends Vue{
    public $categories = null;

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
                const poid = 0
                
              
              
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
                
                p1.push(new produit(1, 1, "assets/img/produits/"+1+".jpg"))
                p1.push(new produit(2, 1, "assets/img/produits/"+2+".jpg"))
                p1.push(new produit(3, 1, "assets/img/produits/"+3+".jpg"))
                p1.push(new produit(4, 2, "assets/img/produits/"+4+".jpg"))
                p1.push(new produit(5, 3, "assets/img/produits/"+5+".jpg"))
                p1.push(new produit(6, 4, "assets/img/produits/"+6+".jpg"))
                p1.push(new produit(7, 4, "assets/img/produits/"+7+".jpg"))
                p1.push(new produit(8, 4, "assets/img/produits/"+8+".jpg"))
                p1.push(new produit(9, 5, "assets/img/produits/"+9+".jpg"))
                p1.push(new produit(10, 5, "assets/img/produits/"+10+".jpg"))
                p1.push(new produit(11, 5, "assets/img/produits/"+11+".jpg"))
                p1.push(new produit(12, 5, "assets/img/produits/"+12+".jpg"))
                p1.push(new produit(13, 5, "assets/img/produits/"+13+".jpg"))
                
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
                             var myImg = new Image(100, 100)
                             myImg.src = p1[i].path
                             myImg.id = 'imageCateg'
                             com.appendChild(myImg)
                             myImg.addEventListener("click", ajoutCommande)
                             
                            
                        }
                        
                    }
                    //console.log(display)
                }
                function ajoutCommande(e) {
                    let categ = e.target.src
                    let a = categ.split("/")
                    a = a[a.length-1].split(".")
                    a = a[0]
                    
                    if (!contenu.includes(a) )
                        contenu.push(p1[a-1])
                        console.log(contenu)
                }
                
              </script>
        HTML;
        return $html;
    }

    public function categorie() : int {
        return 0;
    }
}