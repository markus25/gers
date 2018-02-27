<?php
require_once ("./classes/LigneBulletin.php");
require_once ("./classes/ListeMatiere.php");
require_once ("./classes/dao.php");
require_once ("./Fonctions.php");

// session_start();

 if ($_session["statut_user"] !="stag"){
     header ('Location: index.php');
 }
 $user= new DAOUser();
 $user->loadByID($_SESSION['user']);
 $listeM= new ListeMatiere();
 $listeM->loadListeParClasse($user->getCode_classe());
 
 $notes_max= nombreNotesMaxEleve($_SESSION('user'));
 
 // On affiche le connecté
 echo ("Connect&eacute; : ".$_SESSION['prenom__user']."".$_SESSION['nom_user']);
?>
<h2>Voici vos r&eacute;sultats pour les matieres de votre formation:</h2>
<br />
<table  align="center">
<tr>
    <th>Matiere</th>
    <?php
    for ($i=1; $i<= $notes_max; $i++){
        echo ("<th>Note ".$i."</th>");
    }
    echo("<th>Moyenne</th>");
    ?>
</tr>
     <?php
     $tabMatieres = $listeM->getListe();
     for ($i=0; $i<count($tabMatieres); $i++){
         $matiereCourante= $tabMatieres[$i];
         echo("<tr><td>".$matiereCourante->getLib_mat()."</td>");
         $colonnesVides= $notes_max;
         
         //On utilise la classe ligneBulletin
         $lb= new LigneBulletin($_SESSION["user"], $matiereCourante->getCode_mat());
         
         $tabNotes= $lb->getTabNotes();
         $j=0;
         
         while ($j < count($tabNotes)){
             echo("<th>".$tabNotes[$j]."</th>");
             $j++;
             $colonnesVides=$colonnesVides - 1;
         }
         
         for ($j = 0; $j<$colonnesVides; $j++){
             echo("<th></th>");
         }
         echo("<th>".$lb->getMoyenne()."</th>");
         echo("</tr>");
     } 
     ?>
</table>