<?php
session_start();
include "admin/dbcon.php";

$auth = $conn->query("SELECT * FROM `auth` WHERE `id` = 1 and `authorization` = 1");

if($auth->num_rows == 1){
	$allow_mc = $conn->query("SELECT * FROM `allowed_mac_add` WHERE `mac_add` = '".trim($md)."'");
	
	if ($allow_mc->num_rows == 0) {
		header('location:404');
	}
}


$msg ="";
unset($_SESSION['email_promp']);
if(isset($_POST['log-in'])){
	// $agent = isset($_POST['agents']) ? json_decode($_POST['agents'],true):array();
	// var_dump($agent);
	// echo $agent['device'];
	// $agent["SAS"] = 'sample';
	// echo "<br>".json_encode($agent);
	// echo "<script>
	// var json = JSON.parse('".json_encode($agent)."');

	// console.log(json);
	// </script>";

	// exit();
	$username = $_POST['uname'];
	$password1 = $_POST['psw'];
	$password = sha1($password1);

	$sql = "SELECT * FROM admin WHERE username=? AND password=?";
	$stmt = $conn->prepare($sql); 
	$stmt->bind_param("ss",$username, $password);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	if ($result->num_rows==1 && $row['user_type']=="admin") {

		$_SESSION['username'] = $row['name'];
		$_SESSION['role'] = $row['user_type']; 
		$_SESSION['admin_id'] = $row['id'];
		$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Successful Account Login','".$row['id']."','$ip','$device','$md')");
		header("location:admin/dashboard.php");
		exit(); 
	}elseif ($result->num_rows==1 && $row['user_type']=="user") {
		$_SESSION['username'] = $row['name'];
		$_SESSION['role'] = $row['user_type'];
		$_SESSION['admin_id'] = $row['id'];

		$conn->query("INSERT INTO `logs_tbl` (`action`, `user_id`,`ip_address`,`device`,`mac_add`) VALUES ('Successful Account Login','".$row['id']."','$ip','$device','$md')");
		header("location:user/dashboard.php"); 
		exit(); 
	}else{
		$msg = "Username or Password is incorrect. ";
	}
}

?>		

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon"  href="../styles/icon.png">

	<link rel="icon" type="image/x-icon" sizes="16x16" href="./styles/icon.png">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="https:///maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<title>CCC Pre-Register Account Login</title>
	<link rel="stylesheet" type="text/css" href="./styles/for-index.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>


</head>
<body>
 
<div  class="container">
<div class="sheet" style="background-color: #007acc;"><!-- #1a53ff -->
<img src="./styles/index.png" class="center">

<center>
<form id="qwqw" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
		<legend style="font-size: 25px">CCC Pre-Register System Login</legend>
		<p>Username: </p>
		<input type="username" name="uname" value="" placeholder="Enter Username" required=""><br>
		<p>Password: </p>
		<input  type="password" name="psw" value="" placeholder="Enter Password" required=""><br>
		
		<button  type="Submit" name="log-in" style="margin-top: 10px; font-family: 'Poppins', sans-serif; font-size: 90%; padding: 8px">Log-in</button>
		<br>
		<h5 class="text-danger text-center"><?= $msg; ?></h5>
	</form>
	<a href="forget_pass.php" class="btn btn-default">Forget Password?</a>
</center>
</div>
</div>


</body>
</html>

