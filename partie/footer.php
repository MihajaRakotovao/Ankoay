<section id="section11">
        
        <div id="contact">
            <div class="contactHaut">
                <div class="mail">
                    <div class="fonta"><i class="fa fa-envelope"></i></div>
                    <div>
                        <h1>Email</h1>
                        <p>tokyrakotovao6@gmail.com</p>
                    </div>
                </div>
                <div class="mail">
                    <div class="fonta"><i class="fa fa-tablet-alt"></i></div>
                    <div>
                        <h1>Contact</h1>
                        <p>+2613433180**</p>
                    </div>
                </div>
                <div class="mail">
                    <div class="fonta"><i class="fa fa-map-marked-alt"></i></div>
                    <div>
                        <h1>Address</h1>
                        <p>Tana, Analamanga, Madagascar,</p>
                    </div>
                </div>
            </div>
            <div class="contactBas">
                <div class="fontws">
                    <a href="apropos.php">A PROPOS</a>
                </div>
                <div class="fontws">
                    <a href="joueur.php">équipes</a>    
                </div>
                <div class="fontws">
                    <a href="competition.php">Compétitions</a>  
                </div>
                <div class="fontws">
                    <a href="galerie.php">Galerie</a>   
                </div>
                <?php 
                if (isset($_SESSION['pseudo'])) :
            ?>
                   <div class="fontws">
                    <a href="contact.php">Contact</a>   
                </div>     
        <?php 
        endif;
            ?>
                
            </div>
        </div>
    </section>
    <footer>
        <a href="espaceAdmin/connexion.php">🔳</a>
        <h3 class="text-white"> <span>Copyright 2024, Mhj-Rktv</span></h3>
    </footer>
