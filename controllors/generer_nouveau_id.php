<?php
/**
*permet de générer un nouveau id lors de l'enregistrement
*
**/

class generer_nouveau_id extends connexion
{
	private $retour=0;
	public function generer($nom_id,$nom_table)
	{
		$this->ouverture();
    	try {
    		$this->stmt = $this->_connect_tout->prepare("SELECT max(".$nom_id.") id FROM ".$nom_table);
$this->stmt->execute(array());
$this->rows = $this->stmt->fetch();
$this->stmt->closeCursor();
$this->retour=$this->rows['id'];
$this->fermeture();
    		
    	}
    		
    	 catch (PDOException $e) {

    		echo "Il y a eu problème de connexion"."<br>"." Veuillez cliquer<a href='#'>ici </a> pour notifier à l'administrateur cette erreur"."<br>".$e;
    	}
    	return $this->retour+1;
	}
}
?>