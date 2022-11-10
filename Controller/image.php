<?php
include_once "session.php";
init_php_session();

ini_set("display_errors", "1");
error_reporting(E_ALL);
    
    
    
    if(isset($_POST["valide"])){
        if(isset($_FILES["image"])){
            if(!empty($_FILES["image"])){

                @$image = file_get_contents($_FILES["image"]["tmp_name"]);
                $maxsize = 20000;
                $size = $_FILES["image"]["size"];
                if($size > $maxsize){
                    header("Location: ../Vues/parametre.php?image=Veuillez choisir une image plus petite taille");
                }
                

                $id = $_SESSION['id'];

                include("connection.php");
                $sth = $dbco->prepare(" SELECT photo FROM utilisateurs WHERE id = '".$id."'"); 
                $sth->execute();
                $res = $sth->fetch(PDO::FETCH_ASSOC); 

                if(count($res) > 0){
                        $date_modif = date('y-m-d');
                        $sth = $dbco->prepare("UPDATE utilisateurs SET photo = ?, dateModif = '$date_modif' WHERE id = '".$id."'");
                        $sth->bindValue(1, $image);
                        $sth->execute();
                        header("Location: ../Vues/parametre.php?reussie=Modification réussie");
                }
                else{
                    header("Location: ../Vues/parametre.php?echec=Modification échouée");
                }
            }
        }
    }
?>