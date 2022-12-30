<?php

class Controller_set extends Controller{

  /*
  ===========================================================
                       AJOUT D'ELEMENT
  ===========================================================
  */

  // Affichage du formulaire
  public function action_form_add_produit(){
    // on récupère le Model
    $m = Model::getModel();

    $data = [
      "titre" => "Création d'un nouveau produit",
      "date_today" => date(y-m-d),
      "element_to_add" => produit
      ]; 

    $this->render("form_add", $data);
  }

  // Traitement du formulaire
  public function action_add(){
    // TODO: si quelqu'un peut s'occuper de faire les vérifications logiques des données avec isset
    // genre si c'est bien un int, c'est bien supérieur à 0 mais inférieur à truc etc
    

    $this->render("message", $data);
  }

  /*
  ===========================================================
                       SUPPRESSION D'ELEMENT
  ===========================================================
  */
  public function action_remove() {
    $m = Model::getModel();

    $data = [
      "title" => "Removing a Nobel Prize.",
      "message" => $message
    ];
    $this->render("message", $data);
  }

  public function action_form_update(){
    $in_database = false;
    if (isset($_GET["id"]) and preg_match("/^[1-9]\d*$/", $_GET["id"])) {
      $m = Model::getModel();
      $in_database = $m->isInDataBase($_GET["id"]);
    }

    if ($in_database) {
      // Récupération des informations du prix nobels
      $informations = $m->getNobelPrizeInformations($_GET["id"]);

      //Préparation de $data
      $data = [];
      foreach ($informations as $c => $v) {
        if ($v === null) {
          $data[$c] = "";
        } else {
          $data[$c] = $v;
        }
      }
      $data["categories"] = $m->getCategories();
      $this->render("form_update", $data);
    } else {
      $this->action_error("There is no Nobel Prize with such ID, it cannot be updated.");
    }
  }

  /*
  ===========================================================
                       MODIFICATION D'ELEMENT
  ===========================================================
  */
  public function action_update(){

    $in_database = false;

    if (isset($_POST["id"]) and preg_match("/^[1-9]\d*$/",$_POST["id"])
      and isset($_POST["name"]) and ! preg_match ("/^ *$/", $_POST["name"])
      and isset($_POST["category"]) and ! preg_match("/^ *$/", $_POST["category"])
      and isset($_POST["year"]) and preg_match("/^[12]\d{3}$/", $_POST["year"])) {
      $m = Model::getModel();
      $c_in_database = in_array($_POST["category"], $m->getCategories());
      $in_database = $c_in_database ? $m->isInDatabase($_POST["id"]) : false;
    }
    if ($in_database) {
      // Préparation $infos pour la mise à jour des informations du prix nobels
      $infos = [];
      $noms =  ["id", "year", "category", "name", "birthdate", "birthplace", "county", "motivation"];
      foreach ($noms as $v) {
        if (isset($_POST[$v]) and ! preg_match("/^ *$/", $_POST[$v])) {
          $infos[$v] = $_POST[$v];
        } else {
          $infos[$v] = null;
        }
      }
      $m->updateNobelPrize($infos);
      $message = "The informations of the Nobel Prize have been updated.";
    } else {
      $message = "There is no information to update.";
    }
    $data = [
      "title" => "Updating the Nobel Prize informations",
      "message" => $message
    ];
    $this->render("message", $data);
}

  public function action_default(){
    $this->action_form_add();
  }

}
?>
