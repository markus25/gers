<?php

 session_start();
 ?>

<?php
require('top.php');
require("menu_admin.php");
require_once ("./classes/dao.php");
$user= new DAOUser();
echo '<br/>';
$testIsset = isset($_POST['mel']) && isset($_POST['nom']) &&
 isset($_POST['prenom']) && isset($_POST['pass'])  &&
 isset($_POST['option']) && isset($_POST['statut']);
if ($testIsset== true){
    $user->setNom_user($_POST['nom']);
    $user->setPrenom_user($_POST['prenom']);
    $user->setCode_user($_POST['mel']);
    $user->setPass_user($_POST['pass']);
    $user->setCode_classe($_POST['option']);
    $user->setStatut_user($_POST['statut']);
    $user->save();
}
 ?>


<form method="POST" action="stagiaire.php">
    <table width="100%" border="0" cellspacing="3" align="center">
       
        <tr>
            <td colspan="2">
                <h3 align="center">Cr&eacute;ation d'un &eacute;tudiant</h3> <br /></td>
        </tr>
        <tr>
            <td colspan="2"><hr /><br /></td>
        </tr>
        <tr>
            <td width="54%">Nom<span class="oblig">*</span>:
            <input type="text" name="nom" size="20" maxlength="32" /></td>
            <td width="46%">Pr&eacute;nom<span class="oblig">*</span>:
            <input type="text" name="prenom" size="20" maxlength="32" /><br /></td>
        </tr>
        <tr>
            <td width="54%">Adresse m&eacute;1 <span class="oblig">*</span>: 
            <input type="text" name="mel" size="32" maxlength="64" ></td>
             
			 <td width="54%">Mot de passe <span class="oblig">*</span> :
                <input type="text" name="pass" size="32" maxlength="64"></td>
           
        </tr> 
     
        <tr>
            <td colspan="2">Option : </td>
        </tr>
        
        <tr>
            <td colspan="2">
                <input type="radio" name="option" value="SLAM"> BTS SIO SLAM
                <input type="radio" name="option" value="SISR"> BTS SIO SISR <br></td>
        </tr>
          <tr>  
            <td colspan="2"><br /> <br /><hr /></td>
          </tr>
          
        <tr>
            <td colspan="2">
                <div class="centrer"><span class="oblig">*</span> champ obligatoire
                <input type="submit" name="envoi" value="Enregistrer" />
                </div> </td>        
        </tr>     
   
    </table>
</form>



