<?php
/**
 * Classe MySQL utilisant un design pattern Singleton
 * 
 * @author  Julien Crego <prenomnom@gmail.com>
 * @version 1.0
 */

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

class MySQL {

    static private $oPDO = NULL;
    static private $oInstance = NULL;
    
    /**
     * Constructeur défini en privé pour le rendre inaccessible
     */
    private function __construct() {    
        self::$oPDO = new PDO('mysql:host=localhost;dbname=SAE501_public', 'admin', 'p@ssw0rd');
        self::$oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        self::$oPDO->query("SET NAMES 'utf8'");
    }

    /**
     * Methode magique de destruction de l'instance MySQL
     */
    public function __destruct() {
        self::$oPDO = null ;
    }

    /**
     * Methode magique clone verrouillée via une exception
     */
    public function __clone() {
        throw new Exception('Impossible de cloner une connexion SQL protégée par un singleton');
    }

   /**
    * Méthode magique pour rétablir toute connexion de base de données 
    * qui aurait été perdue durant la linéarisation
    */
    public function __wakeUp( ) {
        // Vérification de la connexion
        if(self::$oInstance instanceof self) {
                throw new MySQLException();
        }
        // Correction de la reference
        self::$oInstance = $this;
    }
    
    /**
     * Méthode magique pour l'appel des fonctions de l'objet PDO quand 
     * elles ne sont pas définies dans la classe
     * 
     * @param type $method
     * @param type $params
     */
    public function __call($method, $params) {
        if(self::$oPDO == NULL){
            self::__construct();
        }
        
        return call_user_func_array(array(self::$oPDO, $method), $params);
    }
    
   /**
    * Fournit l'unique instance du Singleton
    *
    * @return    MySQL
    */
    static public function getInstance(){
        // Verification que l'instance n'a pas déja ete initialisée
        if(!(self::$oInstance instanceof self)){
            self::$oInstance = new self();
        }
        // Retour de l'instance unique
        return self::$oInstance;
    }  
}
