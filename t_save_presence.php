<?php

function chargerClasse($classe)
{

if (file_exists($path = 'controllors/'.$classe .'.php') || file_exists($path = 'models/'.$classe .'.php'))
{
require $path;// On inclut la classe correspondante au paramètre passé.
}

} spl_autoload_register('chargerClasse');
$gen=new generer_nouveau_id();
$op=$gen->generer("ID","User");
ini_set('date.timezone', 'Africa/Kinshasa');
		$date_inscrip=date('y/m/d');
		$heure_=date('H:i:s e');
		$date_inscrip="".$date_inscrip." ".$heure_;
$a=new User($op,"email","password",2,"firstname","lastname");
$user12A=$_POST["email"];
//verifier l'existance de la variable

session_start();
$df=$_SESSION['verif_page'];
if($df==3)
{

	$_SESSION['verif_page']=3;



if(isset($user12A))
{
	
	

	if(empty($user12A))
	{
		header('location:500.php');
	}
	else
	{
		
	//tous les tests de validation et filtage
	//validation
	//filtrage
	//supprimer les espaces blancs
	$user12A= preg_replace("/\s+/","",$user12A);
			//filtrage
	//filtrage avec htlmentities()
			$user12A=htmlentities($user12A);//pour resoudre le problème d'injection de balise HTML et commande javascript dans nos liens
	//conversion en minuscule, notre règle
		$user12A=strtolower($user12A);	
        
		//ensuite tester si l'information existe
	$a->afficher_par_email($user12A);
	if($user12A!=$a->get_email())
	{
	
        header('location:500.php');

	}
    else if($a->get_role()==1)
	{
	
        header('location:500.php');

	}
	else
	{
					//demarrer la session et enregistrer data en tant que tel puis require la page(vue) de pass
                    $gen=new generer_nouveau_id();
                    $op1=$gen->generer("ID","PRESENCE");
                    ini_set('date.timezone', 'Africa/Kinshasa');
		            $date_inscrip=date('y/m/d');
					$presence=new Presence(1,1,$date_inscrip,1,"1","1");
                    $presence->set_id($op1);
                    $presence->set_id_user($a->get_id());
                    $presence->set_month(substr($date_inscrip,3,2));
                    $presence->set_year(substr($date_inscrip,0,2));
                    $presence->set_status(1);
                    $presence->enregistrer();


					$gen=new generer_nouveau_id();
                    $op2=$gen->generer("ID","SALARY");
                    ini_set('date.timezone', 'Africa/Kinshasa');
		            $date_inscrip=date('y/m/d');
					$salary1=new Salary($op2,$a->get_id(),$date_inscrip,66.83,substr($date_inscrip,3,2),1,substr($date_inscrip,0,2));
					$salary2=new Salary($op2,$a->get_id(),$date_inscrip,66.83,substr($date_inscrip,3,2),1,substr($date_inscrip,0,2));
					$salary2->afficher_month_year_idUser(substr($date_inscrip,3,2),substr($date_inscrip,0,2),$a->get_id());
					if($salary2->get_id()==0)
					{
						$salary1->enregistrer();
					}
					else
					{
						$amo=$salary2->get_amount()+66.83;
						$salary2->set_amount($amo);
						$salary2=new Salary($salary2->get_id(),$a->get_id(),$date_inscrip,$amo,substr($date_inscrip,3,2),1,substr($date_inscrip,0,2));
						$salary2->modifier_par_id($salary2->get_id());
						
					}
					header('location:success.php');
                    
                    
                    


	}

	}

}
else
{
    header('location:500.php');
}

}
else
{
    header('location:500.php');
}


?>