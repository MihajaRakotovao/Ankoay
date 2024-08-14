<?php
function joueur(){
    global $db;
    $poste = $db->prepare("SELECT j.id, j.nom, j.prenom, j.photo, j.age, j.taille, j.sexe, pj.Nom_Poste, j.Categorie FROM joueurs j left join poste_joueurs pj on j.poste = pj.id left join sexe s on s.id = j.sexe join categorie c on c.id = j.Categorie;");
    $poste->execute();
    $pers = $poste->fetchAll();
    $staff = $db->prepare("SELECT * FROM staff s join statut_staff st on s.Statut = st.id ");
    $staff->execute();
    $pers2 = $staff->fetchAll();
    return ['pers'=>$pers,'pers2'=>$pers2];
}
function joueurD(){
    global $db;
    $fond = $db->query("SELECT * FROM joueurs ORDER BY id DESC");
    $pers = $fond->fetchAll();
    return $pers;;
}
function staffD(){
    global $db;
    $fond2 = $db->query("SELECT * FROM staff ORDER BY id DESC");
    $pers2 = $fond2->fetchAll();
    return $pers2;
}
function video(){
    global $db;
    $fond = $db->query("SELECT * FROM video ORDER BY id DESC");
    $pers = $fond->fetchAll();
    return $pers;
}
function articles(){
    global $db;
    $fond = $db->query("SELECT * FROM articles ORDER BY id DESC");
    $pers = $fond->fetchAll();
    return $pers;
}
function articleD(){
    global $db;
    $fond = $db->query("SELECT * FROM articles ORDER BY id DESC LIMIT 2");
    $pers = $fond->fetchAll();
    return $pers;
}

function article_Last(){
    global $db;
    $fond = $db->query("SELECT * FROM articles ORDER BY id DESC LIMIT 1");
    $pers = $fond->fetch();
    return $pers;
}
function article_detail(){
    global $db;
    $id = intval($_GET['id']);
    $entana = $db->prepare("SELECT * FROM articles WHERE id = ?");
    $entana->execute(array($id));
    $article = $entana->fetch();
    if(empty($article))
        header("Location : index.php");
    else
        return $article;
}
function video_detail(){
    global $db;
    $id = intval($_GET['id']);
    $entana = $db->prepare("SELECT * FROM video WHERE id = ?");
    $entana->execute(array($id));
    $article = $entana->fetch();
    if(empty($article))
        header("Location : index.php");
    else
        return $article;
}
function equipe_detail(){
    global $db;
    $id = intval($_GET['id']);
    $entana = $db->prepare("SELECT * FROM joueurs WHERE id = ?");
    $entana->execute(array($id));
    $article = $entana->fetch();
    if(empty($article))
        header("Location : index.php");
    else
        return $article;
}

function evenementD(){
    global $db;
    $events = $db->query("SELECT * FROM evenement ORDER BY id ASC LIMIT 1");
    $Eve = $events->fetch();
    return $Eve;
}
function evenement(){
    global $db;
    $events = $db->query("SELECT * FROM evenement ORDER BY id DESC ");
    $Eve = $events->fetchAll();
    return $Eve;
}
function evenement_Ancien(){
    global $db;
    $events = $db->query("SELECT * FROM evenement ORDER BY id ASC LIMIT 1");
    $Eve = $events->fetch();
    return $Eve;
}

