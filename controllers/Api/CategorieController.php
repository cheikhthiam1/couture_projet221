<?php

namespace App\Controllers\Api;

use App\Core\Session;
use App\Models\Unite;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;
use App\Models\UniteCategorie;

class CategorieController extends Controller
{
    /**
     * lister Categorie
     *
     * @return mixed
     */
    public function index()
    {
        $this->JsonEncode(Categorie::all());
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

        Validator::isVide($data["libelle1"], "libelle");
        Validator::isVide($data["unitedefaut"], "unite_libelle");
        if (Validator::validate()) {

            try {
                $categorie = Categorie::create([
                    "libelle" => $data["libelle1"]
                ]);
                $unite = Unite::create([
                    "unite_libelle" => $data["unitedefaut"],
                    "conversion" => $data["conversion"]
                ]);
                UniteCategorie::create([
                    'idCategorie' => $categorie->id,
                    "idUnite" => $unite->id
                ]);
            } catch (\PDOException $th) {
                Validator::$errors['libelle'] = "le libelle existe deja";
                // die($th->getMessage());
            }
        }
    }
}
