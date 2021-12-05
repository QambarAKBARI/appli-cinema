<?php

namespace App\Model\Manager;
use App\Service\AbstractManager;

class FilmManager extends AbstractManager
{
    public function __construct()
    {
        parent::connect();
    }
    /**
     * Retourne tous les produits de la base de données
     * 
     * @return array|false 
     * Renvoie un tableau contenant les produits sous forme de tableau, 
     * un tableau vide si aucun produit n'est présent en base
     * ou FALSE si la requète a échoué
     */
    public function findAll()
    {
        return $this->getResults(
            "Film",
            "SELECT * FROM film ORDER BY dateSortie DESC"
        );
    }

    public function findOneById($id){
        return $this->getOneOrNullResult(
            "Film",
            "SELECT * FROM film WHERE id = :id",
            [
                "id" => $id
            ]
        );
    }
}