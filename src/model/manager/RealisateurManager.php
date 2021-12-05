<?php

namespace App\Model\Manager;

use App\Service\AbstractManager;

class RealisateurManager extends AbstractManager
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
            "Realisateur",
            "SELECT * FROM realisateur ORDER BY dateNaissance DESC"
        );
    }

    public function findOneById($id){
        return $this->getOneOrNullResult(
            "Realisateur",
            "SELECT * FROM realisateur WHERE id = :id",
            [
                "id" => $id
            ]
        );
    }
}