<?php
class contact {
    private $prenom;
    private $nom;
    private  $adresse;
    private  $image;
    private $email;
    private $numphone;
    private $datecreation; 
    private $pdo;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    public function __construct($db_name ,$db_user ='root',$db_pass ='',$db_host='localhost') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        
    }
    public function getPDO(){
        $pdo = new PDO('mysql:dbname=agenda;host=localhost', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        return $pdo;

    }
    public function query($statement){
        $req =$this->getPDO()->query('SELECT *FROM contact');
        $datas =$req->fetchAll(PDO::FETCH_OBJ);
        return $datas;

    }
    function setPrenom($prenom) {  
        $this->prenom = $prenom; 
    } 
    function getPrenom() { 
        return $this->prenom; }
     function getNom() { 
            return $this->nom; 
       } 
   
    function setNom($nom) {  
           $this->nom = $nom; 
       } 
 
   
   function getAdresse() { 
        return $this->adresse; 
   } 

   function setAdresse($adresse) {  
       $this->adresse = $adresse; 
   } 

   function getNumphone() { 
        return $this->numphone; 
   } 

   function setNumphone($numphone) {  
       $this->numphone = $numphone; 
   } 

   function getImage() { 
        return $this->image; 
   } 

   function setImage($image) {  
       $this->image = $image; 
   } 

   function getEmail() { 
        return $this->email; 
   } 

   function setEmail($email) {  
       $this->email = $email; 
   } 

   function getDatecreation() { 
        return $this->datecreation; 
   } 

   function setDatecreation($datecreation) {  
       $this->datecreation = $datecreation; 
   }  
    
}





















