<?php
session_start();
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
$user=$_REQUEST['luname'];
$pass=$_REQUEST['lupsw'];
$count="SELECT COUNT(*) FROM student";
$flag=0;
$res=@mysql_query($count);
while($r=@mysql_fetch_array($res))
{
	$c=$r[0];
}
$sql="SELECT regno,password FROM student";
$result=@mysql_query($sql);
while($row=@mysql_fetch_array($result))
{
		if($row['regno']==$user && $row['password']==$pass)
		{
			$flag=1;
			$_SESSION['reg']=$user;
			echo("<script>window.location = 'complaint.php'</script>");
		}
}
if($flag==0)
		{
		echo("<script>alert('Username or password is incorrect')</script>");
    	echo("<script>window.location = 'mainlogin.html'</script>");
		}
?>