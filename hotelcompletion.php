<!DOCTYPE html>
<html>
<body>
<?php
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('software',$dbc);
$sql="SELECT name,phoneno,type,adult,children,email,adate,ddate,price FROM hotel";
$count="SELECT COUNT(*) FROM hotel";
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
		$sq="SELECT name,phoneno,type,adult,children,email,adate,ddate,price FROM hotel WHERE email=$row['email']";
		$t=@mysql_query($sq);
		while($y=@mysql_fetch_array($t))
		{
		echo '<div style="height:95px; width:100%; margin:0px;padding:0px; vertical-align: middle;">'.'
		<font align="center" size=90px color=#e00000><img src="Logo III.jpg" height=90px width=90px align="center">'.'Complaint Box'.'</font>'.'</div>';
		echo '<h2 align="center">'.'<font color="red">'.'<u>'.'Confirmation Page'.'</u>'.'</font>'.'</h2>'.'<br/>';
		echo '<p>'.'<font color="green">'.'<b>'.' Name'.'</b>'.$y['name'].'<br/>';
		echo '<b>'.'PhoneNo:'.'</b>'.$y['phoneno'].'<br/>';
		echo '<b>'.'Type:'.'</b>'.$y['type'].'<br/>';
		echo '<b>'.'Number Of Adults:'.'</b>'.$y['adult'].'<br/>';
		echo '<b>'.'Number Of Children:'.'</b>'.$y['children'].'<br/>';
		echo '<b>'.'Email:'.'</b>'.$y['email'].'<br/>';
		echo '<b>'.'Arrival Date:'.'</b>'.$y['adate'].'<br/>';
		echo '<b>'.'Departing Date:'.'</b>'.$y['ddate'].'<br/>';
		echo '<b>'.'Price:'.'</b>'.$y['price'].'<br/>';
		}
	}
} 			
?>
</body>
</html>