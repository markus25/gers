<?php

require_once('../Database/DataBase.php');

class DAOUser {
    // Attributs privés correspondante aux champs de la table user
    private $code_user;
    private $nom_user;
    private $prenom_user;
    private $pass_user;
    private $code_classe;
    private $statut_user;
    
    // Constructeur par défaut de la classe
    public function DAOUser(){
        
    }
    
    // Méthodes Get d'accès aux attributs
    public function getCode_user(){
        return $this->code_user;
    }
    public function getNom_user(){
        return $this->nom_user;
    }
    
    public function getPrenom_user (){
        return $this->prenom_user;
    }
    
    public function getPass_user (){
        return $this->pass_user;
    }
    
    public function getCode_classe (){
        return $this->code_classe;
    }
    
    public function getStatut_user(){
        return $this->statut_user;
    }
    
    // Méthodes SET d'affectation des attributs
    public function setCode_user ($c){
        return $this->code_user=$c;
    }
    
    public function setNom_user ($n){
        return $this->nom_user=$n;
    }
    
    public function setPrenom_user ($p){
        return $this->prenom_user=$p;
    }
    
     public function setPass_user ($p){
        return $this->pass_user=$p;
    }
    
     public function setCode_classe ($c){
        return $this->code_classe=$c;
    }
    
     public function setStatut_user ($p){
        return $this->statut_user=$p;
    }
    
      public function DAOUser_toString(){
          echo "Classe DAOUser: ".$this->getCode_user()."".$this->getNom_user();
      }
    
      
      // Métthode de chargement d'un user dont l'ID est fourni en paramètre
      public function loadByID ($id){
          $db = new DataBaseAccess();
          $db ->executeRequete("Select * from user where code_user ='".$id."'");
          if ($db->nombreLignesTrouvees()>0){
              $resultat = $db->ligneResultat();
              $this->setCode_user($resultat['code_user']);
              $this->setNom_user($resultat['nom_user']);
              $this->setPrenom_user($resultat['prenom_user']);
              $this->setPass_user($resultat['pass_user']);
              $this->setCode_classe($resultat['codeClasse']);
              $this->setStatut_user($resultat['statut_user']);
              return true;
          } else {
              return false;
          }
      }
    
