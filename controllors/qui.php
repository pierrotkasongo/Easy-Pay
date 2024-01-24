<?php
/**
* cette classe permet de recuperer les informations uniques des utilisateurs telles que:
leurs adresse ip, navigateur agent,système d'exploitation, adresse mac,...
*/
class qui
{
	//pour recuperer les adresses ip(on prend)
	function get_ip() {
        // IP si internet partagé
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        // IP derrière un proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        // Sinon : IP normale
        else {
            return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }
    }


    //recuperer l'adresse MAC(adresse physique) de sa première interface reseau(carte réseau) pour windows francais
    public function get_mac()
    {
		 ob_start();
		system('ipconfig /all');
		$mycom=ob_get_contents(); //enregistre la sortie de ‘system’
		ob_clean();
		$findme = "Adresse physique . . . . . . . . . . . :";
		$pos = strpos($mycom, $findme);
		$macp=substr($mycom,($pos+41),17);
		return $macp;
    }

    //recuperer le type de navigateur de l'utilisateur
   public function detect_browser() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browser        = "Inconnu";
	$browser_array = array( '/mobile/i'    => 'Handheld Browser',
				'/msie/i'      => 'Internet Explorer',
				'/trident/i'   => 'Internet Explorer',
				'/firefox/i'   => 'Firefox',
				'/safari/i'    => 'Safari',
				'/chrome/i'    => 'Chrome',
				'/edge/i'      => 'Edge',
				'/opera/i'     => 'Opera',
				'/netscape/i'  => 'Netscape',
				'/maxthon/i'   => 'Maxthon',
				'/konqueror/i' => 'Konqueror'
	);
	foreach ($browser_array as $regex => $value)
	if (preg_match($regex, $user_agent))
		$browser = $value;
	return $browser;
}
//recuperer le système d'exploitation de l'utilisateur
public function detect_os() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$os_platform  = "Inconnu";
	$os_array     = array(  '/windows nt 10/i'      =>  'Windows 10',
				'/windows nt 6.3/i'     =>  'Windows 8.1',
				'/windows nt 6.2/i'     =>  'Windows 8',
				'/windows nt 6.1/i'     =>  'Windows 7',
				'/windows nt 6.0/i'     =>  'Windows Vista',
				'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
				'/windows nt 5.1/i'     =>  'Windows XP',
				'/windows xp/i'         =>  'Windows XP',
				'/windows nt 5.0/i'     =>  'Windows 2000',
				'/windows me/i'         =>  'Windows ME',
			 	'/win98/i'              =>  'Windows 98',
				'/win95/i'              =>  'Windows 95',
				'/win16/i'              =>  'Windows 3.11',
				'/macintosh|mac os x/i' =>  'Mac OS X',
				'/mac_powerpc/i'        =>  'Mac OS 9',
				'/linux/i'              =>  'Linux',
				'/ubuntu/i'             =>  'Ubuntu',
				'/iphone/i'             =>  'iPhone',
				'/ipod/i'               =>  'iPod',
				'/ipad/i'               =>  'iPad',
				'/android/i'            =>  'Android',
				'/blackberry/i'         =>  'BlackBerry',
				'/webos/i'              =>  'Mobile'
	);
	foreach ($os_array as $regex => $value)
	if (preg_match($regex, $user_agent))
		$os_platform = $value;
	return $os_platform;
}


    //recuperer la langue du navigateur du client(on prend)

	public function get_lanaguage()
	{
		return substr ($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
	}
	//recuperer tout le user agent(on prend)
	public function get_user_agent()
	{
		return $_SERVER['HTTP_USER_AGENT'];
	}


}



?>