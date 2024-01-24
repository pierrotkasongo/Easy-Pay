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
$pass12A=$_POST["password"];
$firstname12A=$_POST["firstname"];
$lastname12A=$_POST["lastname"];
//verifier l'existance de la variable

session_start();
$df=$_SESSION['verif_page'];
if($df==3)
{

	$_SESSION['verif_page']=3;



if((isset($user12A))||(isset($pass12A))||(isset($firstname12A))||(isset($lastname12A)))
{
	
	

	if((empty($user12A))||(empty($pass12A))||(empty($firstname12A))||(empty($lastname12A)))
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
    $firstname12A= preg_replace("/\s+/","",$firstname12A);
    $lastname12A= preg_replace("/\s+/","",$lastname12A);
			//filtrage
	//filtrage avec htlmentities()
			$user12A=htmlentities($user12A);//pour resoudre le problème d'injection de balise HTML et commande javascript dans nos liens
            $firstname12A=htmlentities($firstname12A);
            $lastname12A=htmlentities($lastname12A);
	//conversion en minuscule, notre règle
		$user12A=strtolower($user12A);	
        $firstname12A=strtolower($firstname12A);
        $lastname12A=strtolower($lastname12A);

        
		//ensuite tester si l'information existe
	$a->afficher_par_email($user12A);
	if($user12A==$a->get_email())
	{
	
        header('location:500.php');

	}
	else
	{
					//demarrer la session et enregistrer data en tant que tel puis require la page(vue) de pass
                    $gen=new generer_nouveau_id();
                    $op1=$gen->generer("ID","User");
                    $a=new User($op,"email","password",2,"firstname","lastname");
                    $a->set_id($op1);
					$a->set_email($user12A);
                    $a->set_firstname($firstname12A);
                    $a->set_lastname($lastname12A);
                    $a->set_password($pass12A);
                    $a->set_role(2);
                    $a->enregistrer();
                    $_SESSION['fisrtname_valide']=$a->get_firstname();
                    $_SESSION['lastname_valide']=$a->get_lastname();
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