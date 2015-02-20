<?php
	include("chat.config.php");
	
	$me = $_SESSION['JD_CURRUNT_USER'];
	
	if(isset($_POST['send']))
	{		
		$to     = $_POST['to'];
		$msg    = mysql_real_escape_string( $_POST['msg'] );
		$date   = date("Y-m-d H:i:s");
		
		mysql_query( "INSERT INTO chat(`id`, `sender`, `reciever`, `msg`, `time`)  VALUES(0,'$me','$to','$msg','$date')" );		
	}
	
	if(isset($_POST['get_all_msg']) && isset($_POST['user']))
	{
		$return_string="";
		$set_unread="";
		$user = mysql_real_escape_string($_POST['user']);
		$data=mysql_query("SELECT * FROM chat WHERE (sender = '$me' AND reciever = '$user') OR (sender = '$user' AND reciever = '$me') ORDER BY (time) DESC");
		while($row = mysql_fetch_object($data))
		{
			$class="other";
			if($row->sender == $me) $class = "me";
			$set_unread.="'".$row->id."',";
			$return_string.="<span class='$class' > $row->msg </span>";
		}
		$set_unread = trim($set_unread , ",");
		mysql_query("UPDATE chat SET status=1 WHERE id IN($set_unread)");
		
		echo $return_string;
	}
	
	if(isset($_POST['unread']))
	{
		$return_string=array();
		$set_unread="";
		$data=mysql_query("SELECT * FROM chat WHERE  reciever = '$me' AND status=0 ORDER BY (time) DESC");
		while($row = mysql_fetch_object($data))
		{					
			$return_string[$row->sender][]=$row->msg;
			$set_unread.="'".$row->id."',";
		}
		$set_unread = trim($set_unread , ",");
		
		mysql_query("UPDATE chat SET status=1 WHERE id IN($set_unread)");
		
		print json_encode($return_string);
	}
	
?>
