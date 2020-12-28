<?php

include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'email'         => $gpUserProfile['email'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
     
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	$_SESSION['userData'] = $userData;
	
	
    if(!empty($userData)){

      
        $output = '<div class="center"> <h2>Google Profile Details </h2></div>';
        $output .= '<div class="center"><div class="card"> <div class="container"><img src="'.$userData['picture'].'" width="100" height="50"><br>Name:<strong>'. $userData['first_name'].'</strong><br/>Logout from <a href="logout.php"><button style="color:white; background:red; border-radius: 12px;">Google</button></a></div></div></div>';
      
        
		
		
		

    }
    else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<div class="center"> <h1>Login with Google</h2><a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google
        </a></a></div>';
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
img {
  border-radius: 50%;
}
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}


.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: auto;
    justify-content: center;
	float:center;
	postion relative;
	 left: -50%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container{
	text-align:right;
}

 #cssmenu {padding: 10px; margin: auto; border: 0; line-height: 1; width:500%;}
    #cssmenu ul,
    #cssmenu ul li{list-style: none; margin: 0; padding: 0;}

    #cssmenu ul li.hover,
    #cssmenu ul li:hover {position: relative; z-index: 599; cursor: default;}

    #cssmenu {width: 400px; background: #f7f7f7; font-family:sans-serif; font-weight:bold;
    zoom: 1; font-size: 12px;}
    #cssmenu:before {content: ''; display: block;}

    #cssmenu:after{content: ''; display: table; clear: both;}
    #cssmenu a {display: block; padding: 15px 20px; color: #f26724; text-decoration: none;
    text-transform: uppercase; border-bottom: 1px solid #ffffff;}

    #cssmenu > ul {width: 400px;}
    #cssmenu > ul > li > a {border-left: 4px solid #095586; color: #095586;}

    #cssmenu > ul > li a:hover {background: #095586; color:#f1f1f1;}
</style>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="sweetalert2/src/sweetalert2.scss">
<script src="sweetalert2/src/sweetalert2.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="scripts/scripts.js"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div>
 <!--<form id="from1">
    <button>Save</button>
  </form> -->
  
   

  
<?php echo $output;
if(!empty($userData))
{
$url = 'https://jsonplaceholder.typicode.com/users/'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data);
$rohith = '<h1>JSON response to the web service call. The JSON response consists of the menu </h1><div id="cssmenu">
   <ul>
   <li><a href=""><span><form id="from1"><button style="width:300px;">'.$characters[0]->id.' '.$characters[0]->name.' '.$characters[0]->username.'</button></form></span></a></li>
   <li><a href=""><span><form id="from1"><button style="width:300px;">'.$characters[1]->id.' '.$characters[1]->name.' '.$characters[1]->username.'</button></form></span></a></li>
   <li><a href=""><span><form id="from1"><button style="width:300px;">'.$characters[2]->id.' '.$characters[2]->name.' '.$characters[2]->username.'</button></form></span></a></li>
   <li><a href=""><span><form id="from1"><button style="width:300px;">'.$characters[3]->id.' '.$characters[3]->name.' '.$characters[3]->username.'</button></form></span></a></li>     
   <li><a href=""><span><form id="from1"><button style="width:300px;">'.$characters[4]->id.' '.$characters[4]->name.' '.$characters[4]->username.'</button></form></span></a></li>
   <li><a href=""><span><form id="from1"><button style="width:300px;">'.$characters[5]->id.' '.$characters[5]->name.' '.$characters[5]->username.'</button></form></span></a></li>   
  
   </ul>
  <script>
    document.querySelector("#from1").addEventListener("submit", function(e) {
      var form = this;
      
      e.preventDefault();
      
      swal({
          title: "'.$characters[0]->id.'.'.$characters[0]->name.' '.$characters[0]->username.'",
          text: "'.$characters[0]->email.' '.$characters[0]->phone.' '.$characters[0]->username.'",
          icon: "warning",
          buttons: [
            "No, cancel it!",
            "Yes, I am sure!"
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
              title: "Shortlisted!",
              text: "Candidates are successfully shortlisted!",
              icon: "success"
            }).then(function() {
              form.submit();
            });
          } else {
            swal("Cancelled", "Your Rejected!! :)", "error");
          }
        });
    });
  </script>

  </div></div>
   
   ';
                   echo $rohith;
 
}
?></div>

 
</body>
</html>