<?php
session_start();
$dbc=@mysql_connect("localhost","root","shobhit");
@mysql_select_db('database1',$dbc);
$today=date('Y-m-d');
$sql="SELECT * from main";
$res=@mysql_query($sql);
while($row=@mysql_fetch_array($res))
{
if($row['status']=='Notdone')
{
$today=date('2016-11-16');
$date1=date_create($today);
$date2=date_create($row['date_complaint']);
$diff=date_diff($date1,$date2);
$x=$diff->format("%R%a days");
$cid=$row['complaintid'];
if($x<0)
	$x=$x*-1;
echo $x;
echo $cid;
if($x>7)
{

	$s="UPDATE main SET adminstatus='Notdone' WHERE complaintid='$cid'";
	echo $s;
	@mysql_query($s) or die('sdsd');
}
}
}
?>