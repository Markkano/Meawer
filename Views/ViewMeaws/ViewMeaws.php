<?php ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CatWall | Meawer</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>Bundles/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="<?=BASE_URL?>Bundles/css/blog-home.css" rel="stylesheet">

  </head>

  <body background="<?=BASE_URL?>Bundles/staticImages/catWall.gif">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style=" background-color:#3f888f">
      <div class="container">
        <a class="navbar-brand" style=" color: black" href="#"><h2>Meawer</h2></a>
        <img style="width: 60px;height: 40px;" src="<?=BASE_URL?>Bundles/staticImages/catkiss.gif">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="color: black" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">my Kindle</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">my Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">my Whispers</a>
            </li class="nav-item">
            <li class="nav-item">
              <a class="nav-link" href="">Account Settings</a>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <div class="card my-4">
          <h3 class="card-header">CatWall <img style="width: 40px;height: 40px;" src="<?=BASE_URL?>Bundles/staticImages/kitten.ico">
          </h3>

          <?php if(isset($meawsList)){
                foreach ($meawsList as $key) {
            # code... 

                  if($key instanceof Models\Meaw){
          ?>
          <!-- Blog Post -->
              <div class="card mb-4">
                <?php if($key->getImage() != null){  ?>
                  <img class="card-img-top" src=<?=IMG_PATH.$key->getImage();?> alt="">
                <?php } ?>
                <div class="card-body">
                  <form action="<?=BASE_URL?>ReMeaw/ReMeaw" method="POST">
                    <h4 class="card-title"><?=$key->getKitten()->getUsername();?></h4>
                    <p class="card-text"> <?=$key->getContent();?> </p>
                    <input type="hidden"  value="<?=$key->getId()?>" name="meaw">
                    <input type="submit" name="" value="Re-Meaw" class="btn btn-primary"></a>
                  
                    <label for="chk<?=$key->getId()?>">
                        <img  class="purr"  src="../Bundles/staticImages/pawprint.png" onclick="check('chk<?=$key->getId()?>','../Bundles/staticImages/pawprint.png'  ,'../Bundles/staticImages/pawprintblue.png','lupa<?=$key->getId()?>');"
                            width="50" height="50" id="lupa<?=$key->getId()?>" alt="" name="lupa" />
                        <span id="count<?=$key->getId()?>"><?=sizeof($key->getPurrs())?></span>
                    </label>
                  </form>
                  
                   
                  <form action="#">
                    <input style="opacity: 0;" type="checkbox" id="chk<?=$key->getId()?>" value="Purr" 
                                                      onchange="PurrRequest('<?=$key->getId()?>');"
                      <?php if (in_array($_SESSION['kitten'], $key->getPurrs())) { ?> 
                          checked="true" 
                      <?php } ?> value="si" 
                    >
                  </form>              
                  <hr><br />
                  <h6 align="right">Comments...
                  <button style="line-height: 5px; height: 25px; width: 60px" class="btn btn-info btn-lg" data-toggle="modal" 
                          data-target="#myModal<?=$key->getId()?>"  id="cmt<?=$key->getId()?>">Add</button>
                  </h6>
                    <!-- Modal -->
                  <div class="modal fade" id="myModal<?=$key->getId()?>" role="dialog">
                    <div class="modal-dialog">                    
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Write your Comment</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?=BASE_URL?>Comment/CommentMeaw" method="POST">
                              <input type="hidden"  value="<?=$key->getId()?>" name="meawId">
                              <p>
                                <textarea class="input100" align="center" type="text" placeholder="my comment-nyan" name="comment" required></textarea> 
                              </p>
                              <p><input align="center" class="btn btn-primary" type="submit" name="" value="comment"></p>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <?php if($key->getComments() != null){  
                    foreach($key->getComments() as $comment) {?>
                        <h7 class="card-title"><?=$comment->getKitten()->getUsername();?></h7>
                        <p class="card-text"> 
                          <?=$comment->getContent();?>
                          </br>
                          <?=$comment->getCommentDate();?> 
                        </p>
                  <?php }} ?>  
                </div>
                <div class="card-footer text-muted">
                  <?=$key->getPublishDate();?>
                </div>
              </div>

          <?php }else{ 
            ?>

              <!-- Meaw of Re-meaw -->
              <div class="card mb-4">
                <h5 class="card-title"><?=$key->getKitten()->getUsername();?></h5>
                <div style="border: 4px" class="card-body">  
                  <div class="card mb-4">
                    <?php if($key->getMeaw()->getImage() != null){  ?>
                      <img class="card-img-top" src=<?=IMG_PATH.$key->getMeaw()->getImage();?> alt="">
                    <?php } ?>
                    <div class="card-body">
                      <h6 class="card-title"><?=$key->getMeaw()->getKitten()->getUsername();?></h6>
                      <p class="card-text"> <?=$key->getMeaw()->getContent();?> </p>
                      <hr><br />
                      <p align="right"><?="it was published: ".$key->getMeaw()->getPublishDate()?></p>
                    </div>
                  </div>
                </div>
                  <?php if (in_array($_SESSION['kitten'], $key->getMeaw()->getPurrs())) { ?> 
                         <p>Purrs <?=sizeof($key->getMeaw()->getPurrs())?></p>
                      <?php } ?>         

                <div class="card-footer text-muted">
                  <?=$key->getReMeawDate();?>     
                </div>

              </div>

                    
              
        <?php // end 
         }}} ?>

       </div>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search Kittens <img style="width: 40px;height: 40px;" src="<?=BASE_URL?>Bundles/staticImages/search.ico"></h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>



          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Meaw   <img style="width: 40px;height: 40px;" src="<?=BASE_URL?>Bundles/staticImages/meaw.png"></h5>
            <div class="card-body">
              <form action="<?=BASE_URL?>PublishMeaw/SaveMeaw" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="input-group">
                    <textarea class="input100" type="textarea" name="message" placeholder="Meawww!!" required></textarea>
                     <input  type="submit"  class="btn btn-primary" name="submitWhisper" placeholder="Meaw" >
               </div>
             </div>
              <label class="btn btn-default btn-file">
                        Image's Whisper... <input type="file" style="display: none;" name="meawImage">
              </label>

            </form>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; MeawerForever-2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=BASE_URL?>Bundles/vendor/jquery/jquery.min.js"></script>
    <script src="<?=BASE_URL?>Bundles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
       <script type="text/javascript">
      function PurrRequest(meawId) {
        // Checkbox
        var aux = document.getElementById('chk' + meawId);
        // Inabilito el Checkbox mientras dure la transaccion
        aux.disabled = true;
        // Envio un Request al servidor indicandole el id del Meaw
        // y un booleano que indica si es Purr o DisPurr
        Request('<?= BASE_URL ?>Purr/PurrMeaw', 'POST', 'meawId='+meawId+'&bool='+aux.checked, function(response) {
          // Analizo la respuesta
          Purr(response);
        });
      }

      function Purr(response) {
        // Recibo el Response del servidor y lo parseo
        var datos = JSON.parse(response);
        // Checkbox
        var aux = document.getElementById('chk' + datos.meawId);
        if (datos.status == 'ok') {
          // es el contador de Purrs correspondiente al Meaw
          var counter = parseInt(document.getElementById('count' + datos.meawId).innerHTML);
          // Incremento si es un purr o decremento si es dispurr
          if (datos.action == 'purr') { counter++; console.log("++");}
          else if(datos.action == 'dispurr') { counter--; console.log("--");}
          document.getElementById('count' + datos.meawId).innerHTML = counter;
        } else {
          // Invierto el estado de checked si hubo un problema
          aux.checked = !aux.checked ;
        }
        // Desbloqueo el control
        aux.disabled = false;
      }
    </script>
    <script type="text/javascript">
        function check(checkboxid, imag , defecto, imgid) {  
          var valor = document.getElementById(checkboxid).checked;
              
          if (valor == false){
              document.getElementById(checkboxid).checked = true;  
              document.getElementById(imgid).src = defecto;  
          }else{
            document.getElementById(checkboxid).checked = false;  
            document.getElementById(imgid).src = imag;   
          }
        }  
    </script>
    <script type="text/javascript">
      var span = document.getElementsByClassName("close")[0];

      function modal(modalDisplay){
          modal = getElementById(modalDisplay);
          modal.style.display = "block";

      }

      function modalOnClick(span){
          modalDisplayOff = document.getElementById(span);
          modalDisplayOff.style.display = "none";
      }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
  </body>

</html>
<?php ?>
