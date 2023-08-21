<?php

use App\Core\Router;
use App\Controllers\Api\CategorieController;
use App\Controllers\Api\ArticleVenteController;
use App\Controllers\Api\ArticleConfectionController;
use App\Controllers\Api\FournisseurController;
use App\Controllers\Api\UniteController;

Router::route("/api/categorieadd", [CategorieController::class, 'store']);
Router::route("/api/categorie", [CategorieController::class, 'index']);
Router::route("/api/unite_add", [UniteController::class, 'store']);
Router::route("/api/unite", [UniteController::class, 'index']);
Router::route("/api/fournisseur_add", [FournisseurController::class, 'store']);
Router::route("/api/fournisseur", [FournisseurController::class, 'index']);
Router::route("/api/articlevente-getData", [ArticleVenteController::class, 'index']);
Router::route("/api/article", [ArticleConfectionController::class, 'index']);
Router::route("/api/article_add", [ArticleConfectionController::class, 'store']);
