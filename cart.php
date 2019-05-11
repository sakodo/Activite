 <?php
/**
*  FICHIER : cart.class.php
*
*/
class cart{
  
  /**
  * Constructeur de la class
  */
  function __construct(){
    // Démarrage des sessions si pas déjà démarrées
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $this->initCart();
  }
  public function initCart(){
    $_SESSION['panier'] = array(); 
  }
  public function getList(){
    return !empty($_SESSION['panier']) ? $_SESSION['panier'] : NULL;

