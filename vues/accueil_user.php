<?php

 session_start();
 ?>

<?php

 require ("../classes/Dao/dao.php");   /* ./classes... */
 include("top.php");

 if (!isset($_POST["user"])){
     echo("Vous n'êtes pas autorisé à visualiser cette page, merci de retourner à l'accueil.");
 }else {
     $user= new DAOUser();
     // Si le chargement de l'utilisateur a été
     // bien effectué ( a retourné vrai)
     if ($user-> loadByID($_POST["user"])){
         // Il faut vérifier le mot de passe
         if ($user->getPass_user() == $_POST["pass_user"]){
             $_SESSION["user"] = $user->getCode_user();
             $_SESSION["prenom_user"] = $user->getPrenom_user();
             $_SESSION["nom_user"]= $user->getNom_user();
            if ($user->getStatut_user() ==""){
                if ($user->getCode_classe()==""){
                    $_SESSION["est professeur"]= "O";
                    require ("accueil_prof.php");
                    } else {
                        $_SESSION["est élève"]= "N";
                        require ("accueil_eleve.php");
                    }}
                    else {require ("menu_Admin.php");}
             } else {
                 header('Location: index.php');
             }
     }else{
         header('Location: index.php');
     }
 }

