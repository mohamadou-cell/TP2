<?php

function afficher(){ 
    if(isset($_GET['page'])  && !empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }
    else{
        $currentPage = 1;
    }
    include("connection.php");
    $list = "SELECT count(*) as nbr FROM utilisateurs WHERE archive = 0";
    $result = $dbco->query($list);
    $return = $result->fetch();
    $total = (int) $return['nbr'];
    $parPage = 6;
    $pages = ceil($total / $parPage);
    $debut = ($currentPage * $parPage) - $parPage; 

    $list = "SELECT * FROM utilisateurs WHERE archive = 0 LIMIT $debut, $parPage";
    $result = $dbco->query($list);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST["boutton"])){
        if(isset($_POST["nom"])){
            $nom = $_POST["nom"];
            if(!empty($nom)){                   
            include("connection.php");
            $list = "SELECT * FROM utilisateurs WHERE prenom LIKE '%$nom%' OR nom LIKE '%$nom%' OR email LIKE '%$nom%' OR matricule LIKE '%$nom%' AND archive = 0";
            $result = $dbco->query($list);
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
        }
    } 
} 

    echo '<div class="container-fluid mb-3 mt-5 d-flex justify-content-end align-items-center">
            <form action="" method="post">
            <div class="d-flex justify-content-center align-items-center">
                <input type="text" name="nom" placeholder="Entrer prenom ou nom" class="form-control col-lg-9" >
                <button type="submit" class="btn btn-primary" name="boutton"><i class="bi bi-search"></i></a>
            </div>
            </form>
        </div>';
  
        echo '<table class="container-fluid table table-bordered" style="width:100%;position:absolute;transform: translateX(50%);transform: translateY(0%);">
        <thead>
          <tr>
            <th scope="col" class="col-lg-2">PRENOM</th>
            <th scope="col" class="col-lg-2">NOM</th>
            <th scope="col" class="col-lg-2">EMAIL</th>
            <th scope="col" class="col-lg-2">MATRICULE</th>
            <th scope="col" class="col-lg-2">ROLE</th>
            <th scope="col" class="col-lg-2">ACTIONS</th>
          </tr>
        </thead>';
        echo '<tbody>';
        foreach($data as $donnees){
            $id = $donnees["id"];
        echo "<tr>";
        echo "<td>".$donnees["prenom"]."</td>
            <td>".$donnees["nom"]."</td>
            <td>".$donnees["email"]."</td>
            <td>".$donnees["matricule"]."</td>
            <td>".$donnees["roles"]."</td>";
        
        echo "<td style='display:flex;gap:50px; justify-content:center;'>";
        echo "<a href='../Vues/accueil_admin.php?id_ar=$id' onclick='return confirm(\"Êtes-vous sûr de vouloir archiver\")'><i class='bi bi-arrow-down-square'></i></a>";
        echo "<a href='../Vues/accueil_admin.php?id_mod=$id'><i class='bi bi-box-arrow-up-right'></i></a>";
        echo "<a href='../Vues/accueil_admin.php?id_switch=$id'><i class='bi bi-arrow-left-right'></i></a>";
        echo "</td";
        echo '</tr>';
        }
        
        echo '<tbody>
        </table>';
            echo "<div class='d-flex justify-content-center' style='width:100%;position:absolute;transform: translateX(50%);transform: translateY(725%);'>
            <nav aria-label='Page navigation example'>
              <ul class='pagination'>";
                if($currentPage == 1){
                    echo "<li class='page-item disabled'>
                    <a class='page-link' href='#' aria-label='Previous'>
                        <span aria-hidden='true'>&laquo;</span>
                    </a>
                    </li>&nbsp;";
                }
                else{
                    echo "<li class='page-item'>
                    <a class='page-link' href='?page=".($currentPage - 1)."' aria-label='Previous'>
                        <span aria-hidden='true'>&laquo;</span>
                    </a>
                    </li>&nbsp;";
                }
                for($i = 1; $i <= $pages; $i++){
                    if($currentPage != $i){
                        echo "<li class='page-item'><a class='page-link active' href='?page=$i'>$i</a></li>&nbsp;";
                    }
                    else{
                        echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>&nbsp;";
                    }
                }
                if($currentPage == $pages){
                    echo "<li class='page-item disabled'>
                    <a class='page-link' href='#' aria-label='Next'>
                        <span aria-hidden='true'>&raquo;</span>
                    </a>
                    </li>";
                }
                else{
                    echo "<li class='page-item'>
                    <a class='page-link' href='?page=".($currentPage + 1)."' aria-label='Next'>
                        <span aria-hidden='true'>&raquo;</span>
                    </a>
                    </li>";
                }
              echo "</ul>
            </nav>
          </div>";
        }
            

function archiver(){
    if(isset($_GET["id_ar"])){
        $id = $_GET["id_ar"];
        if(!empty($id) && is_numeric($id)){
            include("connection.php");
               $date_archive = date('y-m-d');
                $list = "UPDATE utilisateurs SET archive = '1', dateArchive = '$date_archive' WHERE id=$id";
                $dbco->query($list);
     
        }
    }
}

function switcher(){
    if(isset($_GET["id_switch"])){
        $id = $_GET["id_switch"];
        if(!empty($id) && is_numeric($id)){
            include("connection.php");
            $list = "SELECT roles FROM utilisateurs WHERE id=$id";
            $result = $dbco->query($list);
            $data = $result->fetch();
                $role = $data["roles"];
                if($role == "Admin"){
                    $list = "UPDATE utilisateurs SET roles = 'User' WHERE id=$id";
                    $dbco->query($list);
                }
                if($role == "User"){
                    $list = "UPDATE utilisateurs SET roles = 'Admin' WHERE id=$id";
                    $dbco->query($list);
                }
        }
    }
}

function popup(){
    if(isset($_GET["id_mod"])){
        $id = $_GET["id_mod"];
        if(!empty($id) && is_numeric($id)){
            include("connection.php");
            $list = "SELECT * FROM utilisateurs WHERE id=$id";
            $result = $dbco->query($list);
            $data = $result->fetch();
                $id = $data["id"];
                $prenom = $data["prenom"];
                $nom = $data["nom"];
                $email = $data["email"];
                
                echo "<form action='../Vues/accueil_admin.php?id_conf=$id' method='post' style='display:flex; flex-direction:column;justify-content:center;width:20%;gap: 10px;z-index: index;' class='border border-dark p-3'>
                <h2>Modification</h2><input value='$prenom' name='prenom' class='d-flex justify-content-center'><input value='$nom' name='nom'><input value='$email' name='email'>
                <input class='btn btn-warning' value='Modifier' type='submit' name='valide'></form>";
                }   
            
            }
        }

function modifier(){
    if(isset($_GET["id_conf"])){
        $id = $_GET["id_conf"];
        if(isset($_POST["valide"])){
            if(isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"])){
          
                $prenom = $_POST["prenom"];
                $nom = $_POST["nom"];
                @$email = $_POST["email"];
                $date_modif = date('y-m-d');
                if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Veuiller entrer un email correct";
                    die();
                } 
                include("../Controller/connection.php");
                $list = "UPDATE utilisateurs SET prenom = '$prenom', nom = '$nom', email = '$email', dateModif = '$date_modif' WHERE id = $id";
                $dbco->exec($list);
                
              
            }
        } 
    } 
}

?>