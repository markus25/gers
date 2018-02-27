<?php

require_once ("DataBase.php");

class LigneBulletin {
    // Attributs privés
    private $etudiant;
    private $matiere;
    private $tabNotes;
    // Constructeur par défaut de la classe
    public function LigneBulletin ($etudiant, $matiere){
        $this->setEtudiant ($etudiant);
        $this->setMatiere ($matiere);
        
        $db= new DataBaseAccess();
        $db->executeRequete("Select * from resultat, evaluation where 
 resultat.code_eval = evaluation.code_eval and code_user= '".$this->getEtudiant()."'
 and code_mat= ".$this->getMatiere());
        while ($resu=$db->ligneResultat()){
            $this->tabNotes[] = $resu['note'];
        }
    }
       // Méthodes Get d'accès aux attributs
    public function getEtudiant() {
        return $this->etudiant;
    }
    public function getMatiere() {
        return $this->matiere;
    }
    //Méthodes SET d'affectation des attributs
    public function setEtudiant ($e){
        $this->etudiant = $e;
    }
    public function setMatiere($m){
        $this->matiere= $m;
    }
    
    // Méthode qui renvoie le tableau de notes pour la matière et l'étudiant de 
  //  la ligne de bulletin courante
    public function getTabNotes(){
        return $this->tabNotes;
    }
    // Fonction qui renvoie la moyenne de l'étudiant à cette matière
    public function getMoyenne(){
        $nbNotes = count($this->tabNotes);
        $cumul = 0;
        $i=0;
        while ($i<count($this->tabNotes)){
            if ($this->tabNotes[$i] !=-1){
                $cumul += $this->tabNotes[$i];
            }else {
                $nbNotes -=1;
            }
            $i++;
        }
        if ($nbNotes==0){
            return -1;
        }else{
            return ($cumul/$nbNotes);
        }
    }
}

?>
