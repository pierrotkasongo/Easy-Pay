<?php
/**
G�n�r� par CREUD 1.0.0.3 Beta �crit par LIKASA asbl
Mise � jour logiciel: le 7 Avril 2020


Lundi, le 11 Octobre 2021
This class contains professor salries
**/
class Salary extends connexion
{
private $id;


private $id_user;


private $date;


private $amount;


private $month;
private $year;


private $status;


public  $error_msg="";
public $error_pas=0;
public $execut_reussi=0;


//les getters, les setters et les constructeurs




function __construct($id,$id_user,$date,$amount,$month,$status,$year) {
  $this->id = $id;
  $this->id_user = $id_user;
  $this->date = $date;
  $this->amount = $amount;
  $this->month = $month;
  $this->status = $status;
  $this->year = $year;
}




function get_id() {
  return $this->id;
}




function get_id_user() {
  return $this->id_user;
}




function get_date() {
  return $this->date;
}




function get_amount() {
  return $this->amount;
}




function get_month() {
  return $this->month;
}

function get_year() {
     return $this->year;
   }



function get_status() {
  return $this->status;
}




function set_id($id) {
     $this->id = $id;
}




function set_id_user($id_user) {
     $this->id_user = $id_user;
}




function set_date($date) {
     $this->date = $date;
}




function set_amount($amount) {
     $this->amount = $amount;
}




function set_month($month) {
     $this->month = $month;
}
function set_year($year) {
     $this->year = $year;
}




function set_status($status) {
     $this->status = $status;
}


//le reste de methodes


public function enregistrer()
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
     $this->ouverture();
     try {
     $this->stmt = $this->_connect_tout->prepare("INSERT INTO Salary(ID,ID_USER,REGDATE,AMOUNT,MONTH,STATUS,YEAR) VALUES(?,?,?,?,?,?,?)");
     $this->stmt->execute(array($this->id,$this->id_user,$this->date,$this->amount,$this->month,$this->status,$this->year));
     $this->affected_rows = $this->stmt->rowCount();
     $this->stmt->closeCursor();
     $this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;


         } catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:enregistrer][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
                                   }


}




public function afficher_tout()
{
     $resultat=array();
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
     $this->ouverture();
     try {
$this->stmt = $this->_connect_tout->prepare("SELECT * FROM  Salary ");
$this->stmt->execute(array());
$resultat=$this->stmt->fetchAll(PDO::FETCH_ASSOC);
return $resultat;
$this->stmt->closeCursor();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;


}catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:afficher_tout][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


//main
     //methodes �crites � la main
     public function afficher_month_year_idUser($month,$year,$idUser)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM Salary WHERE MONTH=? AND YEAR=? AND ID_USER=? ");
     $this->stmt->execute(array($month,$year,$idUser));
     $this->rows = $this->stmt->fetch();
     $this->stmt->closeCursor();
     $this->id=$this->rows['ID'];
     $this->id_user=$this->rows['ID_USER'];
     $this->amount=$this->rows['AMOUNT'];
     $this->month=$this->rows['MONTH'];
     $this->year=$this->rows['YEAR'];
     $this->status=$this->rows['STATUS'];
     $this->fermeture();
     $execut_reussi++;
     $this->execut_reussi+=$execut_reussi;
     }


     catch (PDOException $e) {
     ini_set('date.timezone', 'Africa/Kinshasa');
     $date_inscrip="".$date_inscrip." ".$heure_;
     $error_pas++;
     $this->error_pas+=$error_pas;
     $s=" ".get_class($this);
     $error_msg=$error_msg." | "."[methode:afficher_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
     $this->error_msg=$error_msg."".$this->error_msg;
     }


     }


     //fin main


public function afficher_par_id($id)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
 $this->stmt = $this->_connect_tout->prepare("SELECT * FROM Salary WHERE ID=?");
$this->stmt->execute(array($id));
$this->rows = $this->stmt->fetch();
$this->stmt->closeCursor();
$this->id=$this->rows['ID'];
$this->id_user=$this->rows['ID_USER'];
$this->date=$this->rows['REGDATE'];
$this->amount=$this->rows['AMOUNT'];
$this->month=$this->rows['MONTH'];
$this->status=$this->rows['STATUS'];
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:afficher_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function afficher_par_id_user($id_user)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
 $this->stmt = $this->_connect_tout->prepare("SELECT * FROM Salary WHERE ID_USER=?");
$this->stmt->execute(array($id_user));
$this->rows = $this->stmt->fetch();
$this->stmt->closeCursor();
$this->id=$this->rows['ID'];
$this->id_user=$this->rows['ID_USER'];
$this->date=$this->rows['DATE'];
$this->amount=$this->rows['AMOUNT'];
$this->month=$this->rows['MONTH'];
$this->status=$this->rows['STATUS'];
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:afficher_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function afficher_par_date($date)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
 $this->stmt = $this->_connect_tout->prepare("SELECT * FROM Salary WHERE DATE=?");
$this->stmt->execute(array($date));
$this->rows = $this->stmt->fetch();
$this->stmt->closeCursor();
$this->id=$this->rows['ID'];
$this->id_user=$this->rows['ID_USER'];
$this->date=$this->rows['DATE'];
$this->amount=$this->rows['AMOUNT'];
$this->month=$this->rows['MONTH'];
$this->status=$this->rows['STATUS'];
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:afficher_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function afficher_par_amount($amount)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
 $this->stmt = $this->_connect_tout->prepare("SELECT * FROM Salary WHERE AMOUNT=?");
