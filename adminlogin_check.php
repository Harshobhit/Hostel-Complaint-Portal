<?php
session_start();
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('software',$dbc);
$euser=$_REQUEST['euname'];
$epass=$_REQUEST['eupsw'];
$flag=0;
echo "asdas";
if($euser=="Admin" && $epass=="Admin")
{
	echo '<script>window.location="admin_home.php"</script>';
	$flag=1;
}
if($flag==0)
{
		echo("<script>alert('Username or password is incorrect')</script>");
    	echo("<script>window.location = 'mainlogin.html'</script>");
}

?>