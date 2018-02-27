<?php

require_once ("DataBase.php");

class ListeMatiere {
    // Attibuts privés
    private $liste;
    private $classe;
    
    // Constructeur par défaut de la classe
    public function ListeMatiere (){
        
    }
    
    public function loadListeParClasse ($c){
        $this->classe = $c;
        $db = new DataBaseAccess();
        $db->executeRequete("select * from matiere where code_classe='".$c."'");
        while ($resu = $db->ligneResultat()){
             $mat= new DAOMatiere();
             $mat->loadByID($resu['code_mat']);
             $this->liste[] = $mat;
        }
    }
    
    public function getListe() {
        return $this->liste;
    }
    
    public function getClasse(){
        return $this->classe;
    }
}

?>
