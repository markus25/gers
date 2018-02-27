<?php
require_once ("DataBase.php");
require_once ("dao.php");

class ListeUser {
    // Attributs privés
    private $liste;
    
    // Initialisation du constructeur
    public function ListeUser() {
        
    }
    
    public function getListe () {
        return $this -> liste;
    }
    
    public function loadListeByClasse ($cl){
        $db= new DataBaseAccess();
        $db->executeRequete("Select * from user where code_classe = '".$cl."' order by nom_user");
        while ($resu = $db->ligneResultat()){
            $user = new DAOUser();
            $user -> loadByID($resu['code_user']);
            $this->liste[]= $user;
        }
      } 
      
       public function loadListeUser (){
        $db= new DataBaseAccess();
        $db->executeRequete("Select * from user order by nom_user");
        while ($resu = $db->ligneResultat()){
            $user = new DAOUser();
            $user -> loadByID($resu['code_user']);
            $this->liste[]= $user;
        }
      } 
      
}

?>
