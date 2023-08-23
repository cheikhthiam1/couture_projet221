<?php 
namespace App\Models;

use App\Core\Model;
use App\Models\Unite;
use App\Models\Categorie;
 
class UniteCategorie extends Model{
    public  int $id;
    public int $idCategorie;
    public int $idUnite;
 

     protected static function tableName(){
               return "unitecategorie";
      }

      //Many-to-One relationship
      public Categorie $categorieModel;
      public Unite $uniteModel;
     
      public function __construct($id) {
            $this->id = $id;

        $this->categorieModel = new Categorie();
        $this->uniteModel = new Unite(); 
     }

      // public  function categorie(){
      //   return $this->categorieModel-> find($this->articleConfId);
      // }
      
      // public function appro(){
      //   return $this->approModel-> find($this->approId);
      // }

      // public static function findDetailByAppro($approId){
      //    return parent::query("select * from ".  self::tableName() ." where approId=:approId  ",["approId"=>$approId]);
      // }
     
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
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    // public function getQteAppro()
    // {
    //     return $this->qteAppro;
    // }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
  

    /**
     * Get the value of prix
     */ 
    // public function getArticleConfId()
    // {
    //     return $this->categoConfId;
    // }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
 

    /**
     * Get the value of qteStock
     */ 
  
     public static function ajout_approarticleconfection_db(array $approArticle) {
      $bdd = parent::openConnexion();
      try {
          $sql = "INSERT INTO detail_appro_article_conf(qteAppro, articleConfId, approId) VALUES(:qteAppro, :articleConfId, :approId)";
          $stmt = $bdd->prepare($sql);
          $stmt->execute($approArticle);
          $bdd = null;
          return true;
      } catch (\Throwable $th) {
          return false;
      }
   }
}