<?php

namespace App\Controllers;

use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\Categorie;
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
            // dd($datas);
            $this->view('article/liste', ["datas" => $datas]);
      }
      /**
       * charger le Formulaire de Categorie
       *
       * @return mixed
       */
      public function create()
      {
            $datas = Categorie::all();
            // dd($datas);
            ob_start();
            require "../public/ressources/views/article/add.html.php";
            $content_for_view = ob_get_clean();
            require "../public/ressources/views/base.layout.html.php";
      }

      /**
       * Ajouter une  Categorie en BD apres 
       * soummition du formulaire
       *
       * @return mixed
       */
      public function store()
      {
            dd($_POST);
            Validator::isVide($_POST["libelle"], "libelle");
            Validator::isNumeric($_POST["prixAchat"], "prixAchat");
            // Validator::isNumeric($_POST["qteStock"],"qteStock");
            if (Validator::validate()) {
                  try {
                        ArticleConfection::create([
                              "libelle" => $_POST["libelle"],
                              "prixAchat" => $_POST["prixAchat"],
                              "qteStock" => $_POST["qteStock"],
                              "categorieId" => $_POST["categorieId"],
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
