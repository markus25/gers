<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title> Page d'accueil du GERS</title>
    </head>
    <body>
        <?php
          include('top.php'); 
        ?>
        <br/> <br/>
         <form action="vues/accueil_user.php" method ="post">
            <table  align="center">
                <td>Login</td>
                 <tr><td><input type="text" name="nom_user" id="nom_user" size="20" maxlength="20"></td></tr> <br/> <br/>
                <td>Mot de passe</td>
                <tr><td><input type="password" name="pass_user" id="pass_user" size="20" maxlength="20"></td></tr> <br/>
                <tr><td colspan="2" class="valid"><input type="submit" name="logok" value="Se connecter">     <input type="reset" name="logoff" value="Effacer"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
