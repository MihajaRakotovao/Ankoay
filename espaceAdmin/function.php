<?php
function connexion(){
    if (isset($_POST['connexion'])) {
        if (!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
            $pseudo = 'admin';
            $password = '123456';
            $erreurs=array();
            $pseudo_insert = htmlspecialchars($_POST['pseudo']);
            $password_insert = htmlspecialchars($_POST['password']);
            if ($pseudo == $pseudo_insert && $password==$password_insert) {
                $_SESSION['password']= $password_insert;
                header('location:indexA.php');
            }else {
                $erreurs [] = 'identifiant incorrect';
            }
        }else {
            $erreurs[]='completer bien les champs';
        }
    }
    return $erreurs;
}
function poster(){
    global $db;
    $titre = htmlentities($_POST['titre']);
    $contenu = htmlentities($_POST['contenu']);
    $fichier = $_FILES['file'];
    $validation = true; 
    $erreurs = array();
    if (empty($titre) || empty($contenu))  {
        //  )
        $validation = false;
        $erreurs[] = "Tous les champs sont obligatoires";
    }
    if (!isset($_FILES["file"]) && $_FILES["file"]["error"]== 0 ) {
        $validation = false;
        $erreurs[]= "Il faut indiquer un fichier";
    }
    if ($validation) {
        $image = basename($_FILES['file']['name']);
        move_uploaded_file($_FILES["file"]["tmp_name"], '../assets/photo/' .$image);
        $poster = $db->prepare("INSERT INTO articles(titre,  descri, photo) VALUES (:titre, :descri, :photo)");
        $poster->execute([
            "titre" => $titre,
            "descri" => nl2br($contenu),
            "photo" => $image
            
        ]); 
        unset($_POST['titre']);
        unset($_POST['descri']);
        unset($_POST['contenu']);
        header('location:article_Ad.php');
    }
    return $erreurs;
}
function nouveau_events(){
    global $db;
    $titre = htmlentities($_POST['titre']);
    $descri = htmlentities($_POST['descri']);
    $date = htmlentities($_POST['date']);
    $lieu = htmlentities($_POST['lieu']);
    $fichier = $_FILES['file'];
    $fichier2 = $_FILES['file2'];
    $validation = true; 
    $erreurs = array();
    if (empty($titre) || empty($date) || empty($descri) || empty($lieu))  {
        $validation = false;
        $erreurs[] = "Tous les champs sont obligatoires";
    }
    if (!isset($_FILES["file"]) && $_FILES["file"]["error"]== 0 ) {
        $validation = false;
        $erreurs[]= "Il faut indiquer un fichier";
    }
    if (!isset($_FILES["file2"]) && $_FILES["file2"]["error"]== 0 ) {
        $validation = false;
        $erreurs[]= "Il faut indiquer un fichier";
    }
    if ($validation) {
        $image = basename($_FILES['file']['name']);
        $image2 = basename($_FILES['file2']['name']);
        move_uploaded_file($_FILES["file"]["tmp_name"], '../assets/photo/' .$image);
        move_uploaded_file($_FILES["file"]["tmp_name"], '../assets/photo/' .$image2);
        $poster = $db->prepare("INSERT INTO evenement(titre,  descri, photo, date_events, lieu, equipe2) VALUES (:titre, :descri, :photo, :date_events, :lieu, :equipe2)");
        $poster->execute([
            "titre" => $titre,
            "descri" => nl2br($descri),
            "photo" => $image,
            "date_events" => nl2br($date),
            "lieu" => nl2br($lieu),
            "equipe2" => $image2
            
        ]); 
        unset($_POST['titre']);
        unset($_POST['descri']);
        unset($_POST['date']);
        unset($_POST['lieu']);
        header('location:evenement.php');
    }
    return $erreurs;
}
function nouveauJoueur(){
    global $db;
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $sexe = htmlentities($_POST['sexe']);
    $date = htmlentities($_POST['date']);
    $age = htmlentities($_POST['age']);
    $taille = htmlentities($_POST['taille']);
    $club = htmlentities($_POST['club']);
    $competition = htmlentities($_POST['competition']);
    $categorie = htmlentities($_POST['categorie']);
    $poste = htmlentities($_POST['poste']);
    $fichier = $_FILES['file'];
    $validation = true; 
    $erreurs = array();
    if (empty($nom) || empty($prenom) || empty($sexe) || empty($date) || empty($age) || empty($taille) || empty($club) || empty($competition) || empty($categorie) || empty($poste))  {
        $validation = false;
        $erreurs[] = "Tous les champs sont obligatoires";
    }
    if (!isset($_FILES["file"]) && $_FILES["file"]["error"]== 0 ) {
        $validation = false;
        $erreurs[]= "Il faut indiquer un fichier";
    }
    if ($validation) {
        $image = basename($_FILES['file']['name']);
        move_uploaded_file($_FILES["file"]["tmp_name"], '../assets/photo/' .$image);
        $poster = $db->prepare("INSERT INTO joueurs(nom,  prenom, date_naissance, age, poste, taille, Categorie, sexe, club, competition , photo) VALUES (:nom, :prenom, :date_naissance, :age, :poste, :taille, :Categorie, :sexe, :club, :competition , :photo)");
        $poster->execute([
            "nom" => $nom,
            "prenom" => nl2br($prenom),
            "date_naissance" => nl2br($date),
            "age" => nl2br($age),
            "poste" => nl2br($poste),
            "taille" => nl2br($taille),
            "Categorie" => nl2br($categorie),
            "sexe" => nl2br($sexe),
            "club" => nl2br($club),
            "competition" => nl2br($competition),
            "photo" => $image
            
        ]); 
        unset($_POST['nom']);
        unset($_POST['prenom, date_naissance, age, poste, taille, Categorie, sexe, club, competition ']);
        unset($_POST['contenu']);
        header('location:joueur.php');
    }
    return $erreurs;
}
function posts(){
    global $db;
    $posts = $db->query("SELECT id, titre, photo FROM articles ORDER BY id DESC");
    $posts = $posts->fetchAll();
    return $posts;
}
function evenement_Ad(){
    global $db;
    $posts = $db->query("SELECT id, descri, photo, date_events FROM evenement ORDER BY id DESC");
    $posts = $posts->fetchAll();
    return $posts;
}
function joueurAd(){
    global $db;
    $posts = $db->query("SELECT id, nom, prenom, photo FROM joueurs ORDER BY id DESC");
    $posts = $posts->fetchAll();
    return $posts;
}
function utilisateur(){
    global $db;
    $posts = $db->query("SELECT id, Pseudo,Email, Photo FROM utilisateur ORDER BY id DESC");
    $posts = $posts->fetchAll();
    return $posts;
}
function publier(){
    global $db;
    $id = (int)$_GET['id'];
    $post = $db->prepare("SELECT titre, descri, photo FROM articles WHERE id = ?");
    $post->execute([$id]);
    $post = $post->fetch();
    return $post;
}
function get_categories() {
    global $db;
    $query = "SELECT * FROM categorie";
    $requete = $db->query($query);		
    $categories = $requete->fetchAll();
    return $categories; 
}
function get_poste() {
    global $db;
    $query = "SELECT * FROM poste_joueurs";
    $requete = $db->query($query);		
    $poste = $requete->fetchAll();
    return $poste; 
}
function get_sexe() {
    global $db;
    $query = "SELECT * FROM sexe";
    $requete = $db->query($query);		
    $sexe = $requete->fetchAll();
    return $sexe; 
}
function publier_joueur(){
    global $db;
    $id = (int)$_GET['id'];
    $post = $db->prepare("SELECT nom, prenom, photo FROM joueurs WHERE id = ?");
    $post->execute([$id]);
    $post = $post->fetch();
    return $post;
}
function publier_events(){
    global $db;
    $id = (int)$_GET['id'];
    $post = $db->prepare("SELECT titre, descri,date_events, lieu, photo,equipe2 FROM evenement WHERE id = ?");
    $post->execute([$id]);
    $post = $post->fetch();
    return $post;
}
function supprimer(){
    global $db;
    $id = (int)$_GET['id'];
    $image = $db->prepare("SELECT photo FROM articles WHERE id = ?");
    $image->execute([$id]);
    $image = $image->fetch()["photo"];
    unlink('../assets/photo/' . $image);
    $supprimer = $db->prepare("DELETE FROM articles WHERE id = ?");
    $supprimer->execute([$id]);

    header('location: article_Ad.php');

}
function supprimer_joueur(){
    global $db;
    $id = (int)$_GET['id'];
    $image = $db->prepare("SELECT photo FROM joueurs WHERE id = ?");
    $image->execute([$id]);
    $image = $image->fetch()["photo"];
    unlink('../assets/photo/' . $image);
    $supprimer = $db->prepare("DELETE FROM joueurs WHERE id = ?");
    $supprimer->execute([$id]);

    header('location: joueur.php');

}
function modifier(){
    global $db;
    $erreurs = "";
    $titre = $_POST["titre"];
    $contenu = $_POST['contenu'];
    $fichier = $_FILES['fichier'];
    $id = (int)$_GET['id'];
    if (!empty($titre) AND !empty($contenu)) {
        $image = basename($_FILES['fichier']['name']);
        move_uploaded_file($_FILES["fichier"]["tmp_name"], '../assets/photo/' . $image);
        $modifier = $db->prepare("UPDATE articles SET titre = :titre, descri = :descri, photo = :photo WHERE id = :id");
        $modifier->execute([
            "titre" => htmlentities($titre),
            "descri" => nl2br(htmlentities($contenu)),
            "photo" => $image,
            "id" => $id
        ]);
        header('location: article_Ad.php');
    }
    else 
        $erreurs .= "Les champs doivent contenir quelque chose";
    return $erreurs;
}
function modifier_events(){
    global $db;
    $erreurs = "";
    $titre = $_POST["titre"];
    $descri = $_POST['descri'];
    $date = $_POST['date'];
    $lieu = $_POST['lieu'];
    $fichier = $_FILES['fichier'];
    $fichier2 = $_FILES['fichier2'];
    $id = (int)$_GET['id'];
    if (!empty($titre) AND !empty($descri) AND !empty($date) AND !empty($lieu)) {
        $image = basename($_FILES['fichier']['name']);
        $image2 = basename($_FILES['fichier2']['name']);
        move_uploaded_file($_FILES["fichier"]["tmp_name"], '../assets/photo/' . $image);
        move_uploaded_file($_FILES["fichier2"]["tmp_name"], '../assets/photo/' . $image2);
        $modifier = $db->prepare("UPDATE evenement SET titre = :titre, descri = :descri, date_events = :date_events, lieu = :lieu, descri = :descri, photo = :photo, equipe2 = :equipe2 WHERE id = :id");
        $modifier->execute([
            "titre" => htmlentities($titre),
            "descri" => nl2br(htmlentities($descri)),
            "date_events" => nl2br(htmlentities($date)),
            "lieu" => nl2br(htmlentities($lieu)),
            "photo" => $image,
            "equipe2" => $image2,
            "id" => $id
        ]);
        header('location: evenement.php');
    }
    else 
        $erreurs .= "Les champs doivent contenir quelque chose";
    return $erreurs;
}
function modifier_Joueur(){
    global $db;
    $erreurs = "";
    $titre = $_POST["nom"];
    $contenu = $_POST['prenom'];
    $fichier = $_FILES['fichier'];
    $id = (int)$_GET['id'];
    if (!empty($titre) AND !empty($contenu)) {
        $image = basename($_FILES['fichier']['name']);
        move_uploaded_file($_FILES["fichier"]["tmp_name"], '../assets/photo/' . $image);
        $modifier = $db->prepare("UPDATE joueurs SET nom = :nom, prenom = :prenom, photo = :photo WHERE id = :id");
        $modifier->execute([
            "nom" => htmlentities($titre),
            "prenom" => nl2br(htmlentities($contenu)),
            "photo" => $image,
            "id" => $id
        ]);
        header('location:joueur.php');
    }
    else 
        $erreurs .= "Les champs doivent contenir quelque chose";
    return $erreurs;
}
function message(){
    global $db;
    $id_article = intval($_GET['id']);
    $comments = $db->prepare("SELECT commentaire.*,membre.* FROM commentaire INNER JOIN membre ON commentaire.id_membre = membre.id AND commentaire.id_article = ?");
    $comments->execute(array($id_article));
    $commentaire = $comments->fetchAll();
    return $commentaire;
}
function commentaires_membre(){
    global $db;
    $id_membre = $_SESSION['id'];
    $commentaires = $db->prepare('SELECT commentaire.*,articles.titre FROM commentaire INNER JOIN articles ON commentaire.id_article = articles.id AND commentaire.id_membre =?');
    $commentaires->execute(array($id_membre));
    $commentaires2 = $commentaires->fetchAll();
    return $commentaires2; 
}
