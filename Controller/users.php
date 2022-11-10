<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
                
    @$prenom = htmlspecialchars($_POST["prenom"]);
    @$nom = htmlspecialchars($_POST["nom"]);
    @$email = htmlspecialchars($_POST["email"]);
    @$role = htmlspecialchars($_POST["role"]);
    @$mdp = htmlspecialchars($_POST["mdp"]);
    @$cmdp = htmlspecialchars($_POST["cmdp"]);
    @$photo = file_get_contents($_FILES["photo"]["tmp_name"]);
    
    if(isset($_POST["valider"])){
   
        $masque = "/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
        
            if(!preg_match($masque, $email))  {
                header("Location: ../Vues/inscription_vue.php?email=Email incorrect");
            } 
            $maxsize = 20000;
            $size = $_FILES["photo"]["size"];
            if($size > $maxsize){
                header("Location: ../Vues/inscription_vue.php?image=Veuillez choisir une image plus petite taille");
            }

                if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../Vues/inscription_vue.php?email=Veuillez entrer un email correct");
                }             
         if(isset($_POST["prenom"]) && !empty($_POST["prenom"]) && isset($_POST["nom"]) && !empty($_POST["email"]) && isset($_POST["email"]) && !empty($_POST["email"]) && 
            isset($_POST["role"]) && !empty($_POST["role"]) && isset($_POST["mdp"]) && !empty($_POST["mdp"]) && isset($_POST["cmdp"]) && !empty($_POST["cmdp"]) && isset($_FILES["photo"])){
               
                include("connection.php");
                $sth = $dbco->prepare(" SELECT * FROM utilisateurs WHERE email = '".$email."'"); 
                $sth->execute();
                $res = $sth->fetchAll(PDO::FETCH_ASSOC); 
                if(count($res) == 0){ 
                    if(trim($mdp) === trim($cmdp)){
    
                $sth = $dbco->prepare(" INSERT INTO utilisateurs(prenom,nom,email,roles,mot_de_passe,photo) VALUES (?, ?, ?, ?, ?, ?) "); 


                $sth->bindValue(1, $prenom);
                $sth->bindValue(2, $nom);
                $sth->bindValue(3, $email);
                $sth->bindValue(4, $role);
                $sth->bindValue(5, password_hash($mdp, PASSWORD_BCRYPT));
                $sth->bindValue(6, $photo);
                $sth->execute();
    
                header("Location: ../Vues/inscription_vue.php?success=Inscription réussie");
        
                $sql = "SELECT id FROM utilisateurs WHERE email = '".$email."'";
                $id = $dbco->prepare($sql);
                $id->execute();
                $row = $id->fetch(PDO::FETCH_ASSOC);
                //on modifie le matricule
                $matricule = date('Y-', time()).$row['id'].'-USR';
                //on modifie la derniere matricule du BD
                $sql2 = "UPDATE utilisateurs SET  matricule = '$matricule' WHERE email = '".$email."'";
                $matricule2 = $dbco->prepare($sql2);
                $matricule2->execute();
                /* $message3.="<label>Votre matricule est: '".$matricule."'</label>"; */
                }
                else{
                    header("Location: ../Vues/inscription_vue.php?mdp=Les deux mots de passe ne sont pas identiques");
                }
            }
            else{
                header("Location: ../Vues/inscription_vue.php?unsuccess=L'email est déjà pris");
            }
        }
    }



?>