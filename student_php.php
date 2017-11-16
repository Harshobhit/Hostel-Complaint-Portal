<?php
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
$name=$_REQUEST['name'];
$regno=$_REQUEST['regno'];
$pass=$_REQUEST['password'];
$room=$_REQUEST['room'];
$block=$_REQUEST['Block'];
$sql="INSERT INTO student VALUES('$name','$regno','$pass',$room,'$block')";
@mysql_query($sql);
echo("<script>window.location = 'mainlogin.html'</script>");
?>