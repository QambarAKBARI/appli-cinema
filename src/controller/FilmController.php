<?php

namespace App\Controller;

use App\Model\Manager\FilmManager;

class FilmController extends AbstractController
{    
    //?ctrl=store&action=index
    public function index()
    {
        $fmanager = new FilmManager();
        $films = $fmanager->findAll();
        
        return $this->render("film/home.php", [
            "films" => $films
        ]);
    }

    public function voir($id) {
        $fmanager = new FilmManager();
        $film = $fmanager->findOneById($id);

        return $this->render("film/voir.php",[
            "film" => $film
        ]);
    }
}