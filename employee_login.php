<?php
session_start();	
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
$name=$_REQUEST['name'];
$empid=$_REQUEST['emp_id'];
$pass=$_REQUEST['password'];
$block=$_REQUEST['block'];
$category=$_REQUEST['category'];
$sql="INSERT INTO employee VALUES('$name','$empid','$pass','$block','$category',0)";
@mysql_query($sql);
$sq="INSERT INTO main(regno,complaintid,employeeid,status) VALUES('15bce0000','NULL','$empid','Done')";
@mysql_query($sq);
?>