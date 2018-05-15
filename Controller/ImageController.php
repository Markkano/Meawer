<?php namespace Controller;

// Does not need to extend from Controller
class ImageController /*extends Controller*/{

  /*
  Se encarga de la subida de Imagen al servidor, asignandole un nombre unico
  y retornando el nombre del archivo.
  */
  public static function UploadImage($HttpInputName) {

    // List of allowed extensions of this server
    $allowedExtensions = array('jpg', 'jpeg', 'png');

    if(isset($_POST)) {

      // Check if HttpInputName has been sent
      if (!isset($_FILES[$HttpInputName])) {
        throw new \Exception("Error Processing Request", 1);
      }

      // Get the file extension
      $fileExtension = strtolower(pathinfo(basename($_FILES[$HttpInputName]["name"]),PATHINFO_EXTENSION));

      // Check that the file is a valid image
      if (!(($_FILES[$HttpInputName]["type"] == "image/jpeg")
      || ($_FILES[$HttpInputName]["type"] == "image/jpg")
      || ($_FILES[$HttpInputName]["type"] == "image/png"))
      || !in_array($fileExtension, $allowedExtensions)) {
        throw new \Exception("Not allowed file type", 1);
      }

      // Check file size
      if ($_FILES[$HttpInputName]["size"] > MAX_IMG_SIZE) {
        throw new \Exception("Image too big", 1);
      }

      // Unique name for the new Image. Append the file extension
      $newfilename = uniqid('', true).".".$fileExtension;

      // Try to upload the image to the IMG_PATH
      if (move_uploaded_file($_FILES[$HttpInputName]["tmp_name"], IMG_PATH . $newfilename)) {
        return $newfilename;
      } else {
        throw new \Exception("Error uploading image", 1);
      }
    }
  }
} ?>
