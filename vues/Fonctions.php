<?php

require_once ("./classes/DataBase.php");

function nombreNotesMaxEleve ($eleve){
    $db= new DataBaseAccess();
    $db->executeRequete("Select count(resultat.code_eval) nb,evaluation.code_mat
    from resultat, evaluation
    where code_user = '".$eleve."'
    and resultat.code_eval = evaluation.code_eval
    group by evaluation.code_mat
    order by nb desc limit 0,1;");
    $resu =$db->ligneResultat();
    return $resu['nb'];
}
?>
