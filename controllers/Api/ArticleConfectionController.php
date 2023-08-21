<?php

namespace App\Controllers\Api;

use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\ArticleConfection;


class ArticleConfectionController extends Controller
{
 /**
  * lister Categorie
  *
  * @return mixed
  */
 public function index()
 {
  $datas = ArticleConfection::all();
  $this->JsonEncode($datas);
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
  Validator::isNumeric($data["prixAchat"], "prixAchat");
  // Validator::isNumeric($_POST["qteStock"],"qteStock");
  if (Validator::validate()) {
   try {
    ArticleConfection::create([
     "libelle" => $data["libelle"],
     "qteStock" => $data["qteStock"],
     "prixAchat" => $data["prixAchat"],
     "categorieId" => $data["categorieId"],
     "fournisseurId" => $data["fournisseurId"],
    ]);
   } catch (\PDOException $th) {
    Validator::$errors['libelle'] = "le libelle existe deja";
   }
   $this->redirect("article");
  } else {
   Session::set("errors", Validator::$errors);
   $this->redirect("article_add");
  }
 }
}
