<?php
include_once "session.php";
init_php_session();

function afficher(){ 
    if(isset($_GET['page'])  && !empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }
    else{
        $currentPage = 1;
    }
    include("connection.php");
    $list = "SELECT count(*) as nbr FROM utilisateurs WHERE archive = 1";
    $result = $dbco->query($list);
    $return = $result->fetch();
    $total = (int) $return['nbr'];
    $parPage = 6;
    $pages = ceil($total / $parPage);
    $debut = ($currentPage * $parPage) - $parPage; 
    $mat = $_SESSION['id'];
    $list = "SELECT * FROM utilisateurs WHERE id NOT IN ($mat) AND archive = 1 LIMIT $debut, $parPage";
    $result = $dbco->query($list);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST["boutton"])){
        if(isset($_POST["nom"])){
            $nom = $_POST["nom"];
            if(!empty($nom)){                   
            include("connection.php");
            $list = "SELECT * FROM utilisateurs WHERE prenom LIKE '%$nom%' OR nom LIKE '%$nom%' OR email LIKE '%$nom%' OR matricule LIKE '%$nom%' AND id NOT IN ($mat) AND archive = 1 LIMIT 6";
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
        echo "<a href='../Vues/archives_admin.php?id=$id'><i class='bi bi-arrow-up-square'></i></a>";
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

function popup_desarchiver(){
    if(isset($_GET["id"])){
    $id = $_GET["id"];
    echo "<div style='display:flex; flex-direction:column;justify-content:center;width:100%;background-color:grey;border_radius: 10px;' class='p-3'>
            <h4 style='color:white;'>Confirmation</h4></br>
            <p style='color:white;'>Êtes-vous sûre de vouloir désarchiver ?</p>
            <div style='display:flex;justify-content:end;gap: 20px;'>
                <a href='archives_admin.php'><button type='button' class='btn btn-info' data-bs-dismiss='modal class='btn-close'>Annuler</button></a>
                <a href='archives_admin.php?id_ar=$id'><button type='button' class='btn btn-primary'>Confirmer</button></a>
            </div>
        </div>";
    } 
}  

function desarchiver(){
    if(isset($_GET["id_ar"])){
        $id = $_GET["id_ar"];
        if(!empty($id) && is_numeric($id)){
            include("connection.php");
                $list = "UPDATE utilisateurs SET archive = '0' WHERE id=$id";
                $dbco->query($list);
     
        }
    }
}
?>