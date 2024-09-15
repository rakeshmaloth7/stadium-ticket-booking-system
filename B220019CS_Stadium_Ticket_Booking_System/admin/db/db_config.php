<?php
	$cid = mysqli_connect("localhost","root","","ticket_stadium");
	date_default_timezone_set("Asia/Kolkata");
	mysqli_query($cid,'SET character_set_results=utf8');
		mysqli_query($cid, 'SET NAMES utf8');
		mysqli_query($cid,'SET character_set_client=utf8');
		mysqli_query($cid,'SET character_set_connection=utf8');
		mysqli_query($cid,'SET character_set_results=utf8');
		mysqli_query($cid,'SET collation_connection=utf8_general_ci');
	function iud($query)
	{
		global $cid;
		$query = mysqli_query($cid,$query);
		return mysqli_affected_rows($cid);
	}
	function select($query)
	{
		global $cid;
		$res = mysqli_query($cid,$query);
		return $res;
	}
?>