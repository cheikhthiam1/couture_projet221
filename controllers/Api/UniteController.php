<?php

namespace App\Controllers\Api;

use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;
use App\Models\Unite;

class UniteController extends Controller
{
    /**
     * lister Categorie
     *
     * @return mixed
     */
    public function index()
    {
        $this->JsonEncode(Unite::all());
    }




    // Instanciez le contrôleur


    // Traitez la requête pour obtenir les données JSON

    /**
     * charger le Formulaire de Categorie
     *
     * @return mixed
     */
    public function create()
    {
    }

    /**
     * Ajouter une  Categorie en BD apres 
     * soummition du formulaire
     *
     * @return mixed
     */
    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        Validator::isVide($data["libelle"], "libelle");
        if (Validator::validate()) {
            try {
                Unite::create([
                    "libelle" => $data["libelle"]
                ]);
            } catch (\PDOException $th) {
                Validator::$errors['libelle'] = "le libelle existe deja";
                // die($th->getMessage());
            }
        }
    }
}
