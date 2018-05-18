<?php ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
          ?>
          <!-- Blog Post -->
          <div class="card mb-4">
            <?php if($key->getImage() != null){  ?>
              <img class="card-img-top" src=<?=IMG_PATH.$key->getImage();?> alt="Card image cap">
            <?php } ?>
            <div class="card-body">
              <h4 class="card-title"><?=$key->getKitten()->getUsername();?></h4>
              <p class="card-text"> <?=$key->getContent();?> </p>
              <a href="#" class="btn btn-primary">Re-Meaw</a>
            </div>
            <div class="card-footer text-muted">
              <?=$key->getPublishDate();?>
            </div>
          </div>

          <?php }}?>
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
                     <input  type="submit"  class="btn btn-primary" name="submitWhisper" placeholder="Meaw">
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

  </body>

</html>
<?php ?>
