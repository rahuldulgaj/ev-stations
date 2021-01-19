<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; Charset=UTF-8');
include('../config/config.php');
include('../encryption.php');
//===========================================


$status = 'false';
$urData='';
  date_default_timezone_set('GMT');
  $temptime= strtotime("+05 hours 30 minutes");
  $printgetdate = date("Y-m-d H:i:s",$temptime);
  
$LoginBy='Email';

$newDataArray = array();
/*//========Alert Message File===================================

if(isset($_REQUEST['lang']) && $_REQUEST['lang']!= '')
{ $language=trim(addslashes($_REQUEST['lang']));}else{$language='tc';}
include_once("alertMessage_Bilangual.php");
*/
//============================================================

if(isset($_REQUEST['userId']) && $_REQUEST['userId']!= '' && $_REQUEST['usertype']!= '')
{	
	
	
	$usertype=$_REQUEST['usertype'];
	$userId=$_REQUEST['userId'];


	if($usertype=='2')
	{
		$userorders=$conn->query("select bk.*, users.user_id as usrid, users.name usrname, users.image usrimage from booking bk, users where booking_cus=users.user_id and  booking_con = '".$userId."' order by booking_id desc");
		$i = 0;
		while($rowS = $userorders->fetch(PDO::FETCH_ASSOC))
          {
		    if($rowS['usrimage']==''){
          		
          	}
          	else{
          		$rowS['usrimage']='https://mymysticmaster.com/admin/upload/users/'.$rowS['usrimage'];				
          	}
				if($rowS['booking_status']=='0') 
				$rowS['booking_status']="0";
				else if($rowS['booking_status']==1) 
				$rowS['booking_status']="Accepted";
				else if($rowS['booking_status']==2) 
				$rowS['booking_status']="Rejected";
				else if($rowS['booking_status']==3) 
				$rowS['booking_status']="Closed";
				$newDataArray[$i] = $rowS;
            	$i++;
		  
		  }
	}
	else if($usertype=='1')
	{
		$userorders=$conn->query("select bk.*, users.user_id as usrid, users.name usrname, users.image usrimage from booking bk, users where booking_con=users.user_id and  booking_cus = '".$userId."' order by booking_id desc");
		
			$i = 0;
		while($rowS = $userorders->fetch(PDO::FETCH_ASSOC))
          {
		    if($rowS['usrimage']==''){
          		
          	}
          	else{
          		$rowS['usrimage']='https://mymysticmaster.com/admin/upload/consultants/'.$rowS['usrimage'];				
          	}
				if($rowS['booking_status']=='0') 
				$rowS['booking_status']="0";
				else if($rowS['booking_status']==1) 
				$rowS['booking_status']="Accepted";
				else if($rowS['booking_status']==2) 
				$rowS['booking_status']="Rejected";
				else if($rowS['booking_status']==3) 
				$rowS['booking_status']="Closed";
				$newDataArray[$i] = $rowS;
            	$i++;
		  
		  }
	}
	

}else{
		$msg='Invalid User Details';
}

$a = array();
$a['status'] =$status;
$a['message'] =$msg;
$a['data'] =$newDataArray;
$result = '{"root":';
$result .= json_encode($a);
$result .= '}';
print(str_replace("\/", "/", $result));

   ?>






 