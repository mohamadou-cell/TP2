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
        <?php
            include_once "header.php";
        ?>
    </header>
    <main >
    <div class="container-fluid d-flex justify-content-center mt-5 mb-5">
    <div class="d-flex w-25 border border-dark">
      <a href="accueil_admin.php" class="w-50"><button class="btn btn-light w-100 font-weight-bold border border-dark" style="color: black;">USERS</button></a>
      <a href="archives_admin.php" class="w-50"><button class="btn btn-light w-100 font-weight-bold border border-dark" style="color: black;">ARCHIVES</button></a>
    </div>
  </div>
              <div style="display:flex; flex-direction:column;justify-content:center;width:100%;">
              <div class="container-fluid d-flex flex-direction-column justify-content-center mt-5">
                <?php
                if(isset($_GET["reussie"])):
                $email = $_GET["reussie"];
                ?>
                    <p class="d-flex text-black justify-content-center font-weight-bold text-uppercase fs-2 bg-warning align-items-center p-2"> <?php echo $email;  ?> </p> 
                <?php endif; ?>
            </div>
            <div class="container-fluid d-flex flex-direction-column justify-content-center mt-5">
            <?php
                        if(isset($_GET["echec"])):
                        $email = $_GET["echec"];
                        ?>
                    <p class="d-flex text-white justify-content-center font-weight-bold text-uppercase fs-2 bg-danger align-items-center p-2"> <?php echo $email;  ?> </p> 
                    <?php endif; ?>
            </div>
            <div class="w-100 d-flex justify-content-center"> 
                <form action="../Controller/image.php" method="post" class="bg-primary p-3" style="border-radius: 10px;width: 20%;" enctype="multipart/form-data" id="valide">
                  <div class="mb-3">
                      <label for="message-text" class="col-form-label" style="color: white;">Choisir une image</label>
                      <input type="file" class="form-control" id="image" name="image" accept=".jpg, .png, .jpeg, .gif">
                      <span id="erreur7"></span>
                      <?php
                        if(isset($_GET["image"])):
                        $image = $_GET["image"];
                        ?>
                    <p class="text-danger"> <?php echo $image;  ?> </p> 
                    <?php endif; ?>
                  </div>
                  <div class="mb-3">
                      <input type="submit" class="btn btn-light" name="valide" value="MODIFIER">
                  </div>
                </form>
                </div>

              </div>
             <div class="container-fluid d-flex flex-direction-column justify-content-center mt-5">
                <?php
                if(isset($_GET["success"])):
                $email = $_GET["success"];
                ?>
                    <p id="success" class="d-flex text-black justify-content-center font-weight-bold text-uppercase fs-2 bg-warning align-items-center p-2"> <?php echo $email;  ?> </p> 
                <?php endif; ?>
            </div>
            <div class="container-fluid d-flex flex-direction-column justify-content-center mt-5">
            <?php
                        if(isset($_GET["unsuccess"])):
                        $email = $_GET["unsuccess"];
                        ?>
                    <p class="d-flex text-white justify-content-center font-weight-bold text-uppercase fs-2 bg-danger align-items-center p-2"> <?php echo $email;  ?> </p> 
                    <?php endif; ?>
            </div>
            <div class="container-fluid d-flex flex-direction-column justify-content-center mt-5">
    
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Cliquer ici pour changer votre mot de passe</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Changer mot de passe</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../Controller/parametre.php" id="submit">
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Actuel mot de passe</label>
                <input type="password" class="form-control" id="amdp" name="amdp"><i class="bi bi-eye-fill" id="i1" style="position: absolute;right:25px;top: 60px;font-size:larger;"></i><i class="bi bi-eye-slash-fill" id="i2" style="position: absolute;right:25px;top: 60px;font-size:larger;"></i>
                <span id="erreur0"></span>
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="nmdp" name="nmdp"><i class="bi bi-eye-fill" id="i3" style="position: absolute;right:25px;top: 150px;font-size:larger;"></i><i class="bi bi-eye-slash-fill" id="i4" style="position: absolute;right:25px;top: 150px;font-size:larger;"></i>
                <span id="erreur1"></span>
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Confirmer mot de passe</label>
                <input type="password" class="form-control" id="cmdp" name="cmdp"><i class="bi bi-eye-fill" id="i5" style="position: absolute;right:25px;top: 245px;font-size:larger;"></i><i class="bi bi-eye-slash-fill" id="i6" style="position: absolute;right:25px;top: 245px;font-size:larger;"></i>
                <span id="erreur2"></span>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="submit" value="MODIFIER">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>
</main>
<footer>
        <?php
            include_once "footer.php";
        ?>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
<script src="js/parametre.js"></script>
</body>
</html>