<?php
/**
Généré par CREUD 1.0.0.3 Beta écrit par LIKASA asbl
Mise à jour logiciel: le 7 Avril 2020


Lundi, le 11 Octobre 2021


 permettre la connexion a la base de données
**/
class connexion
{
	private $user_bd="root";
    private  $pass_bd="";
    private  $hote_bd="localhost";
    private  $nom_bd="easypay";
    public $_connect_tout;
    public $stmt;
    public $rows;
    public $affected_rows;


    //ouverture
public function ouverture()
    {
$this->_connect_tout=new PDO('mysql:host='.$this->hote_bd.';dbname='.$this->nom_bd.';charset=utf8mb4',$this->user_bd, $this->pass_bd);
    }
    public function fermeture()
    {$this->_connect_tout=null;
    unset($this->_connect_tout);}
}


?>
