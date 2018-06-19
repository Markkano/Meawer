<?php function RenderMeaw($meaw) { ?>
  <!-- Blog Post -->
  <div class="card mb-4" style="margin: 20px;">

    <?php if($meaw->getImage() != null){  ?>
      <img class="card-img-top" src=<?=IMG_PATH.$meaw->getImage();?> alt="">
    <?php } ?>
    <div class="card-body">

      <form action="<?=BASE_URL?>ReMeaw/ReMeaw" method="POST">
        <h4 class="card-title"><?=$meaw->getKitten()->getUsername();?></h4>
        <p class="card-text"> <?=$meaw->getContent();?> </p>
        <input type="hidden"  value="<?=$meaw->getId()?>" name="meaw">
        <input type="submit" name="" value="Re-Meaw" class="btn btn-primary"></a>
      </form>
      <label for="chk<?=$meaw->getId()?>">
      <img class="purr" src="<?=BASE_URL?>Bundles/staticImages/pawprint.png" onclick="check('chk<?=$meaw->getId()?>','../Bundles/staticImages/pawprint.png'  ,'../Bundles/staticImages/pawprintblue.png','lupa<?=$meaw->getId()?>');"
        width="50" height="50" id="lupa<?=$meaw->getId()?>" alt="" name="lupa" />
      <span id="count<?=$meaw->getId()?>"><?=sizeof($meaw->getPurrs())?></span>
      </label>
      <input style="opacity: 0;" type="checkbox" id="chk<?=$meaw->getId()?>"
                              onchange="PurrRequest('<?=$meaw->getId()?>');"
      <?php if (in_array($_SESSION['kitten'], $meaw->getPurrs())) { echo 'checked="true"'; } ?>  onload="check('chk<?=$meaw->getId()?>','../Bundles/staticImages/pawprint.png'  ,'../Bundles/staticImages/pawprintblue.png','lupa<?=$meaw->getId()?>');" ></input>

      <hr><br />
      <div id="comments<?=$meaw->getId()?>">
        <?php if($meaw->getComments() != null) { foreach($meaw->getComments() as $comment) { ?>
          <h7 class="card-title"><b><?=$comment->getKitten()->getUsername();?></b> comment:</h7>
          <p class="card-text">
            <?=$comment->getContent();?>
          </br><span style="font-size: 10px;"><?=$comment->getCommentDate();?></span>
        </p>
      <?php }} ?>
      </div>

      <hr><br />
    <h6 align="right">Comments...
      <button style="line-height: 5px; height: 25px; width: 60px" class="btn btn-info btn-lg" data-toggle="modal"
            data-target="#myModal<?=$meaw->getId()?>" id="cmt<?=$meaw->getId()?>">Add</button>
    </h6>
                    <!-- Modal -->
     <div class="modal fade" id="myModal<?=$meaw->getId()?>" role="dialog">
     <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <button align="right" type="button" class="close" data-dismiss="modal"> &times; </button>
              <h4 class="modal-title">Write your Comment</h4>
            </div>
            <div class="modal-body">
                  <input type="hidden" value="<?=$meaw->getId()?>" name="meawId">
                  <p>
                    <textarea class="textarea" align="center" type="text" placeholder="my comment-nyan" id="comment<?=$meaw->getId()?>" required></textarea>
                  </p>
                  <p><input align="center" class="btn btn-primary" type="submit" onclick="Comment(<?=$meaw->getId()?>)" id="btn<?=$meaw->getId()?>" value="comment"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="card-footer text-muted">
      <?=$meaw->getPublishDate();?>
    </div>
  </div>
<?php } ?>

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
    <script type="text/javascript">
        function check(checkboxid, imag, defecto, imgid) {
          var valor = document.getElementById(checkboxid).checked;
          console.log(valor);
          if (valor == false){
              document.getElementById(checkboxid).checked = false;
              document.getElementById(imgid).src = defecto;
          }else{
            document.getElementById(checkboxid).checked = true;
            document.getElementById(imgid).src = imag;
          }
        }
    </script>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <div class="card my-4">
          <h3 class="card-header">CatWall <img style="width: 40px;height: 40px;" src="<?=BASE_URL?>Bundles/staticImages/kitten.ico">
          </h3>

          <?php
          if (isset($meawsList)) {
            foreach ($meawsList as $key):
                if ($key instanceof Models\Meaw) { // Its a Meaw
                  RenderMeaw($key);
                } elseif ($key instanceof Models\ReMeaw) { // Render ReMeaw ?>
              <!-- Meaw of Re-meaw -->
              <div class="card mb-4"  style="margin: 20px;">
                <h5 class="card-title" style="margin: 20px;"><b><?=$key->getKitten()->getUsername();?></b> re-meaw this:</h5>
                <div style="border: 4px" class="card-body">
                  <?php RenderMeaw($key->getMeaw()); ?>
                </div>
                <div class="card-footer text-muted">
                  <?=$key->getReMeawDate();?>
                </div>
              </div>
            <?php } // else { Render ReMeaw }
          endforeach; // foreach ($meawsList as $key)
            } // if (isset($meawsList)) ?>

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
    <script src="<?=BASE_URL?>Bundles/js/script.js"></script>
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

      function Comment(meawId) {
        var comment = document.getElementById('comment' + meawId).value;
        document.getElementById('comment' + meawId).disabled = true;
        document.getElementById('btn' + meawId).disabled = true;
        Request('<?= BASE_URL ?>Comment/CommentMeaw', 'POST', 'meawId='+meawId+'&comment='+comment, function(response) {
          // Analizo la respuesta
          AddComment(response);
        });
      }

      function AddComment(response) {
        var datos = JSON.parse(response);
        if (datos.status == 'ok') {
          var comments = document.getElementById('comments'+datos.meawId);
          var username = '<?=$_SESSION['kitten']->getUsername()?>'
          comments.innerHTML += '<h7 class="card-title"><b>'+username+'</b> comment:</h7>'+
          '<p class="card-text">'+datos.comment+'</br><span style="font-size: 10px;">'+datos.commentDate+'</span></p>';
        }
        document.getElementById('comment' + datos.meawId).disabled = false;
        document.getElementById('comment' + datos.meawId).value = '';
        document.getElementById('btn' + datos.meawId).disabled = false;
        $('#myModal' + datos.meawId).modal('hide');
      }
    </script>
  </body>

</html>
<?php ?>