<script type="text/javascript">
	(function(){"use strict";var b={function:!0,object:!0},c=b[typeof window]&&window||this,e=b[typeof exports]&&exports,f=b[typeof module]&&module&&!module.nodeType&&module,a=e&&f&&"object"==typeof global&&global;a&&(a.global===a||a.window===a||a.self===a)&&(c=a);var j=/\bOpera/,g=Object.prototype,k=g.hasOwnProperty,l=g.toString;function m(a){return(a=String(a)).charAt(0).toUpperCase()+a.slice(1)}function n(a){return a=r(a),/^(?:webOS|i(?:OS|P))/.test(a)?a:m(a)}function h(a,c){for(var b in a)k.call(a,b)&&c(a[b],b,a)}function o(a){return null==a?m(a):l.call(a).slice(8,-1)}function p(a){return String(a).replace(/([ -])(?!$)/g,"$1?")}function q(a,c){var b=null;return!function(a,d){var c=-1,b=a?a.length:0;if("number"==typeof b&&b> -1&&b<=9007199254740991)for(;++c<b;)d(a[c],c,a);else h(a,d)}(a,function(d,e){b=c(b,d,e,a)}),b}function r(a){return String(a).replace(/^ +| +$/g,"")}function i(e){var D,E,F,a,I,s=c,x=e&&"object"==typeof e&&"String"!=o(e);x&&(s=e,e=null);var L,M,N,O,y=s.navigator||{},J=y.userAgent||"";e||(e=J);var P=x?!!y.likeChrome:/\bChrome\b/.test(e)&&!/internal|\n/i.test(l.toString()),G="Object",Q=x?G:"ScriptBridgingProxyObject",R=x?G:"Environment",S=x&&s.java?"JavaPackage":o(s.java),T=x?G:"RuntimeObject",z=/\bJava/.test(S)&&s.java,U=z&&o(s.environment)==R,V=z?"a":"\u03B1",W=z?"b":"\u03B2",H=s.document||{},v=s.operamini||s.opera,A=j.test(A=x&&v?v["[[Class]]"]:o(v))?A:v=null,B=e,k=[],C=null,w=e==J,f=w&&v&&"function"==typeof v.version&&v.version(),m=q(L=[{label:"EdgeHTML",pattern:"Edge"},"Trident",{label:"WebKit",pattern:"AppleWebKit"},"iCab","Presto","NetFront","Tasman","KHTML","Gecko"],function(b,a){return b||RegExp("\\b"+(a.pattern||p(a))+"\\b","i").exec(e)&&(a.label||a)}),b=q(M=["Adobe AIR","Arora","Avant Browser","Breach","Camino","Electron","Epiphany","Fennec","Flock","Galeon","GreenBrowser","iCab","Iceweasel","K-Meleon","Konqueror","Lunascape","Maxthon",{label:"Microsoft Edge",pattern:"(?:Edge|Edg|EdgA|EdgiOS)"},"Midori","Nook Browser","PaleMoon","PhantomJS","Raven","Rekonq","RockMelt",{label:"Samsung Internet",pattern:"SamsungBrowser"},"SeaMonkey",{label:"Silk",pattern:"(?:Cloud9|Silk-Accelerated)"},"Sleipnir","SlimBrowser",{label:"SRWare Iron",pattern:"Iron"},"Sunrise","Swiftfox","Vivaldi","Waterfox","WebPositive",{label:"Yandex Browser",pattern:"YaBrowser"},{label:"UC Browser",pattern:"UCBrowser"},"Opera Mini",{label:"Opera Mini",pattern:"OPiOS"},"Opera",{label:"Opera",pattern:"OPR"},"Chromium","Chrome",{label:"Chrome",pattern:"(?:HeadlessChrome)"},{label:"Chrome Mobile",pattern:"(?:CriOS|CrMo)"},{label:"Firefox",pattern:"(?:Firefox|Minefield)"},{label:"Firefox for iOS",pattern:"FxiOS"},{label:"IE",pattern:"IEMobile"},{label:"IE",pattern:"MSIE"},"Safari"],function(b,a){return b||RegExp("\\b"+(a.pattern||p(a))+"\\b","i").exec(e)&&(a.label||a)}),g=X([{label:"BlackBerry",pattern:"BB10"},"BlackBerry",{label:"Galaxy S",pattern:"GT-I9000"},{label:"Galaxy S2",pattern:"GT-I9100"},{label:"Galaxy S3",pattern:"GT-I9300"},{label:"Galaxy S4",pattern:"GT-I9500"},{label:"Galaxy S5",pattern:"SM-G900"},{label:"Galaxy S6",pattern:"SM-G920"},{label:"Galaxy S6 Edge",pattern:"SM-G925"},{label:"Galaxy S7",pattern:"SM-G930"},{label:"Galaxy S7 Edge",pattern:"SM-G935"},"Google TV","Lumia","iPad","iPod","iPhone","Kindle",{label:"Kindle Fire",pattern:"(?:Cloud9|Silk-Accelerated)"},"Nexus","Nook","PlayBook","PlayStation Vita","PlayStation","TouchPad","Transformer",{label:"Wii U",pattern:"WiiU"},"Wii","Xbox One",{label:"Xbox 360",pattern:"Xbox"},"Xoom"]),t=q(N={Apple:{iPad:1,iPhone:1,iPod:1},Alcatel:{},Archos:{},Amazon:{Kindle:1,"Kindle Fire":1},Asus:{Transformer:1},"Barnes & Noble":{Nook:1},BlackBerry:{PlayBook:1},Google:{"Google TV":1,Nexus:1},HP:{TouchPad:1},HTC:{},Huawei:{},Lenovo:{},LG:{},Microsoft:{Xbox:1,"Xbox One":1},Motorola:{Xoom:1},Nintendo:{"Wii U":1,Wii:1},Nokia:{Lumia:1},Oppo:{},Samsung:{"Galaxy S":1,"Galaxy S2":1,"Galaxy S3":1,"Galaxy S4":1},Sony:{PlayStation:1,"PlayStation Vita":1},Xiaomi:{Mi:1,Redmi:1}},function(c,a,b){return c||(a[g]||a[/^[a-z]+(?: +[a-z]+\b)*/i.exec(g)]||RegExp("\\b"+p(b)+"(?:\\b|\\w*\\d)","i").exec(e))&&b}),d=q(O=["Windows Phone","KaiOS","Android","CentOS",{label:"Chrome OS",pattern:"CrOS"},"Debian",{label:"DragonFly BSD",pattern:"DragonFly"},"Fedora","FreeBSD","Gentoo","Haiku","Kubuntu","Linux Mint","OpenBSD","Red Hat","SuSE","Ubuntu","Xubuntu","Cygwin","Symbian OS","hpwOS","webOS ","webOS","Tablet OS","Tizen","Linux","Mac OS X","Macintosh","Mac","Windows 98;","Windows "],function(b,c){var a,d,f,g,h=c.pattern||p(c);return!b&&(b=RegExp("\\b"+h+"(?:/[\\d.]+|[ \\w.]*)","i").exec(e))&&(b=(a=b,d=h,f=c.label||c,g={"10.0":"10","6.4":"10 Technical Preview","6.3":"8.1","6.2":"8","6.1":"Server 2008 R2 / 7","6.0":"Server 2008 / Vista","5.2":"Server 2003 / XP 64-bit","5.1":"XP","5.01":"2000 SP1","5.0":"2000","4.0":"NT","4.90":"ME"},d&&f&&/^Win/i.test(a)&&!/^Windows Phone /i.test(a)&&(g=g[/[\d.]+$/.exec(a)])&&(a="Windows "+g),a=String(a),d&&f&&(a=a.replace(RegExp(d,"i"),f)),a=n(a.replace(/ ce$/i," CE").replace(/\bhpw/i,"web").replace(/\bMacintosh\b/,"Mac OS").replace(/_PowerPC\b/i," OS").replace(/\b(OS X) [^ \d]+/i,"$1").replace(/\bMac (OS X)\b/,"$1").replace(/\/(\d)/," $1").replace(/_/g,".").replace(/(?: BePC|[ .]*fc[ \d.]+)$/i,"").replace(/\bx86\.64\b/gi,"x86_64").replace(/\b(Windows Phone) OS\b/,"$1").replace(/\b(Chrome OS \w+) [\d.]+\b/,"$1").split(" on ")[0]))),b});function X(a){return q(a,function(b,a){var c=a.pattern||p(a);return!b&&(b=RegExp("\\b"+c+" *\\d+[.\\w_]*","i").exec(e)||RegExp("\\b"+c+" *\\w+-[\\w]*","i").exec(e)||RegExp("\\b"+c+"(?:; *(?:[a-z]+[_-])?[a-z]+\\d+|[^ ();-]*)","i").exec(e))&&((b=String(a.label&&!RegExp(c,"i").test(a.label)?a.label:b).split("/"))[1]&&!/[\d.]+/.test(b[0])&&(b[0]+=" "+b[1]),a=a.label||a,b=n(b[0].replace(RegExp(c,"i"),a).replace(RegExp("; *(?:"+a+"[_-])?","i")," ").replace(RegExp("("+a+")[-_.]?(\\w)","i"),"$1 $2"))),b})}function K(a){return q(a,function(a,b){return a||(RegExp(b+"(?:-[\\d.]+/|(?: for [\\w-]+)?[ /-])([\\d.]+[^ ();/_-]*)","i").exec(e)||0)[1]||null})}if(m&&(m=[m]),/\bAndroid\b/.test(d)&&!g&&(a=/\bAndroid[^;]*;(.*?)(?:Build|\) AppleWebKit)\b/i.exec(e))&&(g=r(a[1]).replace(/^[a-z]{2}-[a-z]{2};\s*/i,"")||null),t&&!g?g=X([t]):t&&g&&(g=g.replace(RegExp("^("+p(t)+")[-_.\\s]","i"),t+" ").replace(RegExp("^("+p(t)+")[-_.]?(\\w)","i"),t+" $2")),(a=/\bGoogle TV\b/.exec(g))&&(g=a[0]),/\bSimulator\b/i.test(e)&&(g=(g?g+" ":"")+"Simulator"),"Opera Mini"==b&&/\bOPiOS\b/.test(e)&&k.push("running in Turbo/Uncompressed mode"),"IE"==b&&/\blike iPhone OS\b/.test(e)?(t=(a=i(e.replace(/like iPhone OS/,""))).manufacturer,g=a.product):/^iP/.test(g)?(b||(b="Safari"),d="iOS"+((a=/ OS ([\d_]+)/i.exec(e))?" "+a[1].replace(/_/g,"."):"")):"Konqueror"==b&&/^Linux\b/i.test(d)?d="Kubuntu":t&&"Google"!=t&&(/Chrome/.test(b)&&!/\bMobile Safari\b/i.test(e)||/\bVita\b/.test(g))||/\bAndroid\b/.test(d)&&/^Chrome/.test(b)&&/\bVersion\//i.test(e)?(b="Android Browser",d=/\bAndroid\b/.test(d)?d:"Android"):"Silk"==b?(/\bMobi/i.test(e)||(d="Android",k.unshift("desktop mode")),/Accelerated *= *true/i.test(e)&&k.unshift("accelerated")):"UC Browser"==b&&/\bUCWEB\b/.test(e)?k.push("speed mode"):"PaleMoon"==b&&(a=/\bFirefox\/([\d.]+)\b/.exec(e))?k.push("identifying as Firefox "+a[1]):"Firefox"==b&&(a=/\b(Mobile|Tablet|TV)\b/i.exec(e))?(d||(d="Firefox OS"),g||(g=a[1])):!b||(a=!/\bMinefield\b/i.test(e)&&/\b(?:Firefox|Safari)\b/.exec(b))?(b&&!g&&/[\/,]|^[^(]+?\)/.test(e.slice(e.indexOf(a+"/")+8))&&(b=null),(a=g||t||d)&&(g||t||/\b(?:Android|Symbian OS|Tablet OS|webOS)\b/.test(d))&&(b=/[a-z]+(?: Hat)?/i.exec(/\bAndroid\b/.test(d)?d:a)+" Browser")):"Electron"==b&&(a=(/\bChrome\/([\d.]+)\b/.exec(e)||0)[1])&&k.push("Chromium "+a),f||(f=K(["(?:Cloud9|CriOS|CrMo|Edge|Edg|EdgA|EdgiOS|FxiOS|HeadlessChrome|IEMobile|Iron|Opera ?Mini|OPiOS|OPR|Raven|SamsungBrowser|Silk(?!/[\\d.]+$)|UCBrowser|YaBrowser)","Version",p(b),"(?:Firefox|Minefield|NetFront)"])),(a="iCab"==m&&parseFloat(f)>3&&"WebKit"||/\bOpera\b/.test(b)&&(/\bOPR\b/.test(e)?"Blink":"Presto")||/\b(?:Midori|Nook|Safari)\b/i.test(e)&&!/^(?:Trident|EdgeHTML)$/.test(m)&&"WebKit"|| !m&&/\bMSIE\b/i.test(e)&&("Mac OS"==d?"Tasman":"Trident")||"WebKit"==m&&/\bPlayStation\b(?! Vita\b)/i.test(b)&&"NetFront")&&(m=[a]),"IE"==b&&(a=(/; *(?:XBLWP|ZuneWP)(\d+)/i.exec(e)||0)[1])?(b+=" Mobile",d="Windows Phone "+(/\+$/.test(a)?a:a+".x"),k.unshift("desktop mode")):/\bWPDesktop\b/i.test(e)?(b="IE Mobile",d="Windows Phone 8.x",k.unshift("desktop mode"),f||(f=(/\brv:([\d.]+)/.exec(e)||0)[1])):"IE"!=b&&"Trident"==m&&(a=/\brv:([\d.]+)/.exec(e))&&(b&&k.push("identifying as "+b+(f?" "+f:"")),b="IE",f=a[1]),w){if(E="global",F=null!=(D=s)?typeof D[E]:"number",/^(?:boolean|number|string|undefined)$/.test(F)||"object"==F&&!D[E])o(a=s.runtime)==Q?(b="Adobe AIR",d=a.flash.system.Capabilities.os):o(a=s.phantom)==T?(b="PhantomJS",f=(a=a.version||null)&&a.major+"."+a.minor+"."+a.patch):"number"==typeof H.documentMode&&(a=/\bTrident\/(\d+)/i.exec(e))?(f=[f,H.documentMode],(a=+a[1]+4)!=f[1]&&(k.push("IE "+f[1]+" mode"),m&&(m[1]=""),f[1]=a),f="IE"==b?String(f[1].toFixed(1)):f[0]):"number"==typeof H.documentMode&&/^(?:Chrome|Firefox)\b/.test(b)&&(k.push("masking as "+b+" "+f),b="IE",f="11.0",m=["Trident"],d="Windows");else if(z&&(B=(a=z.lang.System).getProperty("os.arch"),d=d||a.getProperty("os.name")+" "+a.getProperty("os.version")),U){try{f=s.require("ringo/engine").version.join("."),b="RingoJS"}catch(Y){(a=s.system)&&a.global.system==s.system&&(b="Narwhal",d||(d=a[0].os||null))}b||(b="Rhino")}else"object"==typeof s.process&&!s.process.browser&&(a=s.process)&&("object"==typeof a.versions&&("string"==typeof a.versions.electron?(k.push("Node "+a.versions.node),b="Electron",f=a.versions.electron):"string"==typeof a.versions.nw&&(k.push("Chromium "+f,"Node "+a.versions.node),b="NW.js",f=a.versions.nw)),b||(b="Node.js",B=a.arch,d=a.platform,f=/[\d.]+/.exec(a.version),f=f?f[0]:null));d=d&&n(d)}if(f&&(a=/(?:[ab]|dp|pre|[ab]\d+pre)(?:\d+\+?)?$/i.exec(f)||/(?:alpha|beta)(?: ?\d)?/i.exec(e+";"+(w&&y.appMinorVersion))||/\bMinefield\b/i.test(e)&&"a")&&(C=/b/i.test(a)?"beta":"alpha",f=f.replace(RegExp(a+"\\+?$"),"")+("beta"==C?W:V)+(/\d+\+?/.exec(a)||"")),"Fennec"==b||"Firefox"==b&&/\b(?:Android|Firefox OS|KaiOS)\b/.test(d))b="Firefox Mobile";else if("Maxthon"==b&&f)f=f.replace(/\.[\d.]+/,".x");else if(/\bXbox\b/i.test(g))"Xbox 360"==g&&(d=null),"Xbox 360"==g&&/\bIEMobile\b/.test(e)&&k.unshift("mobile mode");else if((/^(?:Chrome|IE|Opera)$/.test(b)||b&&!g&&!/Browser|Mobi/.test(b))&&("Windows CE"==d||/Mobi/i.test(e)))b+=" Mobile";else if("IE"==b&&w)try{null===s.external&&k.unshift("platform preview")}catch(Z){k.unshift("embedded")}else(/\bBlackBerry\b/.test(g)||/\bBB10\b/.test(e))&&(a=(RegExp(g.replace(/ +/g," *")+"/([.\\d]+)","i").exec(e)||0)[1]||f)?(d=((a=[a,/BB10/.test(e)])[1]?(g=null,t="BlackBerry"):"Device Software")+" "+a[0],f=null):this!=h&&"Wii"!=g&&(w&&v||/Opera/.test(b)&&/\b(?:MSIE|Firefox)\b/i.test(e)||"Firefox"==b&&/\bOS X (?:\d+\.){2,}/.test(d)||"IE"==b&&(d&&!/^Win/.test(d)&&f>5.5||/\bWindows XP\b/.test(d)&&f>8||8==f&&!/\bTrident\b/.test(e)))&&!j.test(a=i.call(h,e.replace(j,"")+";"))&&a.name&&(a="ing as "+a.name+((a=a.version)?" "+a:""),j.test(b)?(/\bIE\b/.test(a)&&"Mac OS"==d&&(d=null),a="identify"+a):(a="mask"+a,b=A?n(A.replace(/([a-z])([A-Z])/g,"$1 $2")):"Opera",/\bIE\b/.test(a)&&(d=null),w||(f=null)),m=["Presto"],k.push(a));(a=(/\bAppleWebKit\/([\d.]+\+?)/i.exec(e)||0)[1])&&(a=[parseFloat(a.replace(/\.(\d)$/,".0$1")),a],"Safari"==b&&"+"==a[1].slice(-1)?(b="WebKit Nightly",C="alpha",f=a[1].slice(0,-1)):(f==a[1]||f==(a[2]=(/\bSafari\/([\d.]+\+?)/i.exec(e)||0)[1]))&&(f=null),a[1]=(/\b(?:Headless)?Chrome\/([\d.]+)/i.exec(e)||0)[1],537.36==a[0]&&537.36==a[2]&&parseFloat(a[1])>=28&&"WebKit"==m&&(m=["Blink"]),w&&(P||a[1])?(m&&(m[1]="like Chrome"),a=a[1]||((a=a[0])<530?1:a<532?2:a<532.05?3:a<533?4:a<534.03?5:a<534.07?6:a<534.1?7:a<534.13?8:a<534.16?9:a<534.24?10:a<534.3?11:a<535.01?12:a<535.02?"13+":a<535.07?15:a<535.11?16:a<535.19?17:a<536.05?18:a<536.1?19:a<537.01?20:a<537.11?"21+":a<537.13?23:a<537.18?24:a<537.24?25:a<537.36?26:"Blink"!=m?"27":"28")):(m&&(m[1]="like Safari"),a=(a=a[0])<400?1:a<500?2:a<526?3:a<533?4:a<534?"4+":a<535?5:a<537?6:a<538?7:a<601?8:a<602?9:a<604?10:a<606?11:a<608?12:"12"),m&&(m[1]+=" "+(a+="number"==typeof a?".x":/[.+]/.test(a)?"":"+")),"Safari"==b&&(!f||parseInt(f)>45)?f=a:"Chrome"==b&&/\bHeadlessChrome/i.test(e)&&k.unshift("headless")),"Opera"==b&&(a=/\bzbov|zvav$/.exec(d))?(b+=" ",k.unshift("desktop mode"),"zvav"==a?(b+="Mini",f=null):b+="Mobile",d=d.replace(RegExp(" *"+a+"$"),"")):"Safari"==b&&/\bChrome\b/.exec(m&&m[1])?(k.unshift("desktop mode"),b="Chrome Mobile",f=null,/\bOS X\b/.test(d)?(t="Apple",d="iOS 4.3+"):d=null):/\bSRWare Iron\b/.test(b)&&!f&&(f=K("Chrome")),f&&0==f.indexOf(a=/[\d.]+$/.exec(d))&&e.indexOf("/"+a+"-")> -1&&(d=r(d.replace(a,""))),d&& -1!=d.indexOf(b)&&!RegExp(b+" OS").test(d)&&(d=d.replace(RegExp(" *"+p(b)+" *"),"")),m&&!/\b(?:Avant|Nook)\b/.test(b)&&(/Browser|Lunascape|Maxthon/.test(b)||"Safari"!=b&&/^iOS/.test(d)&&/\bSafari\b/.test(m[1])||/^(?:Adobe|Arora|Breach|Midori|Opera|Phantom|Rekonq|Rock|Samsung Internet|Sleipnir|SRWare Iron|Vivaldi|Web)/.test(b)&&m[1])&&(a=m[m.length-1])&&k.push(a),k.length&&(k=["("+k.join("; ")+")"]),t&&g&&0>g.indexOf(t)&&k.push("on "+t),g&&k.push((/^on /.test(k[k.length-1])?"":"on ")+g),d&&(I=(a=/ ([\d.+]+)$/.exec(d))&&"/"==d.charAt(d.length-a[0].length-1),d={architecture:32,family:a&&!I?d.replace(a[0],""):d,version:a?a[1]:null,toString:function(){var a=this.version;return this.family+(a&&!I?" "+a:"")+(64==this.architecture?" 64-bit":"")}}),(a=/\b(?:AMD|IA|Win|WOW|x86_|x)64\b/i.exec(B))&&!/\bi686\b/i.test(B)?(d&&(d.architecture=64,d.family=d.family.replace(RegExp(" *"+a),"")),b&&(/\bWOW64\b/i.test(e)||w&&/\w(?:86|32)$/.test(y.cpuClass||y.platform)&&!/\bWin64; x64\b/i.test(e))&&k.unshift("32-bit")):d&&/^OS X/.test(d.family)&&"Chrome"==b&&parseFloat(f)>=39&&(d.architecture=64),e||(e=null);var u={};return u.description=e,u.layout=m&&m[0],u.manufacturer=t,u.name=b,u.prerelease=C,u.product=g,u.ua=e,u.version=b&&f,u.os=d||{architecture:null,family:null,version:null,toString:function(){return"null"}},u.parse=i,u.toString=function(){return this.description||""},u.version&&k.unshift(f),u.name&&k.unshift(b),d&&b&&!(d==String(d).split(" ")[0]&&(d==b.split(" ")[0]||g))&&k.push(g?"("+d+")":"on "+d),k.length&&(u.description=k.join(" ")),u}var d=i();"function"==typeof define&&"object"==typeof define.amd&&define.amd?(c.platform=d,define(function(){return d})):e&&f?h(d,function(a,b){e[b]=a}):c.platform=d}).call(this)


	console.log(platform.name);

		var json ={}; 
	
	json['device']= platform.name; 
	json['version'] = platform.version;
	json['layout']= platform.layout;
	json['os'] = platform.os; 
	json['description']= platform.description; 
    $("<input />").attr("type", "hidden")
          .attr("name", "agents")
          .attr("value",JSON.stringify(json))
          .appendTo("#qwqw");

</script>