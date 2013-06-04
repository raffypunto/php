<?php session_start();
include_once 'inc/connectOption.php';
include_once 'inc/toDatabase.php';

	$db= new database();
	$db->dbOpen( $dbHost, $dbSelect, $dbUser, $dbPass );
	

$message=array();
if(isset($_POST['uname']) && !empty($_POST['uname'])){
    $uname=$db->realEscape($_POST['uname']);
}else{
    $message[]='Please enter username';
}

if(isset($_POST['password']) && !empty($_POST['password'])){
    $password=$db->realEscape($_POST['password']);
}else{
    $message[]='Please enter password';
}

$countError=count($message);

if($countError > 0){
     for($i=0;$i<$countError;$i++){
              echo ucwords($message[$i]).'<br/><br/>';
     }
}else{
    $sql="select * from Account where account_uname='".$uname."' and account_pword=md5('".$password."')";
	$res=$db->dbQuery($sql);
	$r=$db->dbFetchAssoc($res);
    $checkUser=$db->dbNumRows($res);
	
    if($checkUser > 0){
         $_SESSION['LOGIN_STATUS']=true;
         $_SESSION['UNAME']=$r['account_fname'];
		 $_SESSION['user_ID']=$r['id'];
		 $_SESSION['USER']['LOGIN']=$r;
         echo 'correct';
    }else{
         echo ucwords('please enter correct user details');
    }
}
?>

