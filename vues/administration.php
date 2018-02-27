<?php
include ('top.php');
require ("menu_Admin.php");
require ("./classes/ListeUser.php");
echo '<br />';

$user = new DAOUser();
$listeU= new ListeUser();
$ListeU-> loadListeUser ();
$tabUser = $ListeU->getListe();
$nbUser = count ($tabUser);
if (isset ($_GET['supp']))
{
    $id = $_GET['code_user'];
    $user->delete($id);
}
?><p>Modification ou suppression d'un utilisateur</p>
    <br /><br /><br />
    <table width="80%" border="2" cellspacing="3" align="center">
        <tr><td colspan="7"><hr /></td></tr>
        <tr><td>Num&eacute;ro</td>
            <td>Statut</td>
            <td>Nom</td>
            <td>Pr&eacute;nom</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>
        <?php
           for ($i=0; $i<$nbUser; $i++){
               echo '<tr>';
               $user = $tabUser($i);
               
               echo '<td>'.$user->getCode_user().'<td>';
               echo '<td>'.$user->getStatut_user().'<td>';
               echo '<td>'.$user->getNom_user().'<td>';
               echo '<td>'.$user->getPrenom_user().'<td>';
           
               $numUser = $user->getCode_user(); ?>
        <tr>
        <td><a href="MajUser.php?code_user=<?php echo $numUser; ?>" >Modif</a></td>
        <td><a href="administration.php?code_user=<?php echo $numUser; ?>&supp=ok" >Supp</a></td>
    </tr>
               <?php  }
        

?>
    </table>
</div>