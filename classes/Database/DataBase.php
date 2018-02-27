<?php
 class DataBaseAccess {
     
     // Attribut pour récupérer le résultat d'une enquête
     private $resultat;
     
     function DataBaseAccess() {
         mysql_connect("localhost","adminUser","Aston");
         mysql_select_db("mygers");
     }
     
     public function executeRequete($chaine){
         $this->resultat = mysql_query($chaine);
     }
     
     public function ligneResultat(){
         return mysql_fetch_assoc($this->resultat);
     }
     
     public function nombreLignesTrouvees(){
         return mysql_num_rows($this->resultat);
     }
     
     public function DataBaseAccess_toString(){
         echo ("Classe DtaBaseAccess- fichier DataBase.php");
     }
        
 }
?>