         public function save(){
             $db= new DataBaseAccess();
             
             $db->executeRequete("Insert into user values('".$this->getCode_user()."',
                 '".$this->getNom_user()."',
                 '".$this->getPrenom_user().",
                 '".$this->getPass_user().",
                 '".$this->getCode_classe().",
                 '".$this->getStatut_user().")");     
         }
         
         public function delete($id){
             $db= new DataBaseAccess();
             
             $db->executeRequete("delete from user where code_user='".$id."'");
         }
            
         public function update($id){
             $db= new DataBaseAccess();
             
             $db->executeRequete("Update user set 
               nom_user='".$this->getNom_user()."',
               prenom_user='".$this->getPrenom_user()."',
               pass_user='".$this->getPass_user()."',
               where code_user= '".$id."'");
             }   
}

                 /*       CREATION DE LA  DAOCLASSE */
class DAOClasse {
    // Attributs privés
    private $code_classe;
    private $lib_classe;
    private $effectif_classe;
    
    // Constructeur par défaut
    public function DAOClasse () {
        
    }
    
    // GETTERS
    public function getCode_classe(){
        return $this->code_classe;
    }
    public function getLib_classe(){
        return $this->lib_classe;
    }
    public function getEffectif_classe(){
        return $this->effectif_classe;
    }
    
    // SETTERS
    public function setCode_classe($c){
        $this-> code_classe = $c;
    }
    
    public function setLib_classe($l){
        $this->lib_classe = $l;
    }
    public function setEffectif_classe($e){
        $this->effectif_classe= $e;
    }
    
    // chargement d'une classe par code classe passé en paramètre
    public function loadByID($id){
        $db= new DataBaseAccess();
        $db->executeRequete("select * from class where code_classe='".$id."'");
        if ($db->nombreLignesTrouvees()>0){
            $resultat = $db->ligneResultat();
            $this->setCode_classe($resultat['code_classe']);
            $this->setLib_classe($resultat['lib_classe']);
            $this->setEffectif_classe($resultat['effectif_classe']);
            return true;
        }else{
            return false;
        }     
        }   
}


                     // CREATION DE LA DAOMATIERE
class DAOMatiere {
     // Attributs privés
    private $code_mat;
    private $lib_mat;
    private $code_classe;
    
    public function DAOMatiere(){
        
    }
    // GETTERS
    public function getCode_mat(){
        return $this->code_mat;
    }
    
    public function getLib_mat(){
        return $this->lib_mat;
    }
    
    public function getCode_classe(){
        return $this->code_classe;
    }
    
    // SETTERS
    public function setCode_mat($c){
        $this->code_mat = $c;
    }
    
    public function setLib_mat ($l){
        $this->lib_mat = $l;
    }
    
    public function setCode_classe($c){
        $this->code_classe= $c;
    }
    
    // Chargement d'une matière par code matière passé en param
    public function loadByID($id){
         $db= new DataBaseAccess();
        $db->executeRequete("select * from matiere where code_mat='".$id);
        if ($db->nombreLignesTrouvees()>0){
            $resultat = $db->ligneResultat();
            $this->setCode_mat($resultat['code_mat']);
            $this->setLib_mat($resultat['lib_mat']);
            $this->setCode_classe($resultat['code_classe']);
            return true;
        }else{
            return false;
    }
}
}
       // Créationde la DAOEvaluation

class DAOEvaluation {
    // Attributs privés
    private $code_eval;
    private $lib_eval;
    private $date_eval;
    private $libplus_eval;
    private $coef_eval;
    private $code_mat;
    
    public function DAOEvaluation(){
        
    }
    
    // GETTERS
    public function getCode_eval(){
        return $this->code_eval;
    }
    public function getLib_eval(){
        return $this->lib_eval;
    }
    public function getDate_eval(){
        return $this->date_eval;
    }
    public function getLibplus_eval(){
        return $this->libplus_eval;
    }
    public function getCoef_eval(){
        return $this->coef_eval;
    }
    public function getCode_mat(){
        return $this->code_mat;
    }
    
    //SETTERS
    public function setCode_eval($c){
        $this->code_eval= $c;
    }
    public function setLib_eval($l){
        $this->lib_eval= $l;
    }
    public function setDate_eval ($d){
        $this->date_eval= $d;
    }
    public function setLibplus_eval ($l){
        $this->libplus_eval= $l;
    }
    public function setCoef_eval($c){
        $this->coef_eval= $c;
    }
    public function setCode_mat ($c){
        $this->code_mat= $c;
    }
    
    // Chargement d'une évaluation
   public function loadByID($id){
       $db= new DataBaseAccess();
       $db->executeRequete("Select * from evaluation where code_eval=".$id);
       if ($db->nombreLignesTrouvees()>0){
           $resultat = $db->ligneResultat();
           $this->setCode_eval($resultat['code_eval']);
           $this->setLib_eval($resultat['lib_eval']);
           $this->setDate_eval($resultat['date_eval']);
           $this->setLibplus_eval($resultat['libplus_eval']);
           $this->setCoef_eval($resultat['coef_eval']);
           $this->setCode_mat($resultat['code_mat']);
           return true;
       }else{
           return false;
       }
   }    
   
   public function save (){
       $db= new DataBaseAccess();
       $this->setCode_eval($this->getNewId());
       $db->executeRequete("Insert into evaluation values (".$this->
               getCode_eval().",
             a. '".$this->getLib_eval()."',
             b. '".$this->getDate_eval()."',
             c. '".$this->getLibplus_eval()."',
             d. ".$this->getCoef_eval().",'".$this->getCode_mat()."')");}
        
             private function getNewId(){
                 $db= new DataBaseAccess();
                 $db->executeRequete("select count(*) as nb from evaluation");
                 $resu = $db->ligneResultat();
                 $nid= $resu['nb'];
                 $nid++;
                 return $nid;
             }
}

      // Creation de la classe DAOResultat
        
     class DAOResultat {
         private $code_eval;
         private $code_user;
         private $note;
         
         public function DAOResultat () {
             
         }
         // GETTERS
         public function getCode_eval(){
             return $this->code_eval;
         }
         public function getCode_user (){
             return $this->code_user;
         }
         public function getNote (){
             return $this->note;
         }
         // SETTERS
         public function setCode_eval($c){
             $this->code_eval = $c;
         }
         public function setCode_user ($c){
             $this->code_user= $c;
         }
         public function setNote($n){
             $this->note = $n;
         }
         
         public function save (){
             $db= new DataBaseAccess();
             $db->executeRequete("insert into resultat values (".$this->
             getCode_eval().",
                 '".$this->getCode_user()."',".$this->getNote().")");
         }
         public function loadResultat($u,$e){
             $db= new DataBaseAccess();
             $db->executeRequete("select * from resultat where code_user=
                 '".$u."' and code_eval = ".$e);
             if ($db->nombreLignesTrouvees()>0) {
                 $resultat = $db->ligneResultat();
                 $this->setCode_user($resultat['code_user']);
                 $this->setCode_eval($resultat['code_eval']);
                 $this->setNote($resultat['note']);
                 return true;
             } else{
                 return false;
             }
         }
     }
?>
