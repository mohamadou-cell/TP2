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
<body style="top: 0px;bottom: 0px;" class="vh-100 vw-100">
  <header>
    <?php
      include_once "header.php";
    ?>
  </header>
  <main style="position: relative;">
  <div class="container-fluid d-flex justify-content-center mt-5 mb-5">
    <div class="d-flex w-25 border border-dark">
      <a href="accueil_admin.php" class="w-50"><button class="btn btn-dark w-100 font-weight-bold">USERS</button></a>
      <a href="archives_admin.php" class="w-50"><button class="btn btn-light w-100 font-weight-bold"  style="color: black;">ARCHIVES</button></a>
    </div>
  </div>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="boutton">
          Launch static backdrop modal
        </button> -->

        <!-- Modal -->
        <!-- <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              
              <?php
                /* include_once "../Controller/admin.php";
                popup(); */
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
              </div>
            </div>
          </div>
        </div> -->
        <div id="mod" class="d-flex justify-content-center">
        <?php
            include_once "../Controller/admin.php";
            popup();
            modifier();
      
          ?>
        </div>
        <?php
            include_once "../Controller/admin.php";         
            afficher();
            archiver();
            switcher();
            
        ?>
 
</main>
<footer style="bottom:0px;">
<?php
      include_once "footer.php";
    ?>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
<script src="js/mod.js"></script>   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</html>