$this->stmt->execute(array($amount));
$this->rows = $this->stmt->fetch();
$this->stmt->closeCursor();
$this->id=$this->rows['ID'];
$this->id_user=$this->rows['ID_USER'];
$this->date=$this->rows['DATE'];
$this->amount=$this->rows['AMOUNT'];
$this->month=$this->rows['MONTH'];
$this->status=$this->rows['STATUS'];
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:afficher_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function afficher_par_month($month)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
 $this->stmt = $this->_connect_tout->prepare("SELECT * FROM Salary WHERE MONTH=?");
$this->stmt->execute(array($month));
$this->rows = $this->stmt->fetch();
$this->stmt->closeCursor();
$this->id=$this->rows['ID'];
$this->id_user=$this->rows['ID_USER'];
$this->date=$this->rows['DATE'];
$this->amount=$this->rows['AMOUNT'];
$this->month=$this->rows['MONTH'];
$this->status=$this->rows['STATUS'];
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:afficher_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function afficher_par_status($status)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
 $this->stmt = $this->_connect_tout->prepare("SELECT * FROM Salary WHERE STATUS=?");
$this->stmt->execute(array($status));
$this->rows = $this->stmt->fetch();
$this->stmt->closeCursor();
$this->id=$this->rows['ID'];
$this->id_user=$this->rows['ID_USER'];
$this->date=$this->rows['DATE'];
$this->amount=$this->rows['AMOUNT'];
$this->month=$this->rows['MONTH'];
$this->status=$this->rows['STATUS'];
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:afficher_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function modifier_par_id($id)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("UPDATE Salary SET ID_USER=? , REGDATE=? , AMOUNT=? , MONTH=? , STATUS=?, YEAR=? WHERE  ID=?");
$this->stmt->execute(array($this->id_user, $this->date, $this->amount, $this->month, $this->status,$this->year, $id));
$this->affected_rows=$this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:modifier_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function modifier_par_id_user($id_user)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("UPDATE Salary SET ID_USER=? , DATE=? , AMOUNT=? , MONTH=? , STATUS=? WHERE  ID_USER=?");
$this->stmt->execute(array($this->id_user, $this->date, $this->amount, $this->month, $this->status, $id_user));
$this->affected_rows=$this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:modifier_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function modifier_par_date($date)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("UPDATE Salary SET ID_USER=? , DATE=? , AMOUNT=? , MONTH=? , STATUS=? WHERE  DATE=?");
$this->stmt->execute(array($this->id_user, $this->date, $this->amount, $this->month, $this->status, $date));
$this->affected_rows=$this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:modifier_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function modifier_par_amount($amount)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("UPDATE Salary SET ID_USER=? , DATE=? , AMOUNT=? , MONTH=? , STATUS=? WHERE  AMOUNT=?");
$this->stmt->execute(array($this->id_user, $this->date, $this->amount, $this->month, $this->status, $amount));
$this->affected_rows=$this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:modifier_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function modifier_par_month($month)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("UPDATE Salary SET ID_USER=? , DATE=? , AMOUNT=? , MONTH=? , STATUS=? WHERE  MONTH=?");
$this->stmt->execute(array($this->id_user, $this->date, $this->amount, $this->month, $this->status, $month));
$this->affected_rows=$this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:modifier_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function modifier_par_status($status)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("UPDATE Salary SET ID_USER=? , DATE=? , AMOUNT=? , MONTH=? , STATUS=? WHERE  STATUS=?");
$this->stmt->execute(array($this->id_user, $this->date, $this->amount, $this->month, $this->status, $status));
$this->affected_rows=$this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:modifier_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function supprimer_par_id($id)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("DELETE FROM Salary WHERE ID=:ID");
$this->stmt->bindValue(':ID', $id, PDO::PARAM_STR);
$this->stmt->execute();
$this->affected_rows = $this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:supprimer_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function supprimer_par_id_user($id_user)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("DELETE FROM Salary WHERE ID_USER=:ID_USER");
$this->stmt->bindValue(':ID_USER', $id_user, PDO::PARAM_STR);
$this->stmt->execute();
$this->affected_rows = $this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:supprimer_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function supprimer_par_date($date)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("DELETE FROM Salary WHERE DATE=:DATE");
$this->stmt->bindValue(':DATE', $date, PDO::PARAM_STR);
$this->stmt->execute();
$this->affected_rows = $this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:supprimer_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function supprimer_par_amount($amount)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("DELETE FROM Salary WHERE AMOUNT=:AMOUNT");
$this->stmt->bindValue(':AMOUNT', $amount, PDO::PARAM_STR);
$this->stmt->execute();
$this->affected_rows = $this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:supprimer_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function supprimer_par_month($month)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("DELETE FROM Salary WHERE MONTH=:MONTH");
$this->stmt->bindValue(':MONTH', $month, PDO::PARAM_STR);
$this->stmt->execute();
$this->affected_rows = $this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:supprimer_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


public function supprimer_par_status($status)
{
 $execut_reussi=0;
$date_inscrip=date('y/m/d');
$heure_=date('H:i:s e');
$error_msg="";
$error_pas=0;
$this->ouverture();


     try {
$this->stmt = $this->_connect_tout->prepare("DELETE FROM Salary WHERE STATUS=:STATUS");
$this->stmt->bindValue(':STATUS', $status, PDO::PARAM_STR);
$this->stmt->execute();
$this->affected_rows = $this->stmt->rowCount();
$this->fermeture();
 $execut_reussi++;
$this->execut_reussi+=$execut_reussi;
 }


catch (PDOException $e) {
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
$error_pas++;
$this->error_pas+=$error_pas;
$s=" ".get_class($this);
$error_msg=$error_msg." | "."[methode:supprimer_par][error_pas: ".$error_pas."][date:".$date_inscrip."][msg:".$e."][classe:".$s."]";
$this->error_msg=$error_msg."".$this->error_msg;
}


}


}
?>
