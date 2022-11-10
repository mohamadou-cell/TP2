<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
    <div class="logo container-fluid w-100 d-flex align-items-center" style="background-color:#0BF0FF;position:fixed-top; height: 150px; gap:20px;" >
            <div class="container-fluid"><img src="images/image.jpeg" data-toggle="modal" data-target="#exampleModal" style="float: left;"></div>
            <div>
            <a href="parametre.php">
              <?php
                include_once "../Controller/session.php";     
                init_php_session();
                $id = $_SESSION["id"];
                include_once "../Controller/connection.php";
                $list = "SELECT photo FROM utilisateurs WHERE id = $id";
                  $result = $dbco->query($list);
                  $data = $result->fetch(PDO::FETCH_ASSOC);
                  
                
                echo '<img src="data:image;base64,'.base64_encode($data["photo"]).'" style="width: 100px;height:100px;border-radius:50%;"/>';
              ?>
              </a>
            </div>
            <div style="width: 200px;">
            <div class="d-flex" style="gap: 10px;">
                <div><p style="font-weight: bold;">
                <?php
                    echo $_SESSION["prenom"]; 
                  ?>
                  </p>
                </div>
                <div><p style="font-weight: bold;">
                <?php
                    echo $_SESSION["nom"]; 
                  ?>
                  </p>
                </div>   
            </div>
              <p style="font-weight: bold;">
              <?php
                  echo $_SESSION["matricule"].'</br>';
                ?>
                </p>
              </div>
                <div class="menu" style="background-color:#0c82d1;width:auto;width: 200px;">
                    <nav class="navbar navbar-expand-lg " style="background-color:#0BF0FF;">
                    
                        <div >
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="click"></button>
                            <ul class="dropdown-menu" id="list" style="display:block;list-style:none;border:0px;background:none;">
                                <li><button class="bg-primary mb-1 w-75" type="submit" style="border-radius: 15px;"><a href="login_vue.php" class="text-light" ><i class="bi bi-box-arrow-right"></i><br>Deconnection</a></button></li>
                                <li><button class="bg-secondary w-75" type="submit" style="border-radius: 15px;"><a href="parametre.php" class="text-light"><i class="bi bi-gear"></i><br>Parametres</a></button></li>
                            </ul>
                        </div>
                    
                   </nav>
             </div>
        </div> 
    </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
    <script src="js/header.js"></script>
</body>
</html>