function galerie(){
    global $db;
    $compete = $db->query("SELECT * FROM galerie ORDER BY id DESC");
    $Eve = $compete->fetchAll();
    return $Eve;
}
function galerieL(){
    global $db;
    $compete = $db->query("SELECT * FROM galerie ORDER BY id ASC LIMIT 4");
    $Eve = $compete->fetchAll();
    return $Eve;
}
function nb_commentaires(){
    global $db;
    if (isset($_GET['id'])) {
        $id_article = intval($_GET['id']);
        $isa = $db->prepare("SELECT COUNT(*) FROM commentaire WHERE id_article = ?");
        $isa->execute(array($id_article));
        $nb_commentaires = $isa->fetch()['0'];
        return $nb_commentaires;
    }
}
function message(){
    global $db;
        $id_article = intval($_GET['id']);
        $comments = $db->prepare("SELECT commentaire.*,utilisateur.* FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id AND commentaire.id_article = ?");
        $comments->execute(array($id_article));
        $commentaire = $comments->fetchAll();
        return $commentaire;
}
function contact(){
    $nom= htmlentities($_POST['nom']);
    $adress= htmlentities($_POST['email']);
    $texte= htmlentities($_POST['texte']);
    $validation = true;
    $erreurs= array();
    if (empty($nom) && empty($adress) && empty($texte)) {
        $validation = false;
        $erreurs[] ="tous les champ sont obligatoires";
    }
    if (!filter_var($adress, FILTER_VALIDATE_EMAIL)) {
        $validation = false;
        $erreurs[] = "L'adresse e-mail n'est pas valide";
    }
    if ($validation) {//validation == true
        $to = "Ankoay@gmail.com";
        $sujet = 'nouveau message de ' . $nom;
        $message = '
        <h1>Nouveau message de ' . $nom .'</h1>
        <h2>Adress e-mail : ' . $adress . '</h2>
        <p>' . nl2br($texte) . '</p>';//nl2br est une retour a la ligne
        $headers = 'from ' . $nom .'<' . $adress . '>' . "\r\n";//midik f mila manw a la ligne ana headers tsik zay no dikan io
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .=  'Content-type: text/html; charset=utf-8'. "\r\n";
        mail($to, $sujet, $message, $headers);
        unset($_POST["nom"]);
        unset($_POST["email"]);
        unset($_POST["texte"]);
    }
    return $erreurs;
}
function inscrire(){
    global $db;
    $erreur = array();
    $validation = false;
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['email']);
    $mail2 = htmlspecialchars($_POST['emailconf']);
    $password = $_POST['password'];
    $password2 = $_POST['passwordconf'];
    if (!empty($pseudo) && !empty($mail) && !empty($mail2) && !empty($password) && !empty($password2)) {
        $pseudostr = strlen($pseudo);
        if ($pseudostr <= 20) {
            $pseudoexist = $db->prepare('SELECT Pseudo FROM utilisateur WHERE Pseudo=?');
            $pseudoexist->execute(array($pseudo));
            $existpseudo = $pseudoexist->rowCount();
            if ($existpseudo == 0) {
                if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0 ){
                    if ($password == $password2) {
                        if ($mail == $mail2) {
                            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                $validation = true;
                            }else {
                                $validation = false;
                                $erreur[]="Votre email est incorrect";
                            }
                        }else {
                            $validation = false;
                            $erreur[]="Votre email ne sont pas identiques !";

                        }
                    }else {
                        $validation = false;
                        $erreur[]="Votre mots de passe ne sont pas identiques !";

                    }
                }else {
                    $validation = false;
                    $erreur[]="Veuillez indiquer un fichier!";
                }
            }else {
                $validation = false;
                $erreur[]="Le Pseudo est deja inscrit !";
            }
        }else {
            $validation = false;
            $erreur[]="Votre pseudo est trop long !";
        }
    }else {
        $validation = false;
        $erreur[]="Veuillez remplir tous les champs svp !";
    }
    if ($validation) {
        $image = basename($_FILES["fichier"]["name"]);
        move_uploaded_file($_FILES["fichier"]["tmp_name"], 'assets/photo/' . $image);
        $valide = $db->prepare('INSERT INTO utilisateur(Pseudo, Email, mdp, Photo ) VALUES (:Pseudo, :Email, :mdp, :Photo )');
        $valide->execute(array(
            'Pseudo'=>$pseudo,
            'Email'=>$mail,
            'mdp'=>sha1($password),
            'Photo'=>$image
        ));
        unset($_POST["pseudo"]);
        unset($_POST["email"]);
        unset($_POST["emailconf"]);
    }
    return $erreur;
}
function connexion(){
    global $db;
    $erreur = array();
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = sha1($_POST['password']);
    if (!empty($pseudo)) {
        $exist = $db->prepare('SELECT * FROM utilisateur WHERE Pseudo =?');
        $exist->execute(array($pseudo));
        $existes = $exist->rowCount();
        if ($existes !=0) {
            $reponse =$exist->fetch();
            // var_dump($reponse['password']);
            $_SESSION['password']= $reponse['mdp'];
            if ($_SESSION['password'] == $password) {
                $_SESSION['id']=(int)$reponse['id'];
                $_SESSION['pseudo']=$reponse['Pseudo'];
                $_SESSION['mail']=$reponse['Email'];
                $_SESSION['photo']=$reponse['Photo'];
                header('Location:membre.php');
            }else {
                $erreur[]= "Votre Mot de pass est incorrect";
            }
        }else {
            $erreur[]= "Votre identifiant est invalide";
        }
    }else {
        $erreur[]= "Veuillez remplir le formulaire";
    }
    return $erreur;
}
function deconnexion(){
    unset($_SESSION['id']);
    unset($_SESSION['pseudo']);
    unset($_SESSION['mail']);
    unset($_SESSION['photo']);
    unset($_SESSION['password']);
    session_destroy();
    header("Location: connexion.php");
}
function commentaires_membre(){
    global $db;
    $id_membre = $_SESSION['id'];
    $commentaires = $db->prepare('SELECT commentaire.*,articles.titre FROM commentaire INNER JOIN articles ON commentaire.id_article = articles.id AND commentaire.id_utilisateur =?');
    $commentaires->execute(array($id_membre));
    $commentaires2 = $commentaires->fetchAll();
    return $commentaires2; 
}
function commenter(){
    if (isset($_SESSION["pseudo"])) {
        global $db;
        $erreur ="";
        $commenter= htmlentities($_POST['commentaire']);
        if (!empty($commenter)) {
            // var_dump($commenter);
            $id_article= intval($_GET['id']);
            $miresaka = $db->prepare("INSERT INTO commentaire(id_utilisateur, id_article, coms) VALUES(:id_utilisateur, :id_article, :coms)");
            $miresaka->execute(array(
                "id_utilisateur"=> $_SESSION['id'], 
                "id_article" => $id_article, 
                "coms" => nl2br($commenter)
            ));
            header("location:membre.php");
        }
        else{
            $erreur .= "Vous devez écrire du texte";
        }
        return $erreur;
    }
}