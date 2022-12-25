<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {
        include "Utils/credentials.php"; // ou credentials.php
        //include "../../Utils/credentials.php"; marche pas
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // TODO faire les autres filters
    // peut être pas de barre de recherche donc pas de $name??
    public function getProduits($filter = "default", $type = "default", $name = "default" )
    {
      // Requête de base auquelle on ajoutera des conditions order by ou filtre
      $texte_req = 'SELECT * FROM Produit';

      // ------------------
      // $type
      // ------------------
      // default = tout
      // food = que confiseries/snacks
      // drink = que boissons : boisson, sirop, soda
      // autre = par exemple soda, affichage seuelement des sodas
      // lien sur les boutons de filtre va faire controller ... action .. et se baser sur le $_GET

      // food = que confiseries/snacks
      if ($type=="food"){
        $texte_req = $texte_req . " WHERE Categorie = 'Confiserie'";
      }

      // drink = que boissons : boisson, sirop, soda
      elseif ($type=="drink"){
        $texte_req = $texte_req . " WHERE Categorie = 'Boisson' or Categorie = 'Sirop' or Categorie = 'Soda'";
      }

      // autre = par exemple soda, affichage seuelement des sodas
      // problème éventuel : casse
      // solution : adapter les boutons de filtrage
      elseif ($type!="default"){
        $texte_req = $texte_req . " WHERE Categorie = '" . $type . "'";
      }

      // ------------------
      // $filter
      // -----------------
      if ($filter=="croissant"){
        $texte_req = $texte_req . " ORDER BY prix";
      }
      elseif ($filter=="decroissant"){
        $texte_req = $texte_req . " ORDER BY prix DESC";
      }

      $req = $this->bd->prepare($texte_req);
      $req->execute();
      return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduitsNouveau($limit)
    {
      $req = $this->bd->prepare('SELECT * FROM Produit ORDER BY date_ajout DESC LIMIT :limit');
      $req->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
      $req->execute();
      $reponse = [];
      while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
          $reponse[] = $ligne;
      }
      return $reponse;
    }

    public function getProduitsPopulaire($limit)
    {
      $req = $this->bd->prepare('SELECT * FROM Produit ORDER BY nb_ventes DESC LIMIT :limit');
      $req->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
      $req->execute();
      $reponse = [];
      while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
          $reponse[] = $ligne;
      }
      return $reponse;
    }

    public function getPrixProduit($id_prod)
    {
      $req = $this->bd->prepare('SELECT Prix FROM Produit WHERE :id_prod');
      $req->bindValue(':id_prod', $id_prod);
      $req->execute();
      return $req->fetch(PDO::FETCH_NUM)[0];
    }



}
