<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '228948534759-frp1ibngln49f8dvk2d75msj9gg4mlkn.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'VXHA9fiPX4i3kNbRszrmfpTT'; //Google client secret
$redirectURL = 'http://localhost/UPGRAD1/petoo_upgrad/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Rohith');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
