<?php

namespace App\Controller;

use App\Model\Manager\RealisateurManager;

class RealisateurController extends AbstractController
{
    //?ctrl=store&action=index
    public function index()
    {
        $rmanager = new RealisateurManager();
        $realisateurs = $rmanager->findAll();
        
        return $this->render("film/home.php", [
            "realisateurs" => $realisateurs
        ]);
    }

    public function voir($id) {
        $rmanager = new RealisateurManager();
        $realisateur = $rmanager->findOneById($id);

        return $this->render("film/voir.php",[
            "realisateur" => $realisateur
        ]);
    }
}