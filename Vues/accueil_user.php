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
<body style="top: 0px;bottom: 0px;">
  <header>
  <?php
      include_once "header.php";
    ?>
  </header>
  <main>
  <div class="container-fluid d-flex justify-content-center mt-5 mb-5">
    <div class="d-flex w-25 justify-content-center">
      <a href="accueil_user.php" class="w-50"><button class="btn btn-dark w-100 font-weight-bold">USERS</button></a>
    </div>
  </div>
  
      
        <?php
            include_once "../Controller/user_simple.php";
          
            afficher();
            
        ?>

</main>
<footer>
    <?php
      include_once "footer.php";
    ?>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
<script src="js/mod.js"></script>   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</html>