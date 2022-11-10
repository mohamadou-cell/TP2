<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

include_once "session.php";
init_php_session();
    
    
    
    if(isset($_POST["submit"])){
        if(isset($_POST["amdp"]) && isset($_POST["nmdp"]) && isset($_POST["cmdp"])){
            if(!empty($_POST["amdp"]) && !empty($_POST["nmdp"]) && !empty($_POST["cmdp"])){

                @$amdp = trim($_POST["amdp"]);
                @$nmdp = trim($_POST["nmdp"]);
                @$cmdp = trim($_POST["cmdp"]);

                $id = $_SESSION['id'];

                include("connection.php");
                $sth = $dbco->prepare(" SELECT mot_de_passe FROM utilisateurs WHERE id = '".$id."'"); 
                $sth->execute();
                $res = $sth->fetch(PDO::FETCH_ASSOC); 

                if(count($res) > 0 && password_verify($amdp, $res["mot_de_passe"])){
                    if(trim($nmdp) === trim($cmdp)){
                        $date_modif = date('y-m-d');
                        $sth = $dbco->prepare("UPDATE utilisateurs SET mot_de_passe = ?, dateModif = '$date_modif' WHERE id = '".$id."'");
                        $sth->bindValue(1, password_hash($nmdp, PASSWORD_BCRYPT));
                        $sth->execute();
                        header("Location: ../Vues/parametre.php?success=Modification réussie");
                    }
                }
                else{
                    header("Location: ../Vues/parametre.php?unsuccess=Le mot de passe n'existe pas");
                }
            }
        }
    }
?>