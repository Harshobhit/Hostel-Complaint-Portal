<?php
session_start();
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
$euser=$_REQUEST['euname'];
$epass=$_REQUEST['eupsw'];
$flag=0;
if($euser=="Admin" && $epass=="Admin")
{
	echo '<script>window.location="admin_home.php"</script>';
}
else
{
$sq="SELECT emp_id,password from employee";
$res=@mysql_query($sq);
while($row=@mysql_fetch_array($res))
{
	if($euser==$row['emp_id'] && $epass==$row['password'])
	{
	$flag=1;
	$_SESSION['euname']=$euser;
	echo("<script>window.location = 'history_employee.php'</script>");
	}
}
if($flag==0)
{
		echo("<script>alert('Username or password is incorrect')</script>");
    	echo("<script>window.location = 'mainlogin.html'</script>");
}
}
?>