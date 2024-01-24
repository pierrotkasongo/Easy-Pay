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
$a=new User($op,"email","password",1,"firstname","lastname");
$user12A=$_POST["email"];
$pass12A=$_POST["password"];
//verifier l'existance de la variable

session_start();
$df=$_SESSION['verif_page'];
if($df==2)
{

	$_SESSION['verif_page']=3;



if((isset($user12A))||(isset($pass12A)))
{
	
	

	if((empty($user12A))||(empty($pass12A)))
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
	$a->afficher_user_pass($user12A,$pass12A);
	if(($user12A!=$a->get_email())||($pass12A!=$a->get_password()))
	{
		header('location:500.php');

	}
	else
	{
					//demarrer la session et enregistrer data en tant que tel puis require la page(vue) de pass
		
					$_SESSION['user_valide']=$user12A;
                    $_SESSION['role_valide']=$a->get_role();
                    $_SESSION['fisrtname_valide']=$a->get_firstname();
                    $_SESSION['lastname_valide']=$a->get_lastname();
					if($a->get_role()==1)
                    {header('location:workspace.php');}
                    else
                    {header('location:workspace-prof.php');}
                    
                    
                    


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