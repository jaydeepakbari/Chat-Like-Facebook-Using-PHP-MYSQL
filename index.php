<div id="jd-chat">
	<div class="jd-online">
		<div class="jd-header">Online User</div>
		<div class="jd-body">
			<span class="jd-online_user"  id="2"> Jaydeep <i class="light">&#8226;</i> </span>
			<span class="jd-online_user" id="3"> Akbari <i class="light">&#8226;</i></span>
		</div>			
		<div class="jd-footer"><input placeholder="Serach"></div>
	</div>
	
</div>
<?php
	@session_start();
	$_SESSION['JD_CURRUNT_USER']="3";
	echo "MY ID=" . $_SESSION['JD_CURRUNT_USER'];
?>
<link href="jd.css" rel="stylesheet" />
<script src="jquery-1.11.2.min.js" ></script>
<script src="jd.js" ></script>
