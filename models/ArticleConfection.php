<?php

namespace App\Models;

use App\Core\Model;

class ArticleConfection extends Model
{
    public int $id;
    public string $libelle;
    public int $prixAchat;
    public int $qteStock;
    public string|null $photo;
    protected static function tableName()
    {
        return "articleconfection";
    }
    //Cle etrangere
    public int $categorieId;
    private  Categorie $categorieModel;

    public int $fournisseurId;
    private  Fournisseur $fournisseurModel;
    public function __construct()
    {
        $this->categorieModel = new Categorie();
        $this->fournisseurModel = new Fournisseur();
    }

    //Navigabite   ManyToOne
    public function categorie()
    {
        return  $this->categorieModel->find($this->categorieId);
    }
    public function fournisseur()
    {
        return  $this->fournisseurModel->find($this->fournisseurId);
    }
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
        $this->id = $id;

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

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prixAchat;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setPrix($prix)
    {
        $this->prixAchat = $prix;

        return $this;
    }

    /**
     * Get the value of qteStock
     */
    public function getQteStock()
    {
        return $this->qteStock;
    }

    /**
     * Set the value of qteStock
     *
     * @return  self
     */
    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /* public function create(){
            
        }*/
}
