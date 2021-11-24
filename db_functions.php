<?php
    function connexion(){
        return new \PDO(
            "mysql:dbname=cinema;host=localhost:3306",
            "root",
            "",
            [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ]
        );
    }



    function findAllFilm(){
        $db = connexion();
        $sql = "SELECT id_film, titre, duree, date_sortie, synopsis, note, nom_realisateur, r.id_realisateur
                FROM film f
                INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }


    function findOneById($id){
        $db = connexion();

        $sql = "SELECT id_film, titre, duree, date_sortie, synopsis, note, nom_realisateur, r.id_realisateur
        FROM film f
        INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
        WHERE id_film = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }


    function findOneRealisateur($id){
        $db = connexion();

        $sql = "SELECT nom_realisateur, prenom_realisateur, sexe, date_naissance
                FROM realisateur 
                WHERE id_realisateur = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }



    function findMoviesRealisateur($id){
        $db = connexion();

        $sql = "SELECT nom_realisateur, prenom_realisateur, titre, id_film
                FROM film f
                INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
                WHERE r.id_realisateur = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }



    function findMoviesActeurs($id){
        $db = connexion();

        $sql = "SELECT nom_acteur, prenom_acteur, sexe, date_naissance, nom_role,r.id_role AS id_role, titre, a.id_acteur AS id_acteur, f.id_film AS id_film
                FROM casting c 
                INNER JOIN acteur a ON a.id_acteur = c.id_acteur
                INNER JOIN film f ON f.id_film = c.id_film
                INNER JOIN role r ON r.id_role = c.id_role
                WHERE a.id_acteur = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findActeursByRole($id){
        $db = connexion();

        $sql = "SELECT CONCAT(nom_acteur, ' ', prenom_acteur) AS acteur, sexe, date_naissance, titre, nom_role, f.id_film AS id_film, a.id_acteur AS id_acteur
                FROM casting c 
                INNER JOIN acteur a ON a.id_acteur = c.id_acteur
                INNER JOIN film f ON f.id_film = c.id_film
                INNER JOIN role r ON r.id_role = c.id_role
                WHERE r.id_role = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function MoviesActeurs($id){
        $db = connexion();

        $sql = "SELECT nom_acteur, prenom_acteur, a.id_acteur AS id_acteur
                FROM casting c
                INNER JOIN acteur a ON a.id_acteur = c.id_acteur
                INNER JOIN film f ON f.id_film = c.id_film
                WHERE f.id_film = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    function findAllActeurs(){
        $db = connexion();
        $sql = "SELECT id_acteur, CONCAT(nom_acteur, ' ', prenom_acteur) AS acteur
                FROM acteur";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }

    function findAllRealisateurs(){
        $db = connexion();
        $sql = "SELECT id_realisateur, CONCAT(nom_realisateur, ' ', prenom_realisateur) AS realisateur
        FROM realisateur";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }

    function findAllRoles(){
        $db = connexion();
        $sql = "SELECT * FROM role";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }

    function findAllGenres(){
        $db = connexion();
        $sql = "SELECT * FROM genre";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }

    function findMoviesByGenre($id){
        $db = connexion();

        $sql = "SELECT nom_genre , titre, f.id_film AS id_film
                FROM genre_film g
                INNER JOIN film f ON f.id_film = g.id_film
                INNER JOIN genre gen ON gen.id_genre = g.id_genre
                WHERE gen.id_genre = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

