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
  Validator::isNumeric($data["prix"], "prixAchat");

  if (Validator::validate()) {
   try {
    $imagePath = ""; // Placeholder for image path or filename

    // Handle image upload
    if (isset($_FILES['image'])) {
     $uploadDir = 'image/uploaded_images/';
     $imageName = $_FILES['image']['name'];
     $imagePath = $uploadDir . $imageName;
     move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    ArticleConfection::create([
     "libelle" => $data["libelle2"],
     "qteStock" => $data["quantite"],
     "prixAchat" => $data["prix"],
     "photo" => $imagePath,
     "reference" => $data["reference"],
     "idCategorie" => $data["categorieSelect"],
     "idFournisseur" => $data["fournisseur"]
    ]);
   } catch (\PDOException $th) {
    Validator::$errors['libelle'] = "le libelle existe deja";
   }
  }
 }
}
