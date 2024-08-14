<header>
    <div id="ensemble">
        <div id="box-up">
            <div id="left">
                <div id="leftnum"> 
                    <a href="" ><i class="fa fa-tablet-alt"></i> 034 33 180 **</a>
                </div>
                <div id="leftweb">
                    <a href="" ><i class="fa fa-envelope"></i> tokyrakotovao6@gmail.com</a>
                </div>
            </div>
            <div id="right">
                <div id="fontaReseaux">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-youtube"></i>
                </div>
                <div id="fontaLogin">
                <?php 
                            if (isset($_SESSION["pseudo"])) :
                        ?>
                        <a href="deconnexion.php" > deconnexion</a>
                        <a href="membre.php?pseudo=<?php echo $_SESSION['pseudo']; ?>"  ><?php echo $_SESSION['pseudo'] ?> </a>
                        
                        <img src="assets/photo/<?php echo $_SESSION["photo"] ?>" alt="" width="50px" height="50px" style="padding-bottom: 0px;">
                        
                        <?php 
                            else :
                        ?>
                        <a href="connexion.php" ><i class="fa fa-user"></i>  Connexion</a>
                        <a href="inscription.php" ><i class="fa fa-mug-hot"></i>  Inscription</a>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
            <!-- <div id="translate">
                <img src="assets/photo/img/1.png" alt="">
            </div> -->
        </div>
        <div class="box-nav">
            <div class="Logo">
                <div id="imgLogo"></div>
                <nav>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="apropos.php">à propos</a></li>
                        <li><a href="joueur.php">équipes</a></li>
                        <li><a href="competition.php">Compétitions</a></li>
                        <li><a href="galerie.php">Galerie</a></li>
                        <?php 
        if (isset($_SESSION['pseudo'])) :
            ?>
                        <li><a href="contact.php">Contact</a></li>
                        <?php 
        endif;
            ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

    