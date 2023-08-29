<?php

/**
 * A-Convention sur les Classe
 * 1-Nom Classe PascalCase   Exemple : MaClasse  CategorieModel
 * 2-Les classes portent le meme nom que le fichier
 * 
 *    
 */

namespace App\Models;

use App\Core\Model;

class Categorie extends Model
{
  //Attributs   ==> Donnees ou informations
  //Convention 
  //1-camelCase  ==> Exemple: monAttribut
  //Formalisme
  //[visibilite(private(-)|public(+)|protected(#)) ] type(php 8>) $attribut
  public int $id;
  public string $libelle;




  protected static function tableName()
  {
    return "categorie";
  }
  //Methodes   ==> Fonctions 
  //Convention 
  //1-camelCase  ==>  maFonction(arg)
  //Formalisme
  //[visibilite(private(-)|public(+)|protected(#)) ] fonction nomFonction($arg):type

  //Encapsulation
  /**
   * 1-attribut les mettre a private
   * 2-methodes les mettre a public 
   * 3-Chaque attribut est associe a 2 methodes (getters et setters)
   *    //getter permet d'obtenir la valeur de l'attribut ==> fonction
   *   //setter permet de modifier la valeur de l'attribut ==> procedure
   *      
   */




  /* 

      
         /**
          * Get the value of id
          */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    if ($id > 0) {
      $this->id = $id;
    }
    //$this->id = $id;

    return $this;
  }

  /**
   * Get the value of libelle
   */
  public function getLibelle()
  {
    return $this->libelle;
  }

  /**
   * Set the value of libelle
   *
   * @return  self
   */
  public function setLibelle($libelle)
  {
    $this->libelle = $libelle;

    return $this;
  }
}
