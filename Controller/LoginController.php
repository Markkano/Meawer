<?php namespace Controller;
use Daos\KittenDAO;
use Models\Kitten;

// Controla los inicios de Sesion, redirigiendo al muro.
class LoginController extends Controller {

  public function __construct() {
    parent::__construct();
    unset($_SESSION['kitten']);
  }

  public function Index() {
    include_once parent::View("login");
  }

  /* Recibe los datos del formulario, se encarga de validar los datos y redirigir
  *  al usuario.
  */
  public function Login($username, $password) {
    // Sanitizar inputs del usuario
    if (isset($username) && isset($password)) {
      $username = filter_var($username, FILTER_SANITIZE_EMAIL);
      $password = filter_var($password, FILTER_SANITIZE_EMAIL);

      // Traer Kitten usando el username o en su defecto el email
      try {
        $kitten = KittenDAO::SelectByUsername($username);
        if (is_null($kitten)) {
          $kitten = KittenDAO::SelectByEmail($username);
        }

        if (isset($kitten)) {
          // Validar password
          if (strcmp($kitten->getPassword(), $password) == 0) {
            // Guardar en Session y redirigir
            $this->AcceptLogin($kitten);
            return;
          }
        }
        // No se encontro el Kitten, o no correspondia el password
        $error = "Credenciales invalidas";

      } catch(\PDOException $e) {
        // PDOException
        $error = "No se pudo acceder a la Base de Datos";
      }
    } else {
      // No se recibieron datos del formulario
      $error = "Compruebe los datos ingresados";
    }

    // Vuelve a mostrar el Login, para que el usuario intente iniciar sesion de nuevo
    include_once parent::View("login");
  }

  // Recibe el Kitten validado que iniciara sesion
  private function AcceptLogin (Kitten $kitten) {
    // Setea la variable de sesion.
    $_SESSION['kitten'] = $kitten;
    // Y redirige a la Controladora
    header('location: '.BASE_URL.'ViewMeaws/');
  }
} ?>
