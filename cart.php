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
  public function addProduct($id_produit,$libelle_produit,$qte=1,$prix_unitaire_produit=0){
    if($qte > 0 ){
      $_SESSION['panier'][$id_produit] = array('id_produit'=>$id_produit
                                                ,'produit'=>$libelle_produit
                                                ,'qte'=>$qte
                                                ,'prix_unitaire'=>$prix_unitaire_produit
                                                ); 
      $this->updateTotalPriceProduct($id_produit);
    }else{
      return "ERREUR : Vous ne pouvez pas ajouter un produit sans quantité..."; 
    }
  }
  
  private function updateTotalPriceProduct($id_produit){
    if(isset($_SESSION['panier'][$id_produit])){
      $_SESSION['panier'][$id_produit]['prix_Total'] = $_SESSION['panier'][$id_produit]['qte'] * $_SESSION['panier'][$id_produit]['prix_unitaire'];
    }
  }
  
