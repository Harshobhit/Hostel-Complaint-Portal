<!DOCTYPE html>
<html>
<body>
<?php
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
$sql="SELECT regno,complaintid FROM primary";
$count="SELECT COUNT(*) FROM primary";
$c=@mysql_query($count);
while($r=@mysql_fetch_array($c))
{
	$number=$r[0];
}
$flag=0;
$result=@mysql_query($sql);
while($row=@mysql_fetch_array($result))
{
		$flag+=1;
		if($flag==$number)
	{
		$sq="SELECT regno,name,room,block FROM student WHERE regno=$row['regno']";
		$t=@mysql_query($sq);
		while($y=@mysql_fetch_array($t))
		{
		echo '<div style="height:95px; width:100%; margin:0px;padding:0px; vertical-align: middle;">'.'
		<font align="center" size=90px color=#e00000><img src="Logo III.jpg" height=90px width=90px align="center">'.'Complaint Box'.'</font>'.'</div>';
		echo '<h2 align="center">'.'<font color="red">'.'<u>'.'Confirmation Page'.'</u>'.'</font>'.'</h2>'.'<br/>';
		echo '<p>'.'<font color="green">'.'<b>'.' Registration Number:'.'</b>'.$y['regno'].'<br/>';
		echo '<b>'.'Name:'.'</b>'.$y['name'].'<br/>';
		echo '<b>'.'Room Number:'.'</b>'.$y['room'].'<br/>';
		echo '<b>'.'Block:'.'</b>'.$y['block'].'<br/>';
		}
		$sq1="SELECT behalf,complaintid,type,description FROM complaint";
		$i=@mysql_query($sq1);
		while($j=@mysql_fetch_array($i))
		{
		echo '<b>'.'On behalf of:'.'</b>'.$j['behalf'].'<br/>';
		echo '<b>'.'TOKEN NUMBER:'.'</b>'.$j['complaintid'].'<br/>';
		echo '<b>'.'Complaint Type:'.'</b>'.$j['type'].'<br/>';
		echo '<b>'.'Complaint:'.'</b>'.$j['description'].'<br/>';
		}
	}
} 			
?>
</body>
</html>