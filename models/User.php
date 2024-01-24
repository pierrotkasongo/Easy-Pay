     <?php
     /**
     G�n�r� par CREUD 1.0.0.3 Beta �crit par LIKASA asbl
     Mise � jour logiciel: le 7 Avril 2020


     Lundi, le 11 Octobre 2021
     This class contains users
     **/
     class User extends connexion
     {
     private $id;


     private $email;


     private $password;


     private $role;


     private $firstname;


     private $lastname;


     public  $error_msg="";
     public $error_pas=0;
     public $execut_reussi=0;


     //les getters, les setters et les constructeurs




     function __construct($id,$email,$password,$role,$firstname,$lastname) {
     $this->id = $id;
     $this->email = $email;
     $this->password = $password;
     $this->role = $role;
     $this->firstname = $firstname;
     $this->lastname = $lastname;
     }




     function get_id() {
     return $this->id;
     }




     function get_email() {
     return $this->email;
     }




     function get_password() {
     return $this->password;
     }




     function get_role() {
     return $this->role;
     }




     function get_firstname() {
     return $this->firstname;
     }




     function get_lastname() {
     return $this->lastname;
     }




     function set_id($id) {
          $this->id = $id;
     }




     function set_email($email) {
          $this->email = $email;
     }




     function set_password($password) {
          $this->password = $password;
     }




     function set_role($role) {
          $this->role = $role;
     }




     function set_firstname($firstname) {
          $this->firstname = $firstname;
     }




     function set_lastname($lastname) {
          $this->lastname = $lastname;
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
          $this->stmt = $this->_connect_tout->prepare("INSERT INTO User(ID,EMAIL,PASSWORD,ROLE,FIRSTNAME,LASTNAME) VALUES(?,?,?,?,?,?)");
          $this->stmt->execute(array($this->id,$this->email,$this->password,$this->role,$this->firstname,$this->lastname));
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

     //main
     //methodes �crites � la main
     public function afficher_user_pass($user,$pass)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM User WHERE EMAIL=? AND PASSWORD=?");
     $this->stmt->execute(array($user,$pass));
     $this->rows = $this->stmt->fetch();
     $this->stmt->closeCursor();
     $this->id=$this->rows['ID'];
     $this->email=$this->rows['EMAIL'];
     $this->password=$this->rows['PASSWORD'];
     $this->role=$this->rows['ROLE'];
     $this->firstname=$this->rows['FIRSTNAME'];
     $this->lastname=$this->rows['LASTNAME'];
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
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM  User ");
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

     public function afficher_tout_role()
     {
          $resultat=array();
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
          $this->ouverture();
          try {
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM  User WHERE ROLE=2");
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


     public function afficher_par_id($id)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM User WHERE ID=?");
     $this->stmt->execute(array($id));
     $this->rows = $this->stmt->fetch();
     $this->stmt->closeCursor();
     $this->id=$this->rows['ID'];
     $this->email=$this->rows['EMAIL'];
     $this->password=$this->rows['PASSWORD'];
     $this->role=$this->rows['ROLE'];
     $this->firstname=$this->rows['FIRSTNAME'];
     $this->lastname=$this->rows['LASTNAME'];
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


     public function afficher_par_email($email)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM User WHERE EMAIL=?");
     $this->stmt->execute(array($email));
     $this->rows = $this->stmt->fetch();
     $this->stmt->closeCursor();
     $this->id=$this->rows['ID'];
     $this->email=$this->rows['EMAIL'];
     $this->password=$this->rows['PASSWORD'];
     $this->role=$this->rows['ROLE'];
     $this->firstname=$this->rows['FIRSTNAME'];
     $this->lastname=$this->rows['LASTNAME'];
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


     public function afficher_par_password($password)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM User WHERE PASSWORD=?");
     $this->stmt->execute(array($password));
     $this->rows = $this->stmt->fetch();
     $this->stmt->closeCursor();
     $this->id=$this->rows['ID'];
     $this->email=$this->rows['EMAIL'];
     $this->password=$this->rows['PASSWORD'];
     $this->role=$this->rows['ROLE'];
     $this->firstname=$this->rows['FIRSTNAME'];
     $this->lastname=$this->rows['LASTNAME'];
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


     public function afficher_par_role($role)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM User WHERE ROLE=?");
     $this->stmt->execute(array($role));
     $this->rows = $this->stmt->fetch();
     $this->stmt->closeCursor();
     $this->id=$this->rows['ID'];
     $this->email=$this->rows['EMAIL'];
     $this->password=$this->rows['PASSWORD'];
     $this->role=$this->rows['ROLE'];
     $this->firstname=$this->rows['FIRSTNAME'];
     $this->lastname=$this->rows['LASTNAME'];
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


     public function afficher_par_firstname($firstname)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM User WHERE FIRSTNAME=?");
     $this->stmt->execute(array($firstname));
     $this->rows = $this->stmt->fetch();
     $this->stmt->closeCursor();
     $this->id=$this->rows['ID'];
     $this->email=$this->rows['EMAIL'];
     $this->password=$this->rows['PASSWORD'];
     $this->role=$this->rows['ROLE'];
     $this->firstname=$this->rows['FIRSTNAME'];
     $this->lastname=$this->rows['LASTNAME'];
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


     public function afficher_par_lastname($lastname)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("SELECT * FROM User WHERE LASTNAME=?");
     $this->stmt->execute(array($lastname));
     $this->rows = $this->stmt->fetch();
     $this->stmt->closeCursor();
     $this->id=$this->rows['ID'];
     $this->email=$this->rows['EMAIL'];
     $this->password=$this->rows['PASSWORD'];
     $this->role=$this->rows['ROLE'];
     $this->firstname=$this->rows['FIRSTNAME'];
     $this->lastname=$this->rows['LASTNAME'];
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
     $this->stmt = $this->_connect_tout->prepare("UPDATE User SET EMAIL=? , PASSWORD=? , ROLE=? , FIRSTNAME=? , LASTNAME=? WHERE  ID=?");
     $this->stmt->execute(array($this->email, $this->password, $this->role, $this->firstname, $this->lastname, $id));
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


     public function modifier_par_email($email)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("UPDATE User SET EMAIL=? , PASSWORD=? , ROLE=? , FIRSTNAME=? , LASTNAME=? WHERE  EMAIL=?");
     $this->stmt->execute(array($this->email, $this->password, $this->role, $this->firstname, $this->lastname, $email));
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


     public function modifier_par_password($password)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("UPDATE User SET EMAIL=? , PASSWORD=? , ROLE=? , FIRSTNAME=? , LASTNAME=? WHERE  PASSWORD=?");
     $this->stmt->execute(array($this->email, $this->password, $this->role, $this->firstname, $this->lastname, $password));
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


     public function modifier_par_role($role)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("UPDATE User SET EMAIL=? , PASSWORD=? , ROLE=? , FIRSTNAME=? , LASTNAME=? WHERE  ROLE=?");
     $this->stmt->execute(array($this->email, $this->password, $this->role, $this->firstname, $this->lastname, $role));
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


     public function modifier_par_firstname($firstname)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("UPDATE User SET EMAIL=? , PASSWORD=? , ROLE=? , FIRSTNAME=? , LASTNAME=? WHERE  FIRSTNAME=?");
     $this->stmt->execute(array($this->email, $this->password, $this->role, $this->firstname, $this->lastname, $firstname));
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


     public function modifier_par_lastname($lastname)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("UPDATE User SET EMAIL=? , PASSWORD=? , ROLE=? , FIRSTNAME=? , LASTNAME=? WHERE  LASTNAME=?");
     $this->stmt->execute(array($this->email, $this->password, $this->role, $this->firstname, $this->lastname, $lastname));
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
     $this->stmt = $this->_connect_tout->prepare("DELETE FROM User WHERE ID=:ID");
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


     public function supprimer_par_email($email)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("DELETE FROM User WHERE EMAIL=:EMAIL");
     $this->stmt->bindValue(':EMAIL', $email, PDO::PARAM_STR);
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


     public function supprimer_par_password($password)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("DELETE FROM User WHERE PASSWORD=:PASSWORD");
     $this->stmt->bindValue(':PASSWORD', $password, PDO::PARAM_STR);
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


     public function supprimer_par_role($role)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("DELETE FROM User WHERE ROLE=:ROLE");
     $this->stmt->bindValue(':ROLE', $role, PDO::PARAM_STR);
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


     public function supprimer_par_firstname($firstname)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("DELETE FROM User WHERE FIRSTNAME=:FIRSTNAME");
     $this->stmt->bindValue(':FIRSTNAME', $firstname, PDO::PARAM_STR);
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


     public function supprimer_par_lastname($lastname)
     {
     $execut_reussi=0;
     $date_inscrip=date('y/m/d');
     $heure_=date('H:i:s e');
     $error_msg="";
     $error_pas=0;
     $this->ouverture();


          try {
     $this->stmt = $this->_connect_tout->prepare("DELETE FROM User WHERE LASTNAME=:LASTNAME");
     $this->stmt->bindValue(':LASTNAME', $lastname, PDO::PARAM_STR);
